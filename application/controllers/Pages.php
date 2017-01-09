<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pages
 * 
 * Public Pages Controller Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Pages extends OB_Controller
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

		// Load needed models, libraries, helpers and language files
		$this->load->model('Pages_m');
		
		$this->load->language('pages', $this->session->language);
	}

	/**
     * index 
     * 
     * gets homepage... it's the default page
     * listed in the database. 
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $page  o_O
     * @return  null
     */
	public function index($page=null)
	{
		// get page data
		$data['page'] = $this->Pages_m->get_home_page();

		// set the meta/og/twitter meta tags
		$this->obcore->set_meta($data['page'], 'page', true);

		// build it
		$this->template->build('pages/index', $data);
	}

	/**
     * page
     * 
     * Gets single page
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $url_title (slug) for the page.
     * 
     * @return  null
     */
	public function page($url_title)
	{
		$data['page'] = $this->Pages_m->get_page_by_url($url_title);
			
		$this->template->build('pages/index', $data);
	}
}
