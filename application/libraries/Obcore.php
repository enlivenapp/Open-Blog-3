<?php

/**
 * Open Blog Core Class
 *
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
			// if we need a true bool value
			if ($set->value == 'true' || $set->value == 'false')
			{
				// convert to true bool
				$bool_value = filter_var($set->value, FILTER_VALIDATE_BOOLEAN);

				// set the value
				$this->ci->config->set_item($set->name, $bool_value);
			}
			// we don't need a bool, so do it normal like
			else
			{
				$this->ci->config->set_item($set->name, $set->value);
			}	
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
		$this->ci->session->set_userdata('language_abbr', $default_lang->abbreviation);

		// don't need you anymore.
		unset($default_lang);
	}

	public function get_lang_options()
	{
		$langs = $this->ci->db->where('is_avail', '1')->get('languages')->result();

		// default empty array
		$return = [];

		foreach ($langs as $lang)
		{
			$return[] = '<a href="' . site_url('lang_picker/set/' . $lang->language) . '">' . ucfirst(humanize($lang->language)) . '</a>';
		}

		// don't need you anymore.
		unset($langs);

		return $return;
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
					if ($this->ci->input->post())
					{
						// set the $cur_val to the user's input
						$cur_val = $this->ci->input->post($name);
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
			if ($this->ci->input->post())
			{
				// set the $cur_val to the user's input
				$cur_val = set_value($name);
			}
			return form_input($name, $cur_val, 'class="form-control" id="' . $name . '"');
		}
		// return default failure
		return false;
	}



	public function set_redirect($old_slug, $new_slug, $type='post', $code="301")
	{	
		// is the redirect already set?
		$current = $this->ci->db
						->where('old_slug', $old_slug)
						->where('new_slug', $new_slug)
						->limit(1)
						->get('redirects')
						->row();

		// is there already a record?
		if ($current)
		{
			// we'll update code rather than insert a new record.
			// this is the only time one should be changing these
			// otherwise, delete and enter new information
			$update = [
				'code' => $code
			];
			return $this->ci->db
						->where('id', $current->id)
						->update('redirects', $update);
		}

		// There's no records that appear for this one
		// so we'll insert the new redirects record.
		$insert = [
			'old_slug' 	=> $old_slug,
			'new_slug' 	=> $new_slug,
			'type'		=> $type,
			'code'		=> $code
		];
		return $this->ci->db->insert('redirects', $insert);
	}

	public function has_redirect($url_title)
	{
		return $this->ci->db->limit(1)->where('old_slug', $url_title)->get('redirects')->row();

	}

	public function remove_redirects($slug=false)
	{
		return $this->ci->db->where('new_slug', $slug)->delete('redirects');
	}


	public function set_meta($data, $type='post', $home=false)
	{
		if ($type == 'page')
		{
			$this->ci->template->set_metadata('title', $data['meta_title']);
			$this->ci->template->set_metadata('keywords', $data['meta_keywords']);
			$this->ci->template->set_metadata('description', $data['meta_description']);

			$this->ci->template->set_metadata('title', $data['meta_title'], 'og');
			$this->ci->template->set_metadata('type', 'website', 'og');
			$this->ci->template->set_metadata('description', $data['meta_description'], 'og');

			// the homepage being called?
			if ($home)
			{
				$this->ci->template->set_metadata('url', site_url(), 'og');
			}
			else
			{
				$this->ci->template->set_metadata('url', site_url('pages/' . $data['url_title']), 'og');
			}
			

		}
		elseif ($type == 'post')
		{
			$this->ci->template->set_metadata('title', $data['meta_title']);
			$this->ci->template->set_metadata('keywords', $data['meta_keywords']);
			$this->ci->template->set_metadata('description', $data['meta_description']);

			$this->ci->template->set_metadata('title', $data['meta_title'], 'og');
			$this->ci->template->set_metadata('type', 'website', 'og');
			$this->ci->template->set_metadata('description', $data['meta_description'], 'og');

			if ($data['feature_image'])
			{
				$this->ci->template->set_metadata('image', base_url('uploads/' . $data['feature_image']), 'og');
			}

			// the homepage being called?
			if ($home)
			{
				$this->ci->template->set_metadata('url', site_url(), 'og');
			}
			else
			{
				$this->ci->template->set_metadata('url', post_url($data['url_title'], $data['date_posted']), 'og');
			}
		}
		
	}


	public function send_email($to, $subject, $message, $cc=false, $bcc=false)
	{
		$this->ci->load->library('email');

		//set up the email config 
		$mail_protocol = $this->ci->config->item('mail_protocol');

		// protocol
		$config['protocol'] = $mail_protocol;

		// we switch on $mail_protocol so we
		// can add additional config items 
		// as the protocol changes
		switch ($mail_protocol) {
			// the simple mail protocol
			case 'mail':
				// we don't need to do anything for mail...
				break;

			// smtp... 	
			case 'smtp':
				$config['smtp_host'] = $this->ci->config->item('smtp_host');
				$config['smtp_user'] = $this->ci->config->item('smtp_user');
				$config['smtp_pass'] = $this->ci->config->item('smtp_pass');
				$config['smtp_port'] = $this->ci->config->item('smtp_port');
				break;

			// lastly, sendmail
			case 'sendmail':
				//The server path to Sendmail. Usually '/usr/sbin/sendmail'
				$config['mailpath'] = $this->ci->config->item('sendmail_path');
				break;

			// default is 'mail'
			default:
				// $mail_protocol ended up being something 
				// other than the 3 we check for, so we override
				// whatever it was and go with 'mail'
				$config['protocol'] = 'mail';
				break;
		}
		
		// the rest of the config items we don't
		// need to worry about which protocol the
		// site is using...
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['useragent'] = 'OpenBlogv3';
		$config['mailtype'] = 'html';
		
		

		// init and let's send some email
		$this->ci->email->initialize($config);

		// from db settings
		$this->ci->email->from($this->ci->config->item('server_email'), $this->ci->config->item('site_name'));

		// set who it's going to...
		$this->ci->email->to($to);

		// if $cc
		if ($cc)
		{
			$this->ci->email->cc($cc);
		}

		// if $bcc
		if ($bcc)
		{
			$this->ci->email->bcc($bcc);
		}

		// set the subject
		$this->ci->email->subject($subject);
		
		// set the message...
		$this->ci->email->message($message);

		// and off we go
		if (!$this->ci->email->send())
		{
			$this->ci->email->print_debugger();
		}
		return true;

	}





}

