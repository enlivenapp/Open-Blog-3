<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Comments
 * 
 * Admin Comments Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_navigation extends OB_AdminController {

	/**
     * Construct
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function __construct()
	{
		parent::__construct();

		// does this user have permission to access this?
		if ( ! $this->ion_auth->has_permission('navigation'))
		{
			// nope!  Away!
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		// load up template stuff
		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		$this->template->append_js('ie10-viewport-bug-workaround.js');
		$this->template->set('active_link', 'navigation');

		// load models et al
		$this->load->model('Admin_navs_m');
		$this->load->helper('form');
		$this->load->library('form_validation');

		// language files
		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		// form validation
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
	}

	/**
     * index
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function index()
	{
		// load JS for fancy drag and drop
		$this->template->append_css('jquery-ui.min.css');
		$this->template->append_css('jquery-ui.structure.min.css');
		$this->template->append_js('jquery-ui.min.js');

		// get a list of the nav items
		$data['navs'] = $this->Admin_navs_m->get_navs();

		// get the list of redirects
		$data['redirects']	= $this->Admin_navs_m->get_redirects();

		// off you go sonnie
		$this->template->build('admin/navigation/index', $data);
	}

	/**
     * add_nav
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function add_nav()
	{	
		// default empty array
		$data = [];

		// get page slugs...
		$data['page_slugs'] = $this->Admin_navs_m->get_page_slugs();

		// get post slugs
		$data['post_slugs'] = $this->Admin_navs_m->get_post_slugs();

		// form submit attempt?
		if ($this->input->post())
		{
			// indeed, set rules
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

        // no love for forms... build the form
        $this->template->build('admin/navigation/add_nav', $data);       
	}

	/**
     * edit
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function edit($id)
	{
		// get nav items
		$data['nav'] = $this->Admin_navs_m->get_nav($id);

		// get page slugs
		$data['page_slugs'] = $this->Admin_navs_m->get_page_slugs();

		// get post slugs
		$data['post_slugs'] = $this->Admin_navs_m->get_post_slugs();

		// form submit attempt?
		if ($this->input->post())
		{
			// sì, set validation rules
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

	/**
     * remove_nav
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
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

	/*

	AJAX STUFF

 	*/
 
	/**
     * update_nav_order
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  json
     */
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

	/**
     * edit_redirect
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function edit_redirect($id)
	{
		// init emplty array
		$data = [];

		// get the single redirect item
		$data['redir'] = $this->admin_navs_m->get_redirect($id);

		// form submit attempt?
		if ($this->input->post())
		{
			// yup, set rules
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

	/**
     * remove_redirect
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function remove_redirect($id)
	{
		// remove the nav
		if ($this->Admin_navs_m->remove_redirect($id))
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
