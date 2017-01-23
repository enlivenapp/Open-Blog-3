<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * OB_AdminController
 * 
 * OB_AdminController Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class OB_AdminController extends CI_Controller
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

		// start benchmarking...
		$this->benchmark->mark('admin_controller_start');
		
		// make sure the db is up to date
		// using automated migrations. This
		// is ONLY done in admin as it's a
		// potential security risk, so we'll
		// at least try to keep all that behind
		// a login.
		$this->load->library('migration');

        if ($this->migration->latest() === FALSE)
        {
                show_error($this->migration->error_string());
        }



		// load up the core library for
		// Open Blog
		$this->load->library('obcore');

		// if we can't find a language set
		// we'll set one now
		if ( ! $this->session->language )
		{
			$this->obcore->set_lang();
		}

		// load admin language
		$this->load->language('admin', $this->session->language);

		// we're always using this in the
		// admin area so we'll essentually autoload
		$this->load->library('ion_auth');

		// get admin theme info
		$theme = $this->obcore->get_active_theme('1');

		// get all the settings from the db
		$settings = $this->obcore->db_to_config();

		// roll the database setting into 
		// $this->config so we can use them
		if ($this->config->item('site_name'))
		{
			$this->template->title($this->config->item('site_name'));
		}


		// because PITassets...
		Asset::set_url(base_url());
		Asset::add_path('core', base_url('application/themes/' . $theme->path . '/'));
		$this->template->set_theme($theme->path);

		// set some partials
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

		$this->template->set('admin_nav', $this->ion_auth->get_permissions_dropdown(true));

		// end benchmarking
		$this->benchmark->mark('admin_controller_end');

		// and we're off.....
	}
}
