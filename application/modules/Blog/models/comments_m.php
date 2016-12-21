<?php

class Comments_model extends Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::Model();
			
		$this->_table = $this->config->item('database_tables');
	}

	// Public methods
	public function get_comments($post_id)
	{
		$this->db->select('id, user_id, author, author_email, author_website, content, date');
		$this->db->where('post_id', $post_id);
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get($this->_table['comments']);
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
	
	public function get_latest_comments($number = 10, $offset = 0)
	{
		$this->db->select('comments.id, comments.user_id, comments.author, comments.author_email, comments.author_website, comments.content, comments.date, posts.title, posts.url_title, posts.date_posted');
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

	public function create_comment($id)
	{
		if ($this->session->userdata('logged_in') == TRUE)
		{
			$data = array
						(
							'post_id' => $id,
							'user_id' => $this->session->userdata('user_id'),
							'author_ip' => $_SERVER['REMOTE_ADDR'],
							'content' => $this->input->post('comment'),
							'date' => date('Y-m-d H:i:d')
						);
		}
		else
		{
			$data = array
						(
							'post_id' => $id,
							'author' => $this->input->post('nickname'),
							'author_email' => $this->input->post('email'),
							'author_website' => $this->input->post('website'),
							'author_ip' => $_SERVER['REMOTE_ADDR'],
							'content' => $this->input->post('comment'),
							'date' => date('Y-m-d H:i:d')
						);
		}

		$this->db->insert($this->_table['comments'], $data);
	}
}

/* End of file comments_model.php */
/* Location: ./application/modules/blog/models/comments_model.php */