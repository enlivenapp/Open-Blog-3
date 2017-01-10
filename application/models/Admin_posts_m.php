<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Posts M
 * 
 * Admin Posts Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_posts_m extends CI_Model
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
     * get_posts
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function get_posts()
	{
		 return $this->db->get($this->_table['posts'])->result();
	}

	/**
     * get_post
     * 
     * gets a single post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array
     */
	public function get_post($id)
	{
		// get the post
		$post = $this->db->where('id', $id)->limit(1)->get($this->_table['posts'])->row_array();

		// get post's categories
		$query_cats = $this->db->select('category_id')->where('post_id', $post['id'])->get($this->_table['posts_to_categories'])->result_array();

		// build for multi-select
		foreach ($query_cats as $k => $v)
		{
			$post['selected_cats'][] = $v['category_id'];
		}

		// build the multi-select 
		$post['cats'] = $this->get_cats_form();

		// return 
		return $post;
	}

	/**
     * add_post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  array $data the array data for the new post
     * @return  bool
     */
	public function add_post($data)
	{
		// separate the categories from 
		// post data
		$cats = $data['cats'];
		unset($data['cats']);

		// attempt to insert the post
		if ($this->db->insert($this->_table['posts'], $data))
		{
			// it works, so get the new id
			$new_post_id = $this->db->insert_id();

			// attempt to add the categories
			if ($this->insert_cats_to_post($new_post_id, $cats))
			{
				// everything went well
				if ($data['status'] == 'published')
				{
					$this->load->library('markdown');
					// email subscribers
					// get subscribers
					$subs = $this->db->where('verified', 1)->get('notifications')->result();

					foreach ($subs as $sub)
					{
						$this->obcore->send_email( $sub->email_address, $data['title'] . ' - ' . $this->config->item('site_name'), lang('post_new_post_notification_msg') . $this->markdown->parse($data['content']) . lang('post_new_post_notification_msg_foot') . '[<a href="' . site_url('notices/unsub') . '">Unsubscribe</a>]');
					}
					
				}
				
				return true;
			}

			// couldn't insert the post
			return false;
		}

		// default failure
		return false;
	}


	/**
     * update_post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the existing post id
     * @param  array $data the new data for the post
     * 
     * @return  bool
     */
	public function update_post($id, $data)
	{
		$old = $this->db->where('id', $id)->limit(1)->get($this->_table['posts'])->row();
		// separate the categories
		$cats = $data['cats'];
		unset($data['cats']);

		// update the curent record and categories
		if ($this->db->where('id', $id)->update($this->_table['posts'], $data) && $this->update_cats_to_post($id, $cats))
		{
			// if we've updated a post and we're taking a formerly 'draft' post
			// to 'published', we should send out the notices.
			if ($data['status'] == 'published' && $old->status == 'draft')
				{
					$this->load->library('markdown');
					// email subscribers
					// get subscribers
					$subs = $this->db->where('verified', 1)->get('notifications')->result();

					foreach ($subs as $sub)
					{
						$this->obcore->send_email( $sub->email_address, $data['title'] . ' - ' . $this->config->item('site_name'), lang('post_new_post_notification_msg') . $this->markdown->parse($data['content']) . lang('post_new_post_notification_msg_foot') . '[<a href="' . site_url('notices/unsub') . '">Unsubscribe</a>]');
					}
					
				}
			// woot!
			return true;
		}
		// default failure
		return false;
	}

	/**
     * remove_post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the id to be removed
     * 
     * @return  null
     */
	public function remove_post($id)
	{
		// get the outgoing post information
		$post = $this->db->where('id', $id)->limit(1)->get('posts')->row();

		// does this post have redirects that need
		// to be removed as well?
		$this->obcore->remove_redirects($post->url_title);

		$this->remove_post_to_cats($id);
		
		return $this->db->delete($this->_table['posts'], ['id' => $id]);
	}

	/**
     * remove_post_to_cats
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the id to be removed
     * 
     * @return  null
     */
	public function remove_post_to_cats($post_id)
	{
		return $this->db->delete($this->_table['posts_to_categories'], ['post_id' => $post_id]);
	}


	/**
     * update_cats_to_post
     * 
     * Updates categories for an
     * existing post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $post_id
     * @param  array $cats an array of new categories
     * 
     * @return bool
     */
	public function update_cats_to_post($post_id, $cats)
	{
		// do we have needed info?
		if ( ! $cats || ! $post_id )
		{
			// fail
			return false;
		}

		// help switch on success...
		$return = true;

		// get the current categories for the post
		$cur_cats = $this->db->where('post_id', $post_id)->get($this->_table['posts_to_categories'])->result_array();

		// decide which goes where, if anything...
		// we foreach loop through the current categories
		// for the post
		// then we foreach loop through the incoming new categories
		foreach ($cur_cats as $c_k => $c_v)
		{
			foreach ($cats as $k => $v)
			{
				// if we find a match we unset both arrays because
				// we don't need to do anything with that record
				if ($v == $c_v['category_id'] && $c_v['post_id'] == $post_id)
				{
					unset($cats[$k]);
					unset($cur_cats[$c_k]);
				}			
			}
		}
		// what's left in the respective arrays is what we
		// need to remove or add.

		// delete categories
		if ( $cur_cats )
		{
			foreach ($cur_cats as $cat)
			{
				if (! $this->db->where('id', $cat['id'])->delete($this->_table['posts_to_categories']) )
				{
					$return = false;
				}
			}
		}

		// insert new categories
		if ( $cats && $return == true)
		{
			return $this->insert_cats_to_post($post_id, $cats);
		}

		return true;
	}

	/**
     * insert_cats_into_post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $post_id 
     * @param  array $cats array of caregories
     * 
     * @return  bool
     */
	public function insert_cats_to_post($post_id, $cats)
	{
		// build insert array
		foreach ($cats as $k => $v)
		{
			$insert[] = ['post_id' => $post_id, 'category_id' => $v];
		}

		// attempt to insert categories for the post
		if ($this->db->insert_batch($this->_table['posts_to_categories'], $insert))
		{
			// yay!
			return true;
		}

		// boo!
		return false;
	}

	/**
     * get_cats_form
     *
     * builds the array to populate
     * the categories multi-select input
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array
     */
	public function get_cats_form()
	{
		// get'm
		$cats = $this->db->select('id, name')->get('categories')->result_array();

		// default empty array
		$ret = [];

		// foreach getting id and name
		foreach ($cats as $k => $v)
		{
			$ret[$v['id']] = $v['name'];
		}

		// return array
		return $ret;
	}
}
