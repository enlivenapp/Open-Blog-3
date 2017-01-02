<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_updates extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();


		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('admin_updates_m');
		
		$this->template->set('active_link', 'updates');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


	}


	public function index()
	{
		$data['update_avail'] = $this->admin_updates_m->check_for_update();

		$this->template->build('updates/index', $data);
	}


}
