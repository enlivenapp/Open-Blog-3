<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin_cats_m
 * 
 * Admin Categories Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_cats_m extends CI_Model
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
     * get_cats
     * 
     * Gets all categories
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function get_cats()
	{
		return $this->db->get($this->_table['categories'])->result();
	}

	/**
     * get_cat
     * 
     * Get's one category item
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the category id in the database
     * 
     * @return  null
     */
	public function get_cat($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['categories'])->row_array();
	}

	/**
     * add_cat
     * 
     * Inserts new category
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  array $data the category to add to the database
     * 
     * @return  null
     */
	public function add_cat($data)
	{
		return $this->db->insert($this->_table['categories'], $data);
	}

	/**
     * update_cat
     * 
     * Updates specified cat
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the category id in the database
     * @param  string $data the category to update in the database
     * 
     * @return  null
     */
	public function update_cat($id, $data)
	{
		return $this->db->where('id', $id)->update($this->_table['categories'], $data);
	}

	/**
     * remove_cat
     * 
     * Deletes specified cat
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @param  string $id the category id in the database to remove
     * 
     * @return  null
     */
	public function remove_cat($id)
	{
		return $this->db->delete($this->_table['categories'], ['id' => $id]);
	}
}