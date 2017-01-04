<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_updates extends OB_AdminController {

	public function __construct()
	{
		parent::__construct();

		if ( ! $this->ion_auth->has_permission('updates'))
		{
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('Admin_updates_m');
		
		$this->template->set('active_link', 'updates');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


	}


	public function index()
	{
		$data['update_avail'] = $this->Admin_updates_m->check_for_update();

		$this->template->build('admin/updates/index', $data);
	}

	public function do_update()
	{
		if ($this->Admin_updates_m->perform_update())
		{
    		// succeeded
    		$this->session->set_flashdata('success', lang('updates_update_success_resp'));
			redirect('admin_updates');
        }
        // failed
		$this->session->set_flashdata('error', lang('updates_update_failed_resp'));
		redirect('admin_updates');
    }


}
