<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_Controller extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		$this->benchmark->mark('admin_controller_start');

		$this->load->library('obcore');




		if ( ! $this->session->language )
		{
			$this->obcore->set_lang();
		}

		//$this->load->language('blog', $this->session->language);
		$this->load->language('admin', $this->session->language);
		$this->load->library('ion_auth');

		// get admin theme info
		$theme = $this->obcore->get_active_theme('1');

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


		$this->template
				->set_partial('flashdata', 'flashdata')
				->set_partial('sidebar', 'sidebar');


		// installer warning default
		$this->template->set('installer_warning', FALSE);
 
		// if we find the /installer directory exists 
		// then throw the installer_warning
		if (is_dir('./installer'))
		{
			// override the default
			$this->template->set('installer_warning', lang('installer_dir_warning_notice'));
		}

		$this->benchmark->mark('admin_controller_end');
	}
}
