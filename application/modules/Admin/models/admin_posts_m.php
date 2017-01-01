<?php

class Admin_posts_m extends CI_Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::__construct();
		
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}

	public function get_posts()
	{
		 return $this->db->get($this->_table['posts'])->result();

		 

		 return $post;
	}

	public function get_post($id)
	{
		$post = $this->db->where('id', $id)->limit(1)->get($this->_table['posts'])->row_array();

		$query_cats = $this->db->select('category_id')->where('post_id', $post['id'])->get($this->_table['posts_to_categories'])->result_array();

		//$post['selected_cats'] = $query_cats;
		foreach ($query_cats as $k => $v)
		{
			$post['selected_cats'][] = $v['category_id'];
		}

		$post['cats'] = $this->get_cats_form();

		return $post;
	}

	public function add_post($data)
	{
		$cats = $data['cats'];
		unset($data['cats']);

		if ($this->db->insert($this->_table['posts'], $data))
		{
			$new_post_id = $this->db->insert_id();

			if ($this->insert_cats_to_post($new_post_id, $cats))
			{
				return true;
			}
			return false;
		}
		return false;
	}

	
	public function update_post($id, $data)
	{
		$cats = $data['cats'];
		unset($data['cats']);

		// update the curent record and categories
		if ($this->db->where('id', $id)->update($this->_table['posts'], $data) && $this->update_cats_to_post($id, $cats))
		{
			return true;
		}
		// default failure
		return false;
	}


	public function remove_post($id)
	{
		// get the outgoing post information
		$post = $this->db->where('id', $id)->limit(1)->get('posts')->row();

		// does this post have redirects that need
		// to be removed as well?
		$this->obcore->remove_redirects($post->url_title);
		
		return $this->db->delete($this->_table['posts'], ['id' => $id]);
	}

	public function update_cats_to_post($post_id, $cats)
	{
		if ( ! $cats || ! $post_id )
		{
			return false;
		}

		$cur_cats = $this->db->where('post_id', $post_id)->get($this->_table['posts_to_categories'])->result_array();

		// holds array of category IDs to delete
		$del_cats = [];

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
					return false;
				}
			}
		}

		// insert new categories
		if ( $cats )
		{
			return $this->insert_cats_to_post($post_id, $cats);
		}

		return true;
	}

	public function insert_cats_to_post($post_id, $cats)
	{
		foreach ($cats as $k => $v)
		{
			$insert[] = ['post_id' => $post_id, 'category_id' => $v];
		}

		if ($this->db->insert_batch($this->_table['posts_to_categories'], $insert))
		{
			return true;
		}
		return false;
	}


	public function get_cats_form()
	{
		$cats = $this->db->select('id, name')->get('categories')->result_array();

		$ret = [];

		foreach ($cats as $k => $v)
		{
			$ret[$v['id']] = $v['name'];
		}

		return $ret;



	}



}