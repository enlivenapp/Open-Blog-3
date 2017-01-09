<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Themes
 * 
 * Admin Themes Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_themes extends OB_AdminController {

	/**
     * Construct
     * 
     * Don't have much done with theming just
     * yet, but this will get more later
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

		if ( ! $this->ion_auth->has_permission('themes'))
		{
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('Admin_themes_m');
		//$this->load->model('ion_auth_model');
		//
		$this->template->set('active_link', 'themes');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');


	}

	/**
     * Construct
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function index()
	{
		$data['themes'] = $this->Admin_themes_m->get_themes();

		$this->template->build('admin/themes/index', $data);
	}

	/**
     * activate
     * 
     * activates a new theme and deactivates
     * the current one
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function activate($id)
	{
		// this activates the theme of a 
		// specific type (regular or admin)
		// and sets the currently active
		// theme to 0.
		$new_theme = $this->Admin_themes_m->get_theme_by_id($id);

		// now we have the theme being
		// activated, we can process it's
		// currently active counterpart.
		if ($this->Admin_themes_m->active_new_theme($new_theme))
		{
			//it worked
			$this->session->set_flashdata('success', lang('themes_activated_success_resp'));
			redirect('admin_themes');
		}
		// failed
		$this->session->set_flashdata('error', lang('themes_activated_fail_resp'));
		redirect('admin_themes');
		    
	}

}
