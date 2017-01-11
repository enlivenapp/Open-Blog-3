<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Comments M
 * 
 * Public Comments Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Comments_m extends CI_Model
{
	// Protected or private properties
	protected $_table;
	
	/**
     * Construct
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function __construct()
	{
		parent::__construct();
			
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}

	/**
     * Get Comments
     * 
     * Get's comments for a single post
     * 
     * @param  $post_id The ID of the post we need the comments from.
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * @since  v3
     * 
     * @return  array 
     */
	public function get_comments($post_id)
	{
		$this->db
				->where('post_id', $post_id)
				->where('modded', 0)
				->order_by('id', 'ASC');

		$query = $this->db->get($this->_table['comments']);

		// do we have results?
		if ($query->num_rows() > 0)
		{
			// tasty results
			$result = $query->result();

			// foreach and parse markdown in content
			foreach ($result as &$item)
			{
				$item->content = nl2br($item->content);
				$item->date = DateTime::createFromFormat('Y-m-d H:i:s', $item->date)->format('M d Y');

				if ($item->user_id)
				{
					// If the user_id is set, then we know a logged in
					// user made the comment, so we can pull that
					// info from the database.
					$item->author = $this->ion_auth->get_db_display_name($item->user_id);
				}
			}
			// return tastiness
			return $result;
		}
		// sad panda has no tasty results
		return [];
	}
	
	/**
     * get_latest_comments
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function get_latest_comments($number = 10, $offset = 0)
	{
		$this->db->select('comments.id, comments.user_id, comments.author, comments.author_email, comments.content, comments.date, posts.title, posts.url_title, posts.date_posted');
		$this->db->from($this->_table['comments'] . ' comments');
		$this->db->join($this->_table['posts'] . ' posts', 'comments.post_id = posts.id');
		$this->db->order_by('comments.id', 'DESC');
		$this->db->limit($number, $offset);
		
		$query = $this->db->get();
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
	
	/**
     * get_comment_author
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function get_comment_author($id)
	{
		$this->db->select('user_id, author');
		$this->db->where('id', $id);
		
		$query = $this->db->get($this->_table['comments'], 1);
		
		if ($query->num_rows() == 1)
		{
			$row = $query->row_array();
			
			if ($row['user_id'] == "")
			{
				return $row['author'];
			}
		}
	}

	/**
     * Create Comment
     * 
     * Inserts the new comment to the db
     * 
     * @param  $id The ID of the post.
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array 
     */
	public function create_comment($id)
	{
		// is the commenter logged in?
		if ( $this->ion_auth->logged_in() )
		{
			// yes
			$data = [
				'post_id' 		=> $id,
				'user_id' 		=> $this->ion_auth->get_user_id(),
				'author_ip' 	=> $_SERVER['REMOTE_ADDR'],
				'content' 		=> $this->input->post('comment'),
				'date' 			=> date('Y-m-d H:i:d'),
				'modded'		=> $this->config->item('mod_user_comments')
			];
		}
		// nope, they should have radically different info to insert.
		else
		{
			$data = [
				'post_id' 		=> $id,
				'author' 		=> $this->input->post('nickname'),
				'author_email' 	=> $this->input->post('email'),
				'author_ip' 	=> $_SERVER['REMOTE_ADDR'],
				'content' 		=> $this->input->post('comment'),
				'date' 			=> date('Y-m-d H:i:d'),
				'modded'		=> $this->config->item('mod_non_user_comments')
			];
		}
		// do the insert...
		if ($this->db->insert($this->_table['comments'], $data))
		{
			// send the comment email notice
			$this->obcore->send_email($this->config->item('admin_email'), $this->config->item('site_name') . ' ' . lang('email_new_comment_sbj'), lang('email_new_comment_msg') . $this->input->post('comment'));
			return true;
		}
		return false;
	}
}
