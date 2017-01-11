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
class Admin_social_m extends CI_Model
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
	public function get_social_links()
	{
		return $this->db->get($this->_table['social'])->result_array();
	}


	public function get_social_link($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['social'])->row_array();
	}


	/**
     * add_social
     * 
     * Inserts new social link
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  array $data the category to add to the database
     * 
     * @return  bool
     */
	public function add_social($data)
	{
		return $this->db->insert($this->_table['social'], $data);
	}

	/**
     * update_social
     * 
     * Updates specified social link
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the category id in the database
     * @param  string $data the category to update in the database
     * 
     * @return  bool
     */
	public function update_social($id, $data)
	{
		return $this->db->where('id', $id)->update($this->_table['social'], $data);
	}



	/**
     * remove
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the ID to remove
     * 
     * @return  array
     */
	public function remove($id)
	{
		return $this->db->delete($this->_table['social'], ['id' => $id]);
	}


}
