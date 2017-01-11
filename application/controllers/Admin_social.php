<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Social
 * 
 * Admin Social Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_social extends OB_AdminController {

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

		// add things we use in views
		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		// Admin model
		$this->load->model('Admin_social_m');

		// form helper
		$this->load->helper('form');

		// form validation
		$this->load->library('form_validation');

		// Ion_auth
		$this->load->language('ion_auth');

		// set form validation error default
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
		
		// does the user have permission to 
		// view/use this method?
		if ( ! $this->ion_auth->has_permission('social'))
		{
			// nope, boot'm out
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		// set active_link so we know what to 
		// set class="active" to in the nav menu
		$this->template->set('active_link', 'social');
	}

	/**
     * Index
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function index()
	{
		// get social links
		$data['social'] = $this->Admin_social_m->get_social_links();

		// build it and they will come.
		$this->template->build('admin/social/index', $data);
	}

	/**
     * add
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function add()
	{
		// do we have a form submit?
		if ($this->input->post())
		{
			// yup, set rules
			$this->form_validation->set_rules('name', lang('social_form_name'), 'required');
			$this->form_validation->set_rules('url', lang('social_form_url'), 'required');
			$this->form_validation->set_rules('enabled', lang('social_form_active'), 'required');
		}

		// pass vaidation?
		if ($this->form_validation->run() == TRUE)
        {
        	// yep.  Add it.
        	if ($this->Admin_social_m->add_social($this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('social_added_success_resp'));
				redirect('admin_social');
        	}
        	// failed
        	$data['message'] = lang('social_added_fail_resp');
			$this->template->build('admin/social/add'); 
        }
        // no form submit, show the form    
		$this->template->build('admin/social/add');
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
		// get the category we're editing
		$data['social'] = $this->Admin_social_m->get_social_link($id);

		// did we have a form submit?
		if ($this->input->post())
		{
			// yup, set validation rules
			$this->form_validation->set_rules('name', lang('social_form_name'), 'required');
			$this->form_validation->set_rules('url', lang('social_form_url'), 'required');
			$this->form_validation->set_rules('enabled', lang('social_form_active'), 'required');
		}

		// did validation pass?
		if ($this->form_validation->run() == TRUE)
        {
        	// yup, update the category
        	if ($this->Admin_social_m->update_social($id, $this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('social_update_success_resp'));
				redirect('admin_social');
        	}
        	// failed
        	$data['message'] = lang('social_update_fail_resp');
			$this->template->build('admin/social/edit', $data); 
        }
        // no form submit, show the form
        $this->template->build('admin/social/edit', $data);    
	}

	/**
     * remove
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the ID to remove
     * 
     * @return  null
     */
	public function remove($id)
	{
		if ($this->Admin_social_m->remove($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('social_removed_success_resp'));
			redirect('admin_social');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('social_removed_fail_resp'));
		redirect('admin_social');
	}


}
