<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Notices
 * 
 * Public Notices Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Notices extends OB_Controller {

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

		$this->load->model('Notices_m');
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
		exit('No direct script access allowed');
	}

	/**
     * New
     * 
     * Creates a new entry so people get new content 
     * as it's published
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function add()
	{
		if ($this->input->post())
		{
               $this->load->library('form_validation'); 
               
               $this->form_validation->set_rules('email_address', lang('email_address'), 'required|valid_email');

               if ($this->form_validation->run() == TRUE)
               {
                    if ($this->Notices_m->insert_email($this->input->post('email_address')))
                    {
                         $this->session->set_flashdata('success', lang('notices_add_success'));
                         redirect();   
                    }
               }
          $this->session->set_flashdata('error', lang('notices_no_post_data'));
          redirect();     
		}

		$this->session->set_flashdata('error', lang('notices_no_post_data'));
		redirect();
	}

     /**
     * verify
     * 
     * verifies the subscriber's email via
     * md5 hashed code.
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
     public function verify($verify_code=false)
     {
          if ( ! $verify_code )
          {
               $this->session->set_flashdata('error', lang('notices_verify_failed'));
               redirect();
          }

          if ($this->Notices_m->verify_email($verify_code))
          {
               $this->session->set_flashdata('success', lang('notices_verify_success'));
               redirect();
          }
          $this->session->set_flashdata('error', lang('notices_verify_failed'));
          redirect();
     }

     /**
     * unsub
     * 
     * Unsubscribes an email address
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
     public function unsub()
     {
          if ($this->input->post())
          {
               if ($this->Notices_m->unsub($this->input->post('email_address')))
               {
                    $this->session->set_flashdata('success', lang('notify_unsub_success'));
                    redirect();

               }
               $this->session->set_flashdata('error', lang('notices_email_not_exists'));
               redirect('notices/unsub');
          }

          // build the form page
          $this->template->build('notices/unsub');
     }

}
