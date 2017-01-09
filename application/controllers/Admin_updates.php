<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Updates
 * 
 * Admin Updates Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_updates extends OB_AdminController {

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

		if ( ! $this->ion_auth->has_permission('updates'))
		{
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('Admin_updates_m');
		
		$this->template->set('active_link', 'updates');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

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
		$data['update_avail'] = $this->Admin_updates_m->check_for_update();

		$this->template->build('admin/updates/index', $data);
	}

	/**
     * do_update
     * 
     * Don't have much done with updates just
     * yet, but this will get more later
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function do_update()
	{
		if ($this->Admin_updates_m->perform_update())
		{
    		// succeeded
    		$this->session->set_flashdata('success', lang('updates_update_success_resp'));
			redirect('admin_updates');
        }
        // failed
		$this->session->set_flashdata('error', lang('updates_update_failed_resp'));
		redirect('admin_updates');
    }


}
