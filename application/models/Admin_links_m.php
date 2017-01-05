<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Links M
 * 
 * Admin Links Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_links_m extends CI_Model
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
		
		// load up the table array from config
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}

	/**
     * get_links
     * 
     * Gets all links
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  bool|object
     */
	public function get_links()
	{
		return $this->db->get($this->_table['links'])->result();
	}

	/**
     * get_link
     * 
     * Gets all links
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the ID of the link
     * 
     * @return  array
     */
	public function get_link($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['links'])->row_array();
	}

	/**
     * add_link
     * 
     * Gets all links
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $data an array of link data 
     *                      to insert into the database
     * 
     * @return  bool
     */
	public function add_link($data)
	{
		return $this->db->insert($this->_table['links'], $data);
	}

	/**
     * update_link
     * 
     * Updates a links
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the ID of the link
     * @param  string $data an array of link data 
     *                      to update in the database
     * 
     * @return  bool
     */
	public function update_link($id, $data)
	{
		return $this->db->where('id', $id)->update($this->_table['links'], $data);
	}

	/**
     * remove_link
     * 
     * Deletes a links
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the ID of the link
     * 
     * @return  array
     */
	public function remove_link($id)
	{
		return $this->db->delete($this->_table['links'], ['id' => $id]);
	}

}
