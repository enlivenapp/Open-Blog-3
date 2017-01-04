<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_navigation extends OB_AdminController {

	public function __construct()
	{
		parent::__construct();

		if ( ! $this->ion_auth->has_permission('navigation'))
		{
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('Admin_navs_m');
		//$this->load->model('ion_auth_model');

		$this->template->set('active_link', 'navigation');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


	}


	public function index()
	{
		$this->template->append_css('jquery-ui.min.css');
		$this->template->append_css('jquery-ui.structure.min.css');
		$this->template->append_js('jquery-ui.min.js');


		$data['navs'] = $this->Admin_navs_m->get_navs();
		$data['redirects']	= $this->Admin_navs_m->get_redirects();

		$this->template->build('admin/navigation/index', $data);
	}



	public function add_nav()
	{	
		$data = [];

		$data['page_slugs'] = $this->Admin_navs_m->get_page_slugs();
		$data['post_slugs'] = $this->Admin_navs_m->get_post_slugs();

		if ($this->input->post())
		{
			$this->form_validation->set_rules('title', lang('nav_form_title_text'), 'required');
			$this->form_validation->set_rules('description', lang('nav_form_description_text'), 'required');

			/* For simplicity this has been removed
			   from the RC. If you're a developer and
			   would like to be able to manually create
			   url links, you can uncomment below and
			   uncomment the form field in add_nav.php
			*/
			//if ($this->input->post('url'))
			//{	
				// yup, so lets validate that...
			//	$this->form_validation->set_rules('url', lang('nav_form_url_text'), 'required|alpha_dash|is_unique[navigation.url]');
			//}
		}

		// did they pass validations?
		if ($this->form_validation->run() == TRUE)
        {
        	// yes, so we'll start.
        	$nav_data = $this->input->post();

        	// do the insert
        	if ($this->Admin_navs_m->add_nav($nav_data))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('nav_added_success_resp'));
				redirect('admin_navigation');
        	}
        	// failed
        	$data['message'] = lang('nav_added_fail_resp');
			$this->template->build('admin/navigation/add_nav', $data); 
        }
        $this->template->build('admin/navigation/add_nav', $data);       
	}


	public function edit($id)
	{

		$data['nav'] = $this->Admin_navs_m->get_nav($id);
		$data['page_slugs'] = $this->Admin_navs_m->get_page_slugs();
		$data['post_slugs'] = $this->Admin_navs_m->get_post_slugs();

		if ($this->input->post())
		{
			$this->form_validation->set_rules('title', lang('nav_form_title_text'), 'required');
			$this->form_validation->set_rules('description', lang('nav_form_description_text'), 'required');
			
			// does the old url_title match the one from the form?
			// For developers who wish to allow manual uri entries.
			if ($this->input->post('url') && $this->input->post('url') != $data['nav']['url'])
			{
				$this->form_validation->set_rules('url', lang('nav_form_url_text'), 'required|alpha_dash|is_unique[navigation.url]');
				$this->form_validation->set_rules('redirection', lang('nav_form_redirect_text'), 'required|in_list[none,301,302]');
			}
		}

		// did they pass validations?
		if ($this->form_validation->run() == TRUE)
        {
        	// yes, so we'll start updating.
        	$nav_data = $this->input->post();

        	// do the update
        	if ($this->Admin_navs_m->update_nav($id, $nav_data))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('nav_update_success_resp'));
				redirect('admin_navigation');
        	}
        	// failed
        	$data['message'] = lang('nav_update_fail_resp');
			$this->template->build('admin/navigation/edit_nav', $data); 
        }
        $this->template->build('admin/navigation/edit_nav', $data);    

	}


	public function remove_nav($id)
	{
		// remove the nav
		if ($this->Admin_navs_m->remove_nav($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('nav_removed_success_resp'));
			redirect('admin_navigation');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('nav_removed_fail_resp'));
		redirect('admin_navigation');
	}


	public function update_nav_order()
	{
		if ($this->admin_navs_m->update_nav_order($this->input->post()))
		{
			echo json_encode(['status' => 'true']);
		}
		echo json_encode(['status' => 'false']);
	}


	/*
	
	Redirects

	 */

	public function edit_redirect($id)
	{
		$data = [];

		$data['redir'] = $this->admin_navs_m->get_redirect($id);

		if ($this->input->post())
		{
			$this->form_validation->set_rules('old_slug', lang('nav_redir_form_old_slug_text'), 'required');
			$this->form_validation->set_rules('new_slug', lang('nav_redir_form_new_slug_text'), 'required');
			$this->form_validation->set_rules('type', lang('nav_redir_form_type_text'), 'required');
			$this->form_validation->set_rules('code', lang('nav_redir_form_code_text'), 'required|in_list[301,302]');
		}

		// did they pass validations?
		if ($this->form_validation->run() == TRUE)
        {
        	// do the update
        	if ($this->admin_navs_m->update_redirect($id, $this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('nav_redirect_edit_success_resp'));
				redirect('admin/admin_navigation');
        	}
        	// failed
        	$data['message'] = lang('nav_redirect_edit_fail_resp');
			$this->template->build('navigation/edit_redir', $data); 
        }

		$this->template->build('navigation/edit_redir', $data);
	}



	public function remove_redirect($id)
	{
		// remove the nav
		if ($this->admin_navs_m->remove_redirect($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('nav_redirect_removed_success_resp'));
			redirect('admin/admin_navigation');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('nav_redirect_removed_fail_resp'));
		redirect('admin/admin_navigation');
	}















}