<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Comments M
 * 
 * Admin Comments Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_comments_m extends CI_Model
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
		
		// get db tables from config
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}

	/**
     * get_comments
     * 
     * get's all comments with 1|0 in modded field
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  int $modded takes 0|1 to pass to the db
     * 
     * @return  array
     */
	public function get_comments($modded = 0)
	{
		// get the comments and join on the post so we
		// can get it's name
		$comments = $this->db
						->select('comments.*, posts.title as post_title')
						->where('comments.modded', $modded)
						->join($this->_table['posts'], "posts.id = comments.post_id")
						->get($this->_table['comments'])
						->result_array();

		// there's two ways the comments come
		// out of the database.
		foreach ($comments as &$comment) 
		{
			// an unregistered user
			if ($comment['author'])
			{
				// concat author and email and assign to display_name
				$comment['display_name'] = $comment['author'] . ' [' . $comment['author_email'] . ']';
			}
			// or a registered user
			else
			{
				// concat user_id and [Registered User](from the language files)
				// assign to display_name
				$comment['display_name'] = $this->ion_auth->get_db_display_name($comment['user_id']) . ' [' . lang('comments_reg_user') . ']';
			}
		}
		// send it on lil doggy
		return $comments;
	}

	/**
     * get_comment
     * 
     * get's the selected comment
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  int $id the comment id in the db
     * 
     * @return  array
     */
	public function get_comment($id)
	{
		// get the comments and join on the post so we
		// can get it's name
		$comment = $this->db
						->select('comments.*, posts.title as post_title')
						->where('comments.id', $id)
						->join($this->_table['posts'], "posts.id = comments.post_id")
						->limit(1)
						->get($this->_table['comments'])
						->row_array();

		// there's two ways the comments come
		// out of the database.
		
		// an unregistered user
		if ($comment['author'])
		{
			// concat author and email and assign to display_name
			$comment['display_name'] = $comment['author'] . ' [' . $comment['author_email'] . ']';
		}
		// or a registered user
		else
		{
			// concat user_id and [Registered User](from the language files)
			// assign to display_name
			$comment['display_name'] = $this->ion_auth->get_db_display_name($comment['user_id']) . ' [' . lang('comments_reg_user') . ']';
		}

		// return it
		return $comment;
	}

	/**
     * hide_comment
     * 
     * hides the selected comment.  modded = 1
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  int $id the comment id in the db
     * 
     * @return  bool
     */
	public function hide_comment($id)
	{
		// returns true|false on success|fail
		return $this->db->where('id', $id)->update($this->_table['comments'], ['modded' => 1]);
	}

	/**
     * accept_comment
     * 
     * shows the selected comment. modded = 0
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  int $id the comment id in the db
     * 
     * @return  bool
     */
	public function accept_comment($id)
	{
		// returns true|false on success|fail
		return $this->db->where('id', $id)->update($this->_table['comments'], ['modded' => 0]);
	}

	/**
     * update_comment
     * 
     * updates the selected comment
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  int $id the comment id in the db
     * @param  array $data the incoming new data
     * 
     * @return  bool
     */
	public function update_comment($id, $data)
	{
		// returns true|false on success|fail
		return $this->db->where('id', $id)->update($this->_table['comments'], $data);
	}

	/**
     * remove_comment
     * 
     * deletes the selected comment. 
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  int $id the comment id in the db
     * 
     * @return  bool
     */
	public function remove_comment($id)
	{
		// returns true|false on success|fail
		return $this->db->delete($this->_table['comments'], ['id' => $id]);
	}
}
