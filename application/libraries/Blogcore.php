<?php

/**
 * CodeIgniter Template Class
 *
 * Build your CodeIgniter pages much easier with partials, breadcrumbs, layouts and themes
 *
 * @package			CodeIgniter
 * @subpackage		Open Blog Core
 * @category		Libraries
 * @author			Enliven Applications
 * @license			MIT
 * @link			http://open-blog.org
 */
class Blogcore
{
/**
	 * Loads in the config and sets the variables
	 */
	public function __construct()
	{
		$this->ci = &get_instance();
	}

	public function db_to_config()
	{
		$settings = $this->ci->db->get('settings')->result();

		foreach ($settings as $set)
		{
			$this->ci->config->set_item($set->name, $set->value);	
		}
	}

	public function get_active_theme()
	{
		return $this->ci->db->where('is_active', 1)->where('is_admin', 0)->limit(1)->get('templates')->row();
	}


	public function get_navigation()
	{
		$this->ci->db->select('title, description, url, external, position');
		$this->ci->db->order_by('position', 'ASC'); 
		
		$query = $this->ci->db->get('navigation');
			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}


	public function generate_social_links()
	{
		if ( ! $social = $this->ci->db->where('enabled', '1')->get('social')->result())
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

