<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_links extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();


		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('admin_links_m');
		//$this->load->model('ion_auth_model');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


	}


	public function index()
	{
		$data['links'] = $this->admin_links_m->get_links();

		$this->template->build('links/index', $data);
	}

	public function add_link()
	{
		
		if ($this->input->post())
		{
			$this->form_validation->set_rules('name', lang('link_form_name'), 'required');
			$this->form_validation->set_rules('url', lang('link_form_url'), 'required|valid_url');
			$this->form_validation->set_rules('target', lang('link_form_target'), 'required');
			$this->form_validation->set_rules('description', lang('link_form_desc'), 'required');
			$this->form_validation->set_rules('visible', lang('link_form_visibility'), 'required');
			$this->form_validation->set_rules('position', lang('link_form_position'), 'required|numeric');
		}

		if ($this->form_validation->run() == TRUE)
        {
        	if ($this->admin_links_m->add_link($this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('link_added_success_resp'));
				redirect('admin/admin_links');
        	}
        	// failed
        	$data['message'] = lang('link_added_fail_resp');
			$this->template->build('links/add_link'); 
        }
        $this->template->build('links/add_link');       
	}


	public function edit_link($id)
	{
		$data['link'] = $this->admin_links_m->get_link($id);

		if ($this->input->post())
		{
			$this->form_validation->set_rules('name', lang('link_form_name'), 'required');
			$this->form_validation->set_rules('url', lang('link_form_url'), 'required|valid_url');
			$this->form_validation->set_rules('target', lang('link_form_target'), 'required');
			$this->form_validation->set_rules('description', lang('link_form_desc'), 'required');
			$this->form_validation->set_rules('visible', lang('link_form_visibility'), 'required');
			$this->form_validation->set_rules('position', lang('link_form_position'), 'required|numeric');
		}

		if ($this->form_validation->run() == TRUE)
        {
        	if ($this->admin_links_m->update_link($id, $this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('link_update_success_resp'));
				redirect('admin/admin_links');
        	}
        	// failed
        	$data['message'] = lang('link_update_fail_resp');
			$this->template->build('links/edit_link', $data); 
        }
        $this->template->build('links/edit_link', $data);    

	}


	public function remove_link($id)
	{
		// remove the link
		if ($this->admin_links_m->remove_link($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('link_removed_success_resp'));
			redirect('admin/admin_links');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('link_removed_fail_resp'));
		redirect('admin/admin_links');
	}












}
