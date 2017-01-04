<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin_cats
 * 
 * Admin Categories Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_cats extends OB_AdminController 
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
		if ( ! $this->ion_auth->has_permission('posts'))
		{
			// curbed!
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		// template stuff
		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		$this->template->append_js('ie10-viewport-bug-workaround.js');
		$this->template->set('active_link', 'cats');

		// load all the things
		$this->load->model('Admin_cats_m');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->language('auth', $this->session->language);
		$this->load->language('ion_auth', $this->session->language);

		// set validation error
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
		// get the categories
		$data['cats'] = $this->Admin_cats_m->get_cats();

		//build it
		$this->template->build('admin/cats/index', $data);
	}


	/**
     * add_cat
     * 
     * Add Category
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function add_cat()
	{
		// do we have a form submit?
		if ($this->input->post())
		{
			// yup, set rules
			$this->form_validation->set_rules('name', lang('cat_form_name'), 'required');
			$this->form_validation->set_rules('url_name', lang('cat_form_url'), 'required');
			$this->form_validation->set_rules('description', lang('cat_form_desc'), 'required');
		}

		// pass vaidation?
		if ($this->form_validation->run() == TRUE)
        {
        	// yep.  Add it.
        	if ($this->Admin_cats_m->add_cat($this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('cat_added_success_resp'));
				redirect('admin_cats');
        	}
        	// failed
        	$data['message'] = lang('cat_added_fail_resp');
			$this->template->build('admin/cats/add_cat'); 
        }
        // no form submit, show the form
        $this->template->build('admin/cats/add_cat');       
	}

	/**
     * edit_cat
     * 
     * Edit Category
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the category id in the database
     * 
     * @return  null
     */
	public function edit_cat($id)
	{
		// get the category we're editing
		$data['cat'] = $this->Admin_cats_m->get_cat($id);

		// did we have a form submit?
		if ($this->input->post())
		{
			// yup, set validation rules
			$this->form_validation->set_rules('name', lang('cat_form_name'), 'required');
			$this->form_validation->set_rules('url_name', lang('cat_form_url'), 'required');
			$this->form_validation->set_rules('description', lang('cat_form_desc'), 'required');
		}

		// did validation pass?
		if ($this->form_validation->run() == TRUE)
        {
        	// yup, update the category
        	if ($this->Admin_cats_m->update_cat($id, $this->input->post()))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('cat_update_success_resp'));
				redirect('admin_cats');
        	}
        	// failed
        	$data['message'] = lang('cat_update_fail_resp');
			$this->template->build('admin/cats/edit_cat', $data); 
        }
        // no form submit, show the form
        $this->template->build('admin/cats/edit_cat', $data);    

	}

	/**
     * remove_cat
     * 
     * Remove Category
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the category id in the database
     * 
     * @return  null
     */
	public function remove_cat($id)
	{
		// remove the cat
		if ($this->Admin_cats_m->remove_cat($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('cat_removed_success_resp'));
			redirect('admin_cats');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('cat_removed_fail_resp'));
		redirect('admin_cats');
	}
}
