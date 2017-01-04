<?php

class Admin_updates_m extends CI_Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::__construct();

		// Load needed models, libraries, helpers and language files
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];

		$this->update_url = $this->config->item('ob_updates_url');
	}


	public function check_for_update()
	{
		

		if ($this->_isCurl())
		{
			$this->load->library('curl');

			if ($release_version = $this->curl->simple_get($this->update_url))
			{
				return (array) json_decode($release_version);
			}
			else
			{
				return ['status' => 'failed', 'message' => lang('updates_failed_connection')];
			}

		}
		//elseif (wget...)
	}


	public function perform_update()
	{
		return false;
	}





	public function _isCurl()
	{
    	return function_exists('curl_init');
	}



}