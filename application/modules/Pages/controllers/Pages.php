<?php

class Pages extends MY_Controller
{
	// Constructor
	public function __construct()
	{
		parent::__construct();

		// Load needed models, libraries, helpers and language files
		$this->load->model('pages_m');
		
		$this->load->language('pages', $this->session->language);
	}

	public function index($page=null)
	{
		//$data = new stdClass();

		$data['page'] = $this->pages_m->get_home_page();

		$this->template->set_metadata('title', $data['page']['meta_title']);
		$this->template->set_metadata('keywords', $data['page']['meta_keywords']);
		$this->template->set_metadata('description', $data['page']['meta_description']);

		$this->template->build('index', $data);
	}

	// Public methods
	public function page($url_title)
	{
		$data['page_data'] = $this->pages_m->get_page_by_url($url_title);
			
		if ($data['page_data'] != "")
		{
			$this->_template['page']	= 'pages/page';
		}
		else
		{
			$this->_template['page']	= 'errors/404';
		}
			
		$this->system_library->load($this->_template['page'], $data);
	}
}