<?php

class Admin_links_m extends CI_Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::__construct();

		// Load needed models, libraries, helpers and language files
		//$this->load->model('blog/categories_m');
		
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}


	public function get_links()
	{
		return $this->db->get($this->_table['links'])->result();
	}














}