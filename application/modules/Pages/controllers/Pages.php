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
		// get page data
		$data['page'] = $this->pages_m->get_home_page();

		// set the meta/og/twitter meta tags
		$this->obcore->set_meta($data['page'], 'page', true);

		// build it
		$this->template->build('index', $data);
	}

	
	public function page($url_title)
	{
		$data['page'] = $this->pages_m->get_page_by_url($url_title);
			
		$this->template->build('index', $data);
	}
}