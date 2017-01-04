<?php

class Admin_navs_m extends CI_Model
{
	// Protected or private properties
	protected $_table;
	
	// Constructor
	public function __construct()
	{
		parent::__construct();
		
		$tables = $this->config->item('openblog');
		$this->_table = $tables['tables'];
	}

	public function get_navs()
	{
		 return $this->db->get($this->_table['navigation'])->result();

	}


	public function get_nav($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['navigation'])->row_array();
	}

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
		if (! empty($nav_data['post']))
		{
			$data['url'] = $data['post'];
		}
		// if they've chosen an page's uri, then
		// we set data['uri'] to the page's uri
		elseif (! empty($data['page']))
		{
			$nav_data['url'] = $data['page'];
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
    		$data['url'] = $data['page'];
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



	public function remove_nav($id)
	{		
		return $this->db->delete($this->_table['navigation'], ['id' => $id]);
	}


	public function get_page_slugs()
	{
		$options = $this->db->select('title, url_title')->get($this->_table['pages'])->result();

		$return[null] = lang('nav_form_choose_page');
		$return['pages/'] = lang('pages_index_controller_label');
		foreach ($options as $opt)
		{
			$return[$opt->url_title] = $opt->title;

		}
		return $return;
	}

	public function get_post_slugs()
	{
		$options = $this->db->select('date_posted, title, url_title')->get($this->_table['posts'])->result();

		$return[null] = lang('nav_form_choose_post');
		foreach ($options as $opt)
		{
			$return[post_uri($opt->url_title, $opt->date_posted)] = $opt->title;

		}
		return $return;
	}

	public function get_next_nav_position()
	{
		$row = $this->db->order_by('position', 'DESC')->limit(1)->get($this->_table['navigation'])->row();
		return $row->position + 1;
	}


	/*
	
	AJAX STUFF

	 */

	public function update_nav_order($post_data)
	{
		$i = 0;
		foreach ($post_data['item'] as $value) {
			if ( ! $this->db->where('id', $value)->update($this->_table['navigation'], ['position' => $i]))
			{
				return false;
			}
    		$i++;
		}
		return true;
	}



	/*
	
	REDIRECT STUFF

	 */
	


	public function get_redirects()
	{
		return $this->db->get($this->_table['redirects'])->result();
	}


	public function get_redirect($id)
	{
		return $this->db->where('id', $id)->limit(1)->get($this->_table['redirects'])->row_array();
	}


	public function update_redirect($id, $data)
	{
		return $this->db->where('id', $id)->update($this->_table['redirects'], $data);
	}


	public function remove_redirect($id)
	{		
		return $this->db->delete($this->_table['redirects'], ['id' => $id]);
	}




}