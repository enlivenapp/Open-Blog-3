<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Lang_picker
 * 
 * Public Language Picker Controller Class
 * 
 * NOTE: This class should never output anything...
 *       get the new lang, and redirect back to the
 *       calling page.
 *
 * @access  public
 * @author  Enliven Appications
 * @version 3.0
 * 
*/
class Lang_picker extends OB_Controller {

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
	}

	/**
     * index
     *
     * @access  public
     * @author  Enliven Appications
     * @version 3.0
     * 
     * @return  null
     */
	public function index()
	{
		exit('No direct script access allowed');
	}

     public function set($lang)
     {
          // get the default language set by site owner
          $lang = $this->db->where('language', $lang)->limit(1)->get('languages')->row();

          if ($lang && $lang->is_avail == 1)
          {
               $this->session->set_userdata('language', $lang->language);
               $this->session->set_userdata('language_abbr', $lang->abbreviation);

               redirect();
          }
          else
          {
               $this->session->set_flashdata('error', lang('That language does not seem to be available.'));
               redirect();
          }

          

     }


}
