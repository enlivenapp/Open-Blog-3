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
		// check for redirects...
		if ($redirected = $this->obcore->has_redirect($url_title))
		{
			header("Location: " . site_url('pages/' . $redirected->new_slug), TRUE, $redirected->code);
		}

		// not redirected...  moving on...
		$this->load->library('markdown');

		$this->db->where('url_title', $url_title)
					->where('status', 'active')
					->limit(1);
			
		$query = $this->db->get($this->_table['pages']);
		
		if ($query->num_rows() == 1)
		{	
			$page = $query->row_array();
			// parse markdown
			$page['content'] = $this->markdown->parse($page['content']);

			// return it...
			return $page;
		}
		return false;
	}



}