<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pages extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		if ( ! $this->ion_auth->has_permission('pages'))
		{
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('admin_pages_m');
		//$this->load->model('ion_auth_model');

		$this->template->set('active_link', 'pages');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


	}


	public function index()
	{
		$data['pages'] = $this->admin_pages_m->get_pages();

		$this->template->build('pages/index', $data);
	}


	public function add_page()
	{	
		$this->template->append_css('markdown.min.css');
		$this->template->append_js('markdown.min.js');
		
		if ($this->input->post())
		{

			$this->form_validation->set_rules('title', lang('page_form_title_text'), 'required');
			$this->form_validation->set_rules('status', lang('page_form_status_text'), 'required|in_list[active,inactive]');
			$this->form_validation->set_rules('content', lang('page_form_content_text'), 'required');
			
			$build_slug = true;
			// Did an advanced user enter the url_title/slug?
			if ($this->input->post('url_title'))
			{	
				// yup, so lets validate that...
				$this->form_validation->set_rules('url_title', lang('page_form_title_text'), 'required|alpha_dash|is_unique[pages.url_title]');
				$build_slug = false;
			}
		}

		// did they pass validations?
		if ($this->form_validation->run() == TRUE)
        {
        	// yes, so we'll start.
        	$post_data = $this->input->post();

        	// do we need to build the slug/url_title?
        	if ($build_slug)
        	{
        		$config = [
				    'field' => 'url_title',
				    'title' => $post_data['title'],
				    'table' => 'pages'
				];
        		$this->load->library('slug', $config);

        		$post_data['url_title'] = $this->slug->create_uri($post_data['title']);
        		
        	}

        	// determine if is_home should be set to 1 or 0
        	// default is 0
        	$post_data['is_home'] = 0;
        	if ($this->input->post('is_home'))
        	{
        		$post_data['is_home'] = 1;
        	}

        	// get author info
        	$post_data['author'] 	= $this->ion_auth->get_user_id();

        	// the date
        	$post_data['date']		= date('Y-m-d');

        	// do the insert
        	if ($this->admin_pages_m->add_page($post_data))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('page_added_success_resp'));
				redirect('admin/admin_pages');
        	}
        	// failed
        	$data['message'] = lang('page_added_fail_resp');
			$this->template->build('pages/add_page'); 
        }
        $this->template->build('pages/add_page');       
	}


	public function edit_page($id)
	{
		$this->template->append_css('markdown.min.css');
		$this->template->append_js('markdown.min.js');


		$data['page'] = $this->admin_pages_m->get_page($id);

		if ($this->input->post())
		{
			// set default for changing url_title
			$new_slug = false;

			$this->form_validation->set_rules('title', lang('page_form_title_text'), 'required');
			$this->form_validation->set_rules('status', lang('page_form_status_text'), 'required|in_list[active,inactive]');
			$this->form_validation->set_rules('content', lang('page_form_content_text'), 'required');
			
			// does the old url_title match the one from the form?
			if ($this->input->post('url_title') != $data['page']['url_title'])
			{	
				// they do not, set $new_slug true
				// and validation rules.
				$new_slug = true;
				$this->form_validation->set_rules('url_title', lang('page_form_title_text'), 'required|alpha_dash|is_unique[pages.url_title]');
				$this->form_validation->set_rules('redirection', lang('page_form_redirect_text'), 'required|in_list[none,301,302]');
			}
		}

		// did they pass validations?
		if ($this->form_validation->run() == TRUE)
        {
        	// yes, so we'll start updating.
        	$post_data = $this->input->post();

        	// get the redirect out of the update data
        	$redirect_val = $this->input->post('redirection');
        	unset($post_data['redirection']);

        	// determine if is_home should be set to 1 or 0
        	// default is 0
        	$post_data['is_home'] = 0;
        	if ($this->input->post('is_home'))
        	{
        		$post_data['is_home'] = 1;
        	}

        	// determine if we're doing the new_slug/url_title thing
        	// and redirection...
        	if ($new_slug)
        	{
        		// determine what they want to do about the old
        		// slug and if we should redirect.
        		switch ($redirect_val) {
        			case 'none':
        				// they're don't want redirection... bounce
        				break;
        			case '301' || '302':
        				// set_redirect($old_slug, $new_slug, type=pages|post, $code)
        				$this->obcore->set_redirect($data['page']['url_title'], $post_data['url_title'], 'pages', $redirect_val);
        				break;
        			default:
        				// set_redirect($old_slug, $new_slug, type=pages|post, $code)
        				$this->obcore->set_redirect($data['page']['url_title'], $post_data['url_title'], 'pages', '301');
        				break;
        		}
        	}

        	// do the update
        	if ($this->admin_pages_m->update_page($id, $post_data))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('page_update_success_resp'));
				redirect('admin/admin_pages');
        	}
        	// failed
        	$data['message'] = lang('page_update_fail_resp');
			$this->template->build('pages/edit_page', $data); 
        }
        $this->template->build('pages/edit_page', $data);    

	}


	public function remove_page($id)
	{
		// remove the page
		if ($this->admin_pages_m->remove_page($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('page_removed_success_resp'));
			redirect('admin/admin_pages');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('page_removed_fail_resp'));
		redirect('admin/admin_pages');
	}






}