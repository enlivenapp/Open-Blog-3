<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Pages M
 * 
 * Admin Pages Model Class
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Admin_pages_m extends CI_Model
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
     * get_pages
     *
     * get's all pages
     * 
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  obj
     */
	public function get_pages()
	{
		return $this->db->get($this->_table['pages'])->result();
	}

	/**
     * get_page
     * 
     * gets a single existing page
     * 
     * @param  string $id the page ID
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  array
     */
	public function get_page($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['pages'])->row_array();
	}

	/**
     * add_page
     * 
     * @param  array $data new page info
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  bool
     */
	public function add_page($data)
	{
		return $this->db->insert($this->_table['pages'], $data);
	}

	/**
     * update_page
     * 
     * Updates an exising page's info
     * 
     * @param  string $id The ID of the page
     * @param  array $data the updated info
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  bool
     */
	public function update_page($id, $data)
	{
		if ($data['is_home'] == 1)
		{
			// brute force all page records to is_home = 0
			// there can be only one!
			if ( ! $this->db->set('is_home', '0')->update($this->_table['pages']))
			{
				return false;
			}
		}
		// update the cuurent record.
		return $this->db->where('id', $id)->update($this->_table['pages'], $data);
	}

	/**
     * remove_page
     * 
     * Removes the specified page
     * 
     * @param  string $id The existing page ID
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function remove_page($id)
	{
		// get the outgoing page information
		$page = $this->db->where('id', $id)->limit(1)->get('pages')->row();

		// does this page have redirects that need
		// to be removed as well?
		$this->obcore->remove_redirects($page->url_title);
		
		return $this->db->delete($this->_table['pages'], ['id' => $id]);
	}
}
