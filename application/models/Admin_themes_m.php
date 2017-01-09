<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Themes M
 * 
 * Admin Themes Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_themes_m extends CI_Model
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
     * get_themes
     * 
     * gets all themes
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  object
     */
	public function get_themes()
	{
		// load the helper file
		$this->load->helper('file');

		// get the list of 'folders' which
		// just means we're getting a potential
		// list of new themes that's been installed
		// since we last looked at themes
		$folders = get_dir_file_info(APPPATH . 'themes/');

		// foreach of those folders, we're loading the class
		// from the theme_details.php file, then we pass it
		// off to the save_theme() function to deal with 
		// duplicates and insert newly added themes.
		foreach ($folders as &$folder)
		{
			// spawn that theme class...
			$details = $this->spawn_class($folder['relative_path'], $folder['name']);

			// if spawn_class was a success
			// we'll see if it needs saving
			if ($details)
			{
				// because this pwnd me for 30 minutes
				$details->path = $folder['name'];
			
				// save it...
				$this->save_theme($details);
			}
			
			
		}
		// now that we've updated everything, let's
		// give the end user something to look at.
		return $this->db->get($this->_table['templates'])->result();
	}

	/**
     * get_theme_by_id
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function get_theme_by_id($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['templates'])->row();
	}

	/**
     * activate_new_theme
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  bool
     */
	public function active_new_theme($new_theme)
	{
		// first we need to get the currently active theme
		$old_theme = $this->db->where('is_active', 1)->where('is_admin', $new_theme->is_admin)->limit(1)->get($this->_table['templates'])->row();

		// now we have the new and the old.
		// let's activate the new one and deactivate
		// the old one.
		$data = [
			// the old
   			[
		      'id' 			=>  $old_theme->id,
		      'is_active' 	=> 0
   			],
   			// and the new
   			[
		      'id' 			=> $new_theme->id,
		      'is_active' 	=> 1
   			]
		];

		return $this->db->update_batch($this->_table['templates'], $data, 'id');
	}



	/**
	 * Spawn Class
	 *
	 * Checks to see if a theme_details.php exists and returns 
	 * a class if it does
	 * 
	 * @author  Phil Sturgeon ?
	 *
	 * @param $path The path to the current folder
	 * @param  $dir The directory in application/themes/...
	 *
	 * @return array
	 */
	private function spawn_class($path, $dir)
	{
		// get the details of the theme
		$theme_details = $path . $dir . '/theme_details.php';

		// Check if the details file exists
		if ( ! is_file($theme_details))
		{
			return false;
		}

		// found it, now include it
		include_once $theme_details;

		// build the class
		$class = 'Theme_'.ucfirst(strtolower($dir));

		// returm class or fail
		return class_exists($class) ? new $class : false;
	}

	/**
     * save_theme
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	private function save_theme($data)
	{
		// TODO: deal with version changes
		
		// is this particular entry already
		// in the database?
		$exists = $this->db->where('path', $data->path)->limit(1)->from($this->_table['templates'])->count_all_results();

		//nope, let's insert it.
		if ($exists == 0)
		{
			// build the insert
			$insert = [
				'name' 			=> $data->name,
				'description'	=> $data->description,
				'author'		=> $data->author,
				'author_email'	=> $data->author_email,
				'path'			=> $data->path,
				'image'			=> $data->path . '.png',
				'is_default'	=> '0',
				'is_active'		=> '0',
				'is_admin'		=> $data->is_admin,
				'version'		=> $data->version
			];

			// execute and return.
			return $this->db->insert($this->_table['templates'], $insert);
		}
	}

}


/*

  Array
(
    [folders] => Array
        (
            [default] => Array
                (
                    [name] => default
                    [server_path] => /Users/Mike/Documents/website-dev/Open-Blog-3/application/themes/default
                    [size] => 340
                    [date] => 1483405177
                    [relative_path] => /Users/Mike/Documents/website-dev/Open-Blog-3/application/themes/
                    [details] => Theme_default Object
                        (
                            [name] => Default Open Blog Theme
                            [description] => The default theme for Open Blog
                            [author] => Enliven Applications
                            [author_email] => info@open-blog.org
                            [is_admin] => 0
                            [version] => 1.0.0
                        )

                )

            [default_admin] => Array
                (
                    [name] => default_admin
                    [server_path] => /Users/Mike/Documents/website-dev/Open-Blog-3/application/themes/default_admin
                    [size] => 374
                    [date] => 1483405745
                    [relative_path] => /Users/Mike/Documents/website-dev/Open-Blog-3/application/themes/
                    [details] => Theme_default_admin Object
                        (
                            [name] => Default Open Blog Admin Theme
                            [description] => The default admin theme for Open Blog
                            [author] => Enliven Applications
                            [author_email] => info@open-blog.org
                            [is_admin] => 1
                            [version] => 1.0.0
                        )

                )

        )


 */