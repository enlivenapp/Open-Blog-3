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
class Admin_comments extends OB_AdminController 
{


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

		// does the user have permission to 
		// view/use this method?
		if ( ! $this->ion_auth->has_permission('comments'))
		{
			// "out damn'd spot. out, I say!" -  Shakespeare
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		// template stuff
		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		$this->template->append_js('ie10-viewport-bug-workaround.js');
		$this->template->set('active_link', 'comments');

		// loading needed things
		$this->load->model('Admin_comments_m');
		$this->load->helper('form');
		$this->load->library('form_validation');

		// language files
		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		// validation errors
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
		// get active comments
		$data['active_comments'] = $this->Admin_comments_m->get_comments();

		// get modded comments
		$data['modded_comments'] = $this->Admin_comments_m->get_comments(1);

		//build it
		$this->template->build('admin/comments/index', $data);
	}

	/**
     * edit_comment
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function edit_comment($id)
	{
		// get the comment info being edited
		$data['comment'] = $this->Admin_comments_m->get_comment($id);

		// attempted form submit?
		if ($this->input->post())
		{
			//yup, set validation rules
			$this->form_validation->set_rules('content', lang('comment_form_field_content'), 'required');
		}

		// does it pass validation
		if ($this->form_validation->run() == TRUE)
        {
        	// try to update it
        	if ($this->Admin_comments_m->update_comment($id, $this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('comment_update_success_resp'));
				redirect('admin_comments');
        	}
        	// failed
        	$data['message'] = lang('comment_update_fail_resp');
			$this->template->build('admin/comments/edit_comment', $data); 
        }
        // no form submit, build the page/form
        $this->template->build('admin/comments/edit_comment', $data);    

	}

	/**
     * remove_comment
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the db id of the comment
     * 
     * @return  null
     */
	public function remove_comment($id)
	{
		// try to remove the comment
		if ($this->Admin_comments_m->remove_comment($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('comment_removed_success_resp'));
			redirect('admin_comments');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('comment_removed_fail_resp'));
		redirect('admin_comments');
	}

	/**
     * accept_comment
     * 
     * set's the modded flag in the db to 0 so it will
     * appear on the blog post. 
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the db id of the comment
     * 
     * @return  null
     */
	public function accept_comment($id)
	{
		// try to set modded to 0
		if ($this->Admin_comments_m->accept_comment($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('comment_accept_success_resp'));
			redirect('admin_comments');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('comment_accept_fail_resp'));
		redirect('admin_comments');
	}


	/**
     * hide_comment
     * 
     * set's the modded flag in the db to 1 so it will
     * not appear on the blog post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the db id of the comment
     * 
     * @return  null
     */
	public function hide_comment($id)
	{
		// try to set modded to 1
		if ($this->Admin_comments_m->hide_comment($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('comment_hide_success_resp'));
			redirect('admin_comments');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('comment_hide_fail_resp'));
		redirect('admin_comments');
	}

}
