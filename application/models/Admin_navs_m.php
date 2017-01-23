<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Navs M
 * 
 * Admin Navigation Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_navs_m extends CI_Model
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
		
		// database tables from config
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}

	/**
     * get_navs
     * 
     * Gets all nav items
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  object
     */
	public function get_navs()
	{
		 return $this->db->get($this->_table['navigation'])->result();

	}

	/**
     * get_nav
     * 
     * Gets a single nav item
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array
     */
	public function get_nav($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['navigation'])->row_array();
	}

	/**
     * add_nav
     * 
     * Adds a nav item
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  bool
     */
	public function add_nav($data)
	{	
		// for devlopers I've added the 
		// processing and form fields so
		// one could manually enter a URI
		// from the form.  By Default, this
		// functionality is not available.
		// See the Admin_navigation controller
		// for more information.
		
		// if the data['url'] has been passed, then
		// we set it to the entry, otherwise we set
		// it to an empty string.
		$data['url'] = (isset($data['url'])) ? $data['url'] : '';

		// if they've chosen an post's uri, then
		// we set data['uri'] to the post's uri
		if (! empty($data['post']))
		{
			$data['url'] = $data['post'];
		}
		// if they've chosen an page's uri, then
		// we set data['uri'] to the page's uri
		elseif (! empty($data['page']))
		{
			$data['url'] = 'page/' . $data['page'];
		}

		// unset what we don't need as this
		// array is what's built for the insert()	
		unset($data['post']);
		unset($data['page']);

		// add the extras...
		$data['external'] = '0';
		$data['position'] = $this->get_next_nav_position();

		// do the insert() and return insert result
		return $this->db->insert($this->_table['navigation'], $data);
	}

	/**
     * update_nav
     * 
     * Updates a navigation item
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  bool
     */
	public function update_nav($id, $data)
	{
		// get the current nav item
		$current = $this->get_nav($id);

		// default to not creating a new
		// redirect/building new slug...
		$new_slug = false;

		// get the redirect out of the update data
    	// this is only used if we're changing the 
    	// uri via page/post/manual entry
    	$redirect_val = $data['redirection'];
    	unset($data['redirection']);

    	// determine if we're setting a different 'url'
    	// and in the process setting a redirect...
    	// if the url isn't changing, we won't update that field
    	if (isset($data['url']) && $data['url'] != $current['url'])
    	{
    		$new_slug = true;
    	}
    	elseif (! empty($data['post']) && $data['post'] != $current['url'])
    	{
    		$new_slug = true;
    		$data['url'] = $data['post'];
    	}
    	elseif (! empty($data['page']) && $data['page'] != $current['url'])
    	{
    		$new_slug = true;
    		$data['url'] = 'page/' . $data['page'];
    	}

    	// determine if we're doing the new_slug/url_title thing
    	// and redirection...
    	if ($new_slug)
    	{
    		// determine what they want to do about the old
    		// slug and if we should redirect.
    		switch ($redirect_val) {
    			case 'none':
    				// they're don't want redirection... bounce
    				break;
    			case '301' || '302':
    				// set_redirect($old_slug, $new_slug, type=navs|nav, $code)
    				$this->obcore->set_redirect($current['url'], $data['url'], $data['type'], $redirect_val);
    				break;
    			default:
    				// set_redirect($old_slug, $new_slug, type=navs|nav, $code)
    				$this->obcore->set_redirect($current['url'], $data['url'], $data['type'], '301');
    				break;
    		}
    	}
    	

		// unset what we don't need as this
		// array is what's built for the update()
		unset($data['type']);
		unset($data['post']);
		unset($data['page']);

		// update the curent record and categories
		return $this->db->where('id', $id)->update($this->_table['navigation'], $data);
	}


	/**
     * remove_nav
     * 
     * Removes a nav item
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id The ID to delete
     * 
     * @return  bool
     */
	public function remove_nav($id)
	{		
		return $this->db->delete($this->_table['navigation'], ['id' => $id]);
	}

	/**
     * get_page_slugs
     * 
     * Gets page slugs (url_title) and preps
     * the results for use in a dropdown form field
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  obj
     */
	public function get_page_slugs()
	{
		// assign the slugs to the $options...
		$options = $this->db->select('title, url_title')->get($this->_table['pages'])->result();

		// there's a couple outside of normal possibilities in the db
		// so I add them here.
		$return[null] = lang('nav_form_choose_page');
		$return['pages/'] = lang('pages_index_controller_label');

		// foreach through them and add the url_title as key
		// and title as option text.
		foreach ($options as $opt)
		{
			$return[$opt->url_title] = $opt->title;

		}

		// return the obj
		return $return;
	}

	/**
     * get_post_slugs
     * 
     * Gets page slugs (url_title) and preps
     * the results for use in a dropdown form field
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  obj
     */
	public function get_post_slugs()
	{
		// assign the slugs to the $options...
		$options = $this->db->select('date_posted, title, url_title')->get($this->_table['posts'])->result();

		// there's one outside of normal possibilities in the db
		// so I add it here.
		$return[null] = lang('nav_form_choose_post');

		// foreach through them and add the url_title as key
		// and title as option text.
		foreach ($options as $opt)
		{
			$return[$opt->url_title] = $opt->title;

		}

		// return the obj
		return $return;
	}

	/**
     * get_next_nav_position
     * 
     * Gets the next nav 'postion' so we know where to 
     * put it initially in the Navigation menu
     * 
     * Note: I'm not super happy with this, it feels hacky
     *       but I'll do for now.
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  int
     */
	public function get_next_nav_position()
	{
		// get the last record
		$row = $this->db->order_by('position', 'DESC')->limit(1)->get($this->_table['navigation'])->row();

		// return that record position number +1
		return $row->position + 1;
	}


	/*
	
	AJAX STUFF

	 */
	
	/**
     * update_nav_order
     * 
     * Reorders the front nav order
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  array $post_data The array of nav items
     * 
     * @return  bool
     */
	public function update_nav_order($post_data)
	{
		// start with 0
		$i = 0;

		// foreach through each item 
		foreach ($post_data['item'] as $value) {

			// If we tried and failed to update the db
			// we fail so they can try again
			if ( ! $this->db->where('id', $value)->update($this->_table['navigation'], ['position' => $i]))
			{
				return false;
			}

			// iteration!
    		$i++;
		}

		// looks like everything went
		// well, return true.
		return true;
	}



	/*
	
	REDIRECT STUFF

	 */
	

	/**
     * get_redirects
     * 
     * Gets the list of all redirects
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  obj
     */
	public function get_redirects()
	{
		return $this->db->get($this->_table['redirects'])->result();
	}

	/**
     * get_redirect
     * 
     * Gets a single redirect
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id The ID to get
     * 
     * @return  array
     */
	public function get_redirect($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['redirects'])->row_array();
	}

	/**
     * update_redirect
     * 
     * Updates a redirect
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id The ID to get
     * @param  array $data form data
     * 
     * @return  bool
     */
	public function update_redirect($id, $data)
	{
		return $this->db->where('id', $id)->update($this->_table['redirects'], $data);
	}

	/**
     * remove_redirect
     * 
     * Removes a single redirect
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id The ID to remove
     * 
     * @return  array
     */
	public function remove_redirect($id)
	{		
		return $this->db->delete($this->_table['redirects'], ['id' => $id]);
	}

}
