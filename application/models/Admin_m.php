<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin_m
 * 
 * Admin Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_m extends CI_Model
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
		
		// load db tables config items
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}


	/**
     * get_dashboard
     * 
     * The Admin dashboard homepage
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  object
     */
	public function get_dashboard()
	{
		// init data obj
		$data = new stdClass();

		// get post count
		$data->post_count = $this->count_posts();

		// get active comments
		$data->active_comments_count = $this->count_comments();

		// get moderated comments
		$data->modded_comments_count = $this->count_comments(1);

		// get any new notices
		$data->notification_count = $this->count_notices();

		// get news from open-blog api
		$data->news = $this->get_news();

		// send it on back
		return $data;
	}

	/**
     * get_settings_list
     * 
     * get's the list of settings and preps
     * them for the form
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  object
     */
	public function get_settings_list()
	{
		// init data obj
		$data = new stdClass();

		// sort tabs
		$tabs = $this->db->select('tab')->distinct()->get('settings')->result();

		// foreach of those tabs, we get all
		// options in that tab
		foreach ($tabs as &$tab)
		{
			// get the list for the tab
			$tab->list = $this->db->where('tab', $tab->tab)->get('settings')->result();

			// foreach of the list items
			foreach ($tab->list as &$item)
			{
				// we build the form field so we can just echo it 
				// in the view
				$item->input = $this->obcore->build_form_field($item->field_type, $item->name, $item->value, $item->options);
			}
		}

		// load up the object with the info
		$data->settings = $tabs;

		// send it off
		return $data;
	}

	/**
     * update_settings
     * 
     * Updates the settings from the admin 
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  bool
     */
	public function update_settings()
	{
		// is there actually any post data?
		if (! $this->input->post())
		{
			// nope, fail
			return FALSE;
		}

		// there is, so we'll check the db for that $k
		foreach ($this->input->post() as $k => $v)
		{
			// does $k exist in the db?
			// if so, update it.
			if (! $this->db->where('name', $k)->update('settings', ['value' => $v]))
			{
				// no, someone adding stuff to the
				// post()?  fail and bail!
				return false;
			}
		}

		// something's gone wrong, fail and bail
		return false;
	}

	/**
     * get_required_settings
     * 
     * provides an array of required settings items
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  bool|object
     */
	public function get_required_settings()
	{
		return $this->db->where('required', 1)->get('settings')->result();
	}

	/**
     * count_posts
     * 
     * Provides an integer from counting 
     * published posts
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  int
     */
	public function count_posts()
	{
		return $this->db->where('status', 'published')->count_all_results('posts');
	}

	/**
     * count_comments
     * 
     * Provides and integer from counting 
     * modded/unmodded comments
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $modded is the comment modded (1) or not (0)
     * 
     * @return  int
     */
	public function count_comments($modded = '0')
	{
		return $this->db->where('modded', $modded)->count_all_results('comments');
	}

	/**
     * count_notices
     * 
     * Provides and integer from counting 
     * notices
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  int
     */
	public function count_notices()
	{
		return $this->db->where('verified', 1)->count_all_results('notifications');
	}

	/**
     * get_groups_permissions
     * 
     * Get's the permissions for the provided group ID
     * 
     * @param  string $group_id 
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  object
     */
	public function get_groups_permissions($group_id)
	{
		// get the permissions
		$permissions = $this->db
						->where('groups_perms.group_id', $group_id)
						->join('groups_perms', 'groups_perms.perms_id = group_permissions.id')
						->get('group_permissions')
						->result();
		// since we're doing language files for localization
		// we'll check the language file for the $perm->name
		// if we don't find one, we'll just use what we have
		// in the database.
		foreach ($permissions as & $perm)
		{
			$perm->name = (lang($perm->name)) ? lang($perm->name) : $perm->name;
		}

		// return it and bail
		return $permissions;
	}

	/**
     * get_group_perms
     * 
     * get's the group permissions
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  object
     */
	public function get_group_perms($group_id)
	{
		$permissions = $this->db
						->get('group_permissions')
						->result();

		foreach ($permissions as & $perm)
		{
			$perm->selected = $this->db->select('id')->where('perms_id', $perm->id)->where('group_id', $group_id)->limit(1)->get('groups_perms')->row();
			$perm->name = (lang($perm->name)) ? lang($perm->name) : $perm->name;
		}

		return $permissions;
	}

	/**
     * update_group_perms
     * 
     * Updates a groups permissions
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $group the group's id
     * @param  array $data The new permissions data from the form
     * 
     * @return  null
     */
	public function update_group_perms($group, $data)
	{
		// get current group permissions
		$current = $this->db->where('group_id', $group)->get('groups_perms')->result();

		// now we foreach through the current
		foreach ($current as $ck => $item)
		{
			// and loop through the $data (new perms)
			foreach ($data as $k => $v)
			{
				// if we find a match
				if ($k == $item->perms_id)
				{
					// unset the item from both arrays
					// because we don't need to do 
					// anything with it.
					unset($current[$ck]);
					unset($data[$k]);
				}
			}
		}

		// now we have
		// $current which has removed permissions and
		// $data which has new permsission.
		
		// if there's still something in $current, 
		// remove those permissions
		if ($current)
		{
			foreach ($current as $item)
			{
				$this->db->delete('groups_perms', ['id' => $item->id]);
			}
		}

		// add the new permissions if there's any
		// in $data
		if ($data)
		{
			foreach ($data as $k => $v)
			{
				// we don't care about $v
				$this->db->insert('groups_perms', ['perms_id' => $k, 'group_id' => $group]);
			}	
		}
	}

	/**
     * get_news
     * 
     * Contacts the Open-Blog API and get's the
     * latest news
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  object
     */
	public function get_news()
	{	
		// HARK! an obj is created
		$data = new stdClass;

		// get the API url we need
		$news_url = $this->config->item('ob_updates_url');

		// is curl installed?
		// If so, let's get the news
		if ($this->_isCurl())
		{
			// load the cURL lib
			$this->load->library('curl');

			// make the call and decode the data
			$data = json_decode($this->curl->simple_get($news_url . '/get_news'));
		}
		// if _isCurl returns false, we have the $data object
		// already init'd so we can just pass back an empty
		// object.
		return $data;
	}

	/**
     * _isCurl
     * 
     * Checks to see if cURL is available on this
     * server
     *
     * @access  public
     * @author  Enliven Applications (and pretty much everyone else on the internet)
     * 
     * @return  bool
     */
	public function _isCurl()
	{
		// if the function exists, returns true
		// otherwise, false
    	return function_exists('curl_init');
	}

}
