<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{


	public function __construct()
	{

		// here's where we'll autoload all the site specific stuff
		// from the database... 
		parent::__construct();



		$this->benchmark->mark('my_controller_start');

		$this->load->model('blog_m');

		// get theme info
		$theme = $this->db->where('is_active', 1)->where('is_admin', 0)->limit(1)->get('templates')->row();

		// get all the settings from the db
		$settings = $this->db->get('settings')->result();

		foreach ($settings as $set)
		{
			$this->config->set_item($set->name, $set->value);	
		}

		if ($this->config->item('site_name'))
		{
			$this->template->title($this->config->item('site_name'));
		}


		// because PITassets...
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


		// set vars for useful partials data
		$this->template
			->set('nav', $this->get_navigation())
			->set('archives_list', $this->blog_m->get_archive())
			->set('categories_list', $this->blog_m->get_categories())
			->set('feeds_list', [])
			->set('links_list', $this->blog_m->get_links())
			->set('social_list', $this->generate_social_links());
		


		$this->benchmark->mark('my_controller_end');
	}


	protected function get_navigation()
	{
		$this->db->select('title, description, url, external, position');
		$this->db->order_by('position', 'ASC'); 
		
		$query = $this->db->get('navigation');
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}


	public function generate_social_links()
	{
		if ( ! $social = $this->db->where('enabled', '1')->get('social')->result())
		{
			return false;
		}
		else
		{
			$return = '';
			foreach ($social as $s)
			{
				$return .= anchor($s->url, $s->name) . ' | ';
			}
			$return .= '';
		}
		$return = rtrim($return, ' | ');

		return $return;
	}


}