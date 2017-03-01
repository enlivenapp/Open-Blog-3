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
class Admin_lang extends OB_AdminController {

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
		$this->load->model('Admin_lang_m');

		// form helper
		$this->load->helper('form');

		// form validation
		$this->load->library('form_validation');

		// Ion_auth
		$this->load->language('ion_auth', $this->session->language);

		// set form validation error default
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
		
		// does the user have permission to 
		// view/use this method?
		if ( ! $this->ion_auth->has_permission('lang'))
		{
			// nope, boot'm out
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		// set active_link so we know what to 
		// set class="active" to in the nav menu
		$this->template->set('active_link', 'lang');
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
		$data['langs'] = $this->Admin_lang_m->get_links();

		// build it and they will come.
		$this->template->build('admin/lang/index', $data);
	}



	/**
     * disable
     * 
     * marks a language is_avail = 0
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the ID to remove
     * 
     * @return  null
     */
	public function disable($id)
	{
		if ($this->Admin_lang_m->toggle_is_avail($id, '0'))
		{
			//it worked
			$this->session->set_flashdata('success', lang('languages_disable_success_resp'));
			redirect('admin_lang');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('languages_disable_fail_resp'));
		redirect('admin_lang');
	}

	/**
     * enable
     * 
     * marks a language is_avail = 1
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the ID to remove
     * 
     * @return  null
     */
	public function enable($id)
	{
		if ($this->Admin_lang_m->toggle_is_avail($id, '1'))
		{
			//it worked
			$this->session->set_flashdata('success', lang('languages_enable_success_resp'));
			redirect('admin_lang');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('languages_enable_fail_resp'));
		redirect('admin_lang');
	}


	/**
     * make_default
     * 
     * marks a language is_default = 1
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the ID to remove
     * 
     * @return  null
     */
	public function make_default($id)
	{
		if ($this->Admin_lang_m->make_default($id))
		{
			//it worked
			$lang = $this->Admin_lang_m->get_language($id);

			$this->session->set_userdata('language', $lang->language);
            $this->session->set_userdata('language_abbr', $lang->abbreviation);

			$this->session->set_flashdata('success', lang('languages_default_success_resp'));
			redirect('admin_lang');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('languages_default_fail_resp'));
		redirect('admin_lang');
	}


}
