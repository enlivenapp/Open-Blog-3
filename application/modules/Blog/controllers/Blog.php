<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('blog_m');
		$this->load->model('categories_m');
	}

	
	public function index()
	{
		// set vars for useful partials data
	/*	$this->template
			->set('archives_list', $this->blog_m->get_archive())
			->set('categories_list', $this->blog_m->get_categories())
			->set('feeds_list', [])
			->set('links_list', $this->blog_m->get_links())
		;
*/		
		// get the posts
		$posts = $this->blog_m->get_posts();

		
		//Create Pagination
		$this->load->library('pagination');

		/*
			the setting for bootstrap 3 or Semantic UI are 
			already set in /applications/config/pagination.php
		 */ 
		
		$config['base_url'] = site_url();
		$config['total_rows'] = $post->post_count;
		$config['per_page'] = $this->config->item('posts_per_page');

		// docs say we don't have to if we have a config file, but we have to	
		$this->pagination->initialize($config);

		// tasty Links
		$data['pagination'] = $this->pagination->create_links();
		$data['posts']= $posts->posts;
		
		

		$this->template->build('index', $data);
	}






} // EOC