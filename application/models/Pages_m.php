<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pages M
 * 
 * Public Pages Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Pages_m extends CI_Model
{
	// Protected or private properties
	protected $_table;
	
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

		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];

	}

	/**
     * get_home_page
     * 
     * Gets the page in the db that's marked
     * is_home = 1. While this seems a little
     * counterintuitive, this could be the
     * default controller 
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array|bool
     */
	public function get_home_page()
	{
		// load the markdown lib
		$this->load->library('markdown');

		// find the homepage
		$this->db->where('is_home', 1)
					->where('status', 'active')
					->limit(1);
		
		$query = $this->db->get($this->_table['pages']);

		// if we found something...
		if ($query->num_rows() == 1)
		{	
			$result = $query->row_array();

			// parse markdown
			$result['content'] = $this->markdown->parse($result['content']);

			// return it...
			return $result;
		}
		return false;
	}

	/**
     * get_page_by_url
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array|bool
     */
	public function get_page_by_url($url_title)
	{
		// check for redirects...
		if ($redirected = $this->obcore->has_redirect($url_title))
		{
			header("Location: " . site_url('pages/' . $redirected->new_slug), TRUE, $redirected->code);
		}

		// not redirected...  moving on...
		$this->load->library('markdown');

		$this->db->where('url_title', $url_title)
					->where('status', 'active')
					->limit(1);
			
		$query = $this->db->get($this->_table['pages']);
		
		if ($query->num_rows() == 1)
		{	
			$page = $query->row_array();
			// parse markdown
			$page['content'] = $this->markdown->parse($page['content']);

			// return it...
			return $page;
		}
		return false;
	}



}