<?php

class Pages_m extends CI_Model
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



	public function get_home_page()
	{
		$this->load->library('markdown');

		$this->db->where('is_home', 1)
					->where('status', 'active')
					->limit(1);
			
		$query = $this->db->get($this->_table['pages']);
		
		if ($query->num_rows() == 1)
		{	
			$result = $query->row_array();

			// parse markdown
			$result['content'] = $this->markdown->parse($result['content']);

			// return it...
			return $result;
		}
		return false;
	}


	public function get_page_by_url($url_title)
	{
		$this->load->library('markdown');

		$this->db->where('url_title', $url_title)
					->where('status', 'active')
					->limit(1);
			
		$query = $this->db->get($this->_table['pages']);
		
		if ($query->num_rows() == 1)
		{	
			// parse markdown
			$query->content = $this->markdown->parse($query->content);

			// return it...
			return $query->row();
		}
		return false;
	}



}