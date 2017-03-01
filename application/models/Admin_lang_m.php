<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin_social_m
 * 
 * Admin Social Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_lang_m extends CI_Model
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
		
		// get table names from config
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}

	/**
     * get_social_links
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array
     */
	public function get_links()
	{
		return $this->db->get($this->_table['languages'])->result_array();
	}


	/**
     * disable
     * 
     * marks a language is_avail = 0
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the category id in the database
     * @param  string $toggle 1|0 to insert in the db
     * 
     * @return  bool
     */
	public function toggle_is_avail($id, $toggle)
	{
		return $this->db->where('id', $id)->update($this->_table['languages'], ['is_avail' => $toggle]);
	}


     /**
     * make_default
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the language ID to make default
     * 
     * @return  array
     */
     public function make_default($id)
     {
          // set all to is_default = 0
          if ($this->db->set('is_default', '0')->update($this->_table['languages']) )
          {
               return $this->db->where('id', $id)->update($this->_table['languages'], ['is_default' => '1', 'is_avail' => '1']);
          }

          // default false return
          return false;
     } 


     /**
     * get_language
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array
     */
     public function get_language($id)
     {
          return $this->db->where('id', $id)->limit(1)->get('languages')->row();
     }  

}
