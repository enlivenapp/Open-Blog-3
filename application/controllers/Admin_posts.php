<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Posts
 * 
 * Admin Posts Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_posts extends OB_AdminController {

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

		if ( ! $this->ion_auth->has_permission('posts'))
		{
			$this->session->set_flashdata('error', lang('permission_check_failed'));
			redirect();
		}

		$this->template->append_css('default.css');
		$this->template->append_css('ie10-viewport-bug-workaround.css');
		
		
		$this->template->append_js('ie10-viewport-bug-workaround.js');

		$this->load->model('Admin_posts_m');
		//$this->load->model('ion_auth_model');

		$this->template->set('active_link', 'posts');

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
		$data['posts'] = $this->Admin_posts_m->get_posts();

		$this->template->build('admin/posts/index', $data);
	}


	/**
     * add_post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function add_post()
	{	
		$this->template->append_css('markdown.min.css');
		$this->template->append_js('markdown.min.js');

		// get categories
		$data['cats'] = $this->Admin_posts_m->get_cats_form();
		
		if ($this->input->post())
		{

			$this->form_validation->set_rules('title', lang('post_form_title_text'), 'required');
			$this->form_validation->set_rules('status', lang('post_form_status_text'), 'required|in_list[draft,published]');
			$this->form_validation->set_rules('content', lang('post_form_content_text'), 'required');
			$this->form_validation->set_rules('excerpt', lang('post_form_excerpt_text'), 'required');
			$this->form_validation->set_rules('cats[]', lang('cats_hdr'), 'required');
			
			$build_slug = true;
			// Did an advanced user enter the url_title/slug?
			if ($this->input->post('url_title'))
			{	
				// yup, so lets validate that...
				$this->form_validation->set_rules('url_title', lang('post_form_title_text'), 'required|alpha_dash|is_unique[posts.url_title]');
				$build_slug = false;
			}
		}

		// did they pass validations?
		if ($this->form_validation->run() == TRUE)
        {
        		
        	// yes, so we'll start.
        	$post_data = $this->input->post();

        	// did they upload a feature image?
        	if ($_FILES['feature_image'])
        	{
        		$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|mp4|mpeg|mpg';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('feature_image'))
                {
                	$data['message'] = $this->upload->display_errors();

                    $this->template->build('admin/posts/edit_post', $data);  
                }
                else
                {
                    $img_data = $this->upload->data();

                    $post_data['feature_image'] = $img_data['file_name'];
                	
                }
        	}

        	// do we need to build the slug/url_title?
        	if ($build_slug)
        	{
        		$config = [
				    'field' => 'url_title',
				    'title' => $post_data['title'],
				    'table' => 'posts'
				];
        		$this->load->library('slug', $config);

        		$post_data['url_title'] = $this->slug->create_uri($post_data['title']);
        		
        	}

        	// get author info
        	$post_data['author'] 	= $this->ion_auth->get_user_id();

        	// the date
        	$post_data['date_posted']		= date('Y-m-d');

        	// do the insert
        	if ($this->Admin_posts_m->add_post($post_data))
        	{
        		// add the categories
        		

        		// succeeded
        		$this->session->set_flashdata('success', lang('post_added_success_resp'));
				redirect('admin_posts');
        	}
        	// failed
        	$data['message'] = lang('post_added_fail_resp');
			$this->template->build('admin/posts/add_post', $data); 
        }
        $this->template->build('admin/posts/add_post', $data);       
	}

	/**
     * edit_post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the post ID
     * 
     * @return  null
     */
	public function edit_post($id)
	{
		$this->template->append_css('markdown.min.css');
		$this->template->append_js('markdown.min.js');


		$data['post'] = $this->Admin_posts_m->get_post($id);

		if ($this->input->post())
		{

			// set default for changing url_title
			$new_slug = false;

			$this->form_validation->set_rules('title', lang('post_form_title_text'), 'required');
			$this->form_validation->set_rules('status', lang('post_form_status_text'), 'required|in_list[draft,published]');
			$this->form_validation->set_rules('content', lang('post_form_content_text'), 'required');
			$this->form_validation->set_rules('excerpt', lang('post_form_excerpt_text'), 'required');
			
			// does the old url_title match the one from the form?
			if ($this->input->post('url_title') != $data['post']['url_title'])
			{	
				// they do not, set $new_slug true
				// and validation rules.
				$new_slug = true;
				$this->form_validation->set_rules('url_title', lang('post_form_title_text'), 'required|alpha_dash|is_unique[posts.url_title]');
				$this->form_validation->set_rules('redirection', lang('post_form_redirect_text'), 'required|in_list[none,301,302]');
			}
		}

		// did they pass validations?
		if ($this->form_validation->run() == TRUE)
        {
        	// yes, so we'll start updating.
        	$post_data = $this->input->post();


        	// did they upload a feature image?
        	if ($_FILES['feature_image'])
        	{
        		$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|mp4|mpeg|mpg';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('feature_image'))
                {
                	$data['message'] = $this->upload->display_errors();

                    $this->template->build('admin/posts/edit_post', $data);  
                }
                else
                {
                    $img_data = $this->upload->data();

                    $post_data['feature_image'] = $img_data['file_name'];
                	
                }
        	}

        	// get the redirect out of the update data
        	$redirect_val = $this->input->post('redirection');
        	unset($post_data['redirection']);

        	// determine if we're doing the new_slug/url_title thing
        	// and redirection...
        	if ($new_slug)
        	{
        		// determine what they want to do about the old
        		// slug and if we should redirect.
        		switch ($redirect_val) {
        			case 'none':
        				// they're don't want redirection... bounce
        				break;
        			case '301' || '302':
        				// set_redirect($old_slug, $new_slug, type=posts|post, $code)
        				$this->obcore->set_redirect($data['post']['url_title'], $post_data['url_title'], 'post', $redirect_val);
        				break;
        			default:
        				// set_redirect($old_slug, $new_slug, type=posts|post, $code)
        				$this->obcore->set_redirect($data['post']['url_title'], $post_data['url_title'], 'post', '301');
        				break;
        		}
        	}

        	// do the update
        	if ($this->Admin_posts_m->update_post($id, $post_data))
        	{
        		// succeeded
        		$this->session->set_flashdata('success', lang('post_update_success_resp'));
				redirect('admin_posts');
        	}
        	// failed
        	$data['message'] = lang('post_update_fail_resp');
			$this->template->build('posts/edit_post', $data); 
        }
        $this->template->build('admin/posts/edit_post', $data);    

	}

	/**
     * remove_post
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the post ID
     * 
     * @return  null
     */
	public function remove_post($id)
	{
		// remove the post
		if ($this->Admin_posts_m->remove_post($id))
		{
			//it worked
			$this->session->set_flashdata('success', lang('post_removed_success_resp'));
			redirect('admin_posts');
		}
		// failed to remove
		$this->session->set_flashdata('error', lang('post_removed_fail_resp'));
		redirect('admin_posts');
	}






}