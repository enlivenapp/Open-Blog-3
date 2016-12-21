<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{


	public function __construct()
	{

		// here's where we'll autoload all the site specific stuff
		// from the database... 
		parent::__construct();

		$this->benchmark->mark('my_controller_start');
		// we use this everywhere
		$this->load->library('Auth/ion_auth');
		$this->load->library('blogcore');

		// get theme info
		$theme = $this->blogcore->get_active_theme();

		// get all the settings from the db
		$settings = $this->blogcore->db_to_config();

		if ($this->config->item('site_name'))
		{
			$this->template->title($this->config->item('site_name'));
		}


		// because PITassets...
		Asset::set_url(base_url());
		Asset::add_path('core', base_url('application/themes/' . $theme->path . '/'));


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
					->set('nav', $this->blogcore->get_navigation())
					->set('social_list', $this->blogcore->generate_social_links());

		$this->benchmark->mark('my_controller_end');
	}





}