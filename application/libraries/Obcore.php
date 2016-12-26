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
class Obcore
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

	public function get_active_theme($is_admin='0')
	{
		return $this->ci->db->where('is_active', 1)->where('is_admin', $is_admin)->limit(1)->get('templates')->row();
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
		if ( ! $social = $this->ci->db->where('enabled', 1)->get('social')->result())
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


	public function set_lang()
	{
		// get the default language set by site owner
		$default_lang = $this->ci->db->where('is_default', '1')->limit(1)->get('languages')->row();

		$this->ci->session->set_userdata('language', $default_lang->language);
	}



		public function build_form_field($field_type, $name, $cur_val, $options=null)
	{
		if ($field_type == 'radio')
		{
			if (!empty($options))
			{
				$radio = '';
				$options_arr = explode("|", $options);
				foreach ($options_arr as $option)
				{
					$parts = explode('=', $option);
					$checked = ($cur_val == $parts[0]) ? TRUE : FALSE;
					$data = [
						'name' 		=> $name,
						'id'		=> $name,
						'value'		=> $parts[0],
						'class'		=> 'form-control',
						'checked'	=> $checked
					];
					$radio .= '<label>' . form_radio($data) . ' ' . lang($parts[1]) . '</label><br>';
				}

			}
			return $radio;
		}
		// it's a dropdown
		elseif ($field_type == 'dropdown')
		{
			// $options not empty?
			if (!empty($options))
			{	
				// explode the first bit on the pipe
				// 10=10|20=20
				// produces array([0] 10=10, [1] 20=20)
				$options_arr = explode("|", $options);

				// foreach of those exploded array items
				foreach ($options_arr as $option)
				{
					// explode again on the = sign
					// 10=10
					// produces array([0] 10, [1] 10)
					$parts = explode('=', $option);

					// if $parts[0] is not numeric we run it through the
					// language filter to get the text value in language file
					// otherwise, we return it unhindered as a number
					$form_opts[$parts[0]] = ( ! is_numeric($parts[1])) ? lang($parts[1]) : $parts[1];

					// if they've tried to submit the new value
					// but validation failed, we'll repopulate
					// the value here.
					if ($this->input->post())
					{
						// set the $cur_val to the user's input
						$cur_val = $this->input->post($name);
					}
				}
			}
			return form_dropdown($name, $form_opts, $cur_val, 'class="form-control" id="' . $name . '"');
		}
		elseif ($field_type == 'text')
		{
			// if they've tried to submit the new value
			// but validation failed, we'll repopulate
			// the value here.
			if ($this->input->post())
			{
				// set the $cur_val to the user's input
				$cur_val = set_value($name);
			}
			return form_input($name, $cur_val, 'class="form-control" id="' . $name . '"');
		}
		// return default failure
		return false;
	}






}

