<?php

class Admin_comments_m extends CI_Model
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


	public function get_comments($modded = 0)
	{

		$comments = $this->db
						->select('comments.*, posts.title as post_title')
						->where('comments.modded', $modded)
						->join($this->_table['posts'], "posts.id = comments.post_id")
						->get($this->_table['comments'])
						->result_array();

		foreach ($comments as &$comment) 
		{
			if ($comment['author'])
			{
				$comment['display_name'] = $comment['author'] . ' [' . $comment['author_email'] . ']';
			}
			else
			{
				$comment['display_name'] = $this->ion_auth->get_db_display_name($comment['user_id']) . ' [' . lang('comments_reg_user') . ']';
			}
		}
		return $comments;
	}

	public function get_comment($id)
	{
		$comment = $this->db
						->select('comments.*, posts.title as post_title')
						->where('comments.id', $id)
						->join($this->_table['posts'], "posts.id = comments.post_id")
						->limit(1)
						->get($this->_table['comments'])
						->row_array();

		if ($comment['author'])
		{
			$comment['display_name'] = $comment['author'] . ' [' . $comment['author_email'] . ']';
		}
		else
		{
			$comment['display_name'] = $this->ion_auth->get_db_display_name($comment['user_id']) . ' [' . lang('comments_reg_user') . ']';
		}
		return $comment;
	}

	public function hide_comment($id)
	{
		return $this->db->where('id', $id)->update($this->_table['comments'], ['modded' => 1]);
	}

	public function accept_comment($id)
	{
		return $this->db->where('id', $id)->update($this->_table['comments'], ['modded' => 0]);
	}

	public function update_comment($id, $data)
	{
		return $this->db->where('id', $id)->update($this->_table['comments'], $data);
	}


	public function remove_comment($id)
	{
		return $this->db->delete($this->_table['comments'], ['id' => $id]);
	}


}
