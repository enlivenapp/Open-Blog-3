<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_themes extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		if ( ! $this->ion_auth->has_permission('themes'))
		{
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('admin_themes_m');
		//$this->load->model('ion_auth_model');
		//
		$this->template->set('active_link', 'themes');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


	}


	public function index()
	{
		$data['themes'] = $this->admin_themes_m->get_themes();

		$this->template->build('themes/index', $data);
	}

	public function activate($id)
	{
		// this activates the theme of a 
		// specific type (regular or admin)
		// and sets the currently active
		// theme to 0.
		$new_theme = $this->admin_themes_m->get_theme_by_id($id);

		// now we have the theme being
		// activated, we can process it's
		// currently active counterpart.
		if ($this->admin_themes_m->active_new_theme($new_theme))
		{
			//it worked
			$this->session->set_flashdata('success', lang('themes_activated_success_resp'));
			redirect('admin/admin_themes');
		}
		// failed
		$this->session->set_flashdata('error', lang('themes_activated_fail_resp'));
		redirect('admin/admin_themes');
		    
	}

	public function remove_cat($id)
	{
		// remove the cat
		if ($this->admin_cats_m->remove_cat($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('cat_removed_success_resp'));
			redirect('admin/admin_cats');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('cat_removed_fail_resp'));
		redirect('admin/admin_cats');
	}












}
