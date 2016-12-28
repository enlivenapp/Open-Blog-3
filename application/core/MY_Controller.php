<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{


	public function __construct()
	{
		// here's where we'll autoload all the site specific stuff
		// from the database... 
		parent::__construct();

		//$this->output->enable_profiler($this->config->item('enable_profiler'));
		
		$this->benchmark->mark('my_controller_start');

		$this->load->library('obcore');
		
		// Set default language. The user can
		// choose to overwrite session data or the
		// site owner can choose to use a different language
		if ( ! $this->session->language )
		{
			$this->obcore->set_lang();
		}


		// Allow for something other than 'blog' to be the 
		// "base_controller" by means of a redirect. Similar
		// to WordPress functionality.
		// Your new base controller *MUST* contain an index()
		// method or things will get ugly fast.	
		// 
		// TODO: Change this to actually make the base_controller
		// the base_controller in config.php so the site root shows 
		// the correct controller without using uri section 1?
		//if ($this->config->item('base_controller') != 'blog')
		//{
		//	redirect($this->config->item('base_controller'));
		//}


		// we use this everywhere
		$this->load->library('ion_auth');
		$this->load->model('blog/blog_m');
		$this->load->language('blog', $this->session->language);

		// get theme info
		$theme = $this->obcore->get_active_theme();

		// get all the settings from the db
		$settings = $this->obcore->db_to_config();

		if ($this->config->item('site_name'))
		{
			$this->template->title($this->config->item('site_name'));
		}


		// because PITassets...
		Asset::set_url(base_url());
		Asset::add_path('core', base_url('application/themes/' . $theme->path . '/'));
		$this->template->set_theme($theme->path);


		$this->template->append_css('default.css');
		

		// let's set up default places for template partials.
		// all of these can be used or not as needed.
		$this->template
				->set_partial('nav', 'nav')
				->set_partial('archives', 'archives')
				->set_partial('categories', 'categories')
				->set_partial('feeds', 'feeds')
				->set_partial('links', 'links')
				->set_partial('social', 'social');

		$this->template
				->set('nav', $this->obcore->get_navigation())
				->set('archives_list', $this->blog_m->get_archive())
				->set('links_list', $this->blog_m->get_links())
				->set('categories_list', $this->blog_m->get_categories())
				->set('social_list', $this->obcore->generate_social_links());


		$this->benchmark->mark('my_controller_end');
	}





}