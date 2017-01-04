<?php

class Admin_cats_m extends CI_Model
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


	public function get_cats()
	{
		return $this->db->get($this->_table['categories'])->result();
	}

	public function get_cat($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['categories'])->row_array();
	}

	public function add_cat($data)
	{
		return $this->db->insert($this->_table['categories'], $data);
	}

	public function update_cat($id, $data)
	{
		return $this->db->where('id', $id)->update($this->_table['categories'], $data);
	}


	public function remove_cat($id)
	{
		return $this->db->delete($this->_table['categories'], ['id' => $id]);
	}













}