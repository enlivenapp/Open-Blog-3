<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin
 * 
 * Admin Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin extends OB_AdminController {

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
		$this->load->model('Admin_m');

		// form helper
		$this->load->helper('form');

		// form validation
		$this->load->library('form_validation');

		// Ion_auth
		$this->load->language('ion_auth');

		// set form validation error default
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
		// does the user have permission to 
		// view/use this method?
		if ( ! $this->ion_auth->has_permission('dashboard'))
		{
			// nope, boot'm out
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		// get info for the dashboard
		$data = $this->Admin_m->get_dashboard();

		// set active_link so we know what to 
		// set class="active" to in the nav menu
		$this->template->set('active_link', 'dashboard');

		// build it and they will come.
		$this->template->build('admin/index', $data);
	}


	/**
     * Settings
     * 
     * Shows and Updates website settings
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function settings()
	{
		// does the user have permission to 
		// view/use this method?
		if ( ! $this->ion_auth->has_permission('settings'))
		{
			//  nope, beat it punk!!!
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		// set active_link so we know what to 
		// set class="active" to in the nav menu
		$this->template->set('active_link', 'settings');

		// do we have a submitted form?
		if ($this->input->post())
		{
			// some fields aren't required, so we get the
			// ones that are, and set form_validation
			foreach ($this->Admin_m->get_required_settings() as $item)
			{
				$this->form_validation->set_rules($item->name, ucfirst($item->tab) . ' Tab - ' . ucwords(humanize($item->name)), 'required');
			}

			// form validation failed, send them back to 
			// the form to fix whatever it was.
			if ($this->form_validation->run() === FALSE)
            {
            	// get the list of settings
				$data = $this->Admin_m->get_settings_list();
                $this->template->build('admin/settings/index', $data);
            }
            // form_validation succeeded
            // let's insert the new values
            // and move on.
            if ($this->Admin_m->update_settings())
            {
            	$this->session->set_flashdata('success', lang('settings_update_success'));
            	redirect('admin/settings');
            }
            else
            {
            	$data['message'] = lang('settings_update_failed');
            	// get the list of settings
				$data = $this->Admin_m->get_settings_list();
				$this->template->build('admin/settings/index', $data);
            }
		}
		else
		{
			// get the list of settings
			$data = $this->Admin_m->get_settings_list();

			$this->template->build('admin/settings/index', $data);
		}
	}




}