<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Links
 * 
 * Admin Links Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_links extends OB_AdminController {

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

		// do they have permission to access 
		// this controller?
		if ( ! $this->ion_auth->has_permission('links'))
		{
			// away evil scum!
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		// load template stuff
		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		$this->template->append_js('ie10-viewport-bug-workaround.js');
		$this->template->set('active_link', 'links');
		
		// load models et al
		$this->load->model('Admin_links_m');
		$this->load->helper('form');
		$this->load->library('form_validation');

		// load language files
		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		// set validation errors
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
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
		// get the links
		$data['links'] = $this->Admin_links_m->get_links();

		// build page
		$this->template->build('/admin/links/index', $data);
	}

	/**
     * add_link
     * 
     * Adds a new link
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function add_link()
	{
		// do we have a form submit?
		if ($this->input->post())
		{
			// yup, set validation rules
			$this->form_validation->set_rules('name', lang('link_form_name'), 'required');
			$this->form_validation->set_rules('url', lang('link_form_url'), 'required|valid_url');
			$this->form_validation->set_rules('target', lang('link_form_target'), 'required');
			$this->form_validation->set_rules('description', lang('link_form_desc'), 'required');
			$this->form_validation->set_rules('visible', lang('link_form_visibility'), 'required');
			$this->form_validation->set_rules('position', lang('link_form_position'), 'required|numeric');
		}

		// did the submit attempt pass validation?
		if ($this->form_validation->run() == TRUE)
        {
        	// yes, try to add the link
        	if ($this->Admin_links_m->add_link($this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('link_added_success_resp'));
				redirect('admin_links');
        	}
        	// failed
        	$data['message'] = lang('link_added_fail_resp');
			$this->template->build('admin/links/add_link'); 
        }

        // no submit attempt, build page
        $this->template->build('admin/links/add_link');       
	}

	/**
     * edit_link
     * 
     * Edits an existing link
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the id of the link
     * 
     * @return  null
     */
	public function edit_link($id)
	{
		// get the link in question
		$data['link'] = $this->Admin_links_m->get_link($id);

		// form submit attempt?
		if ($this->input->post())
		{
			// yup,  set validation rules
			$this->form_validation->set_rules('name', lang('link_form_name'), 'required');
			$this->form_validation->set_rules('url', lang('link_form_url'), 'required|valid_url');
			$this->form_validation->set_rules('target', lang('link_form_target'), 'required');
			$this->form_validation->set_rules('description', lang('link_form_desc'), 'required');
			$this->form_validation->set_rules('visible', lang('link_form_visibility'), 'required');
			$this->form_validation->set_rules('position', lang('link_form_position'), 'required|numeric');
		}

		// validation passed?
		if ($this->form_validation->run() == TRUE)
        {
        	// yup, try to update the db
        	if ($this->Admin_links_m->update_link($id, $this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('link_update_success_resp'));
				redirect('admin_links');
        	}
        	// failed
        	$data['message'] = lang('link_update_fail_resp');
			$this->template->build('admin/links/edit_link', $data); 
        }

        // no submit attempt, build form
        $this->template->build('admin/links/edit_link', $data);    

	}

	/**
     * remove_link
     * 
     * Deletes an existing link
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the id of the link
     * 
     * @return  null
     */
	public function remove_link($id)
	{
		// try to remove the link
		if ($this->Admin_links_m->remove_link($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('link_removed_success_resp'));
			redirect('admin_links');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('link_removed_fail_resp'));
		redirect('admin_links');
	}

}
