<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Feed extends OB_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('blog/blog_m');
		$this->load->model('blog/categories_m');
	}

	public function index()
	{
		die('Direct Access Forbidden');
	}

	// Public methods
	public function rss_posts()
	{
		$this->load->helper('xml');

		if ($this->config->item('enable_rss_posts') == 1)
		{
			$data = $this->blog_m->get_posts();

			header("Content-Type: application/xml");
			$this->load->view('rss_posts', $data);
		}
	}



	
	public function rss_comments()
	{
		if ($this->system_library->settings['enable_rss_comments'] == 1)
		{
			if ($data['comments'] = $this->comments->get_latest_comments())
			{
				foreach ($data['comments'] as $key => $comment)
				{
					if ($comment['user_id'] != "")
					{
						$display_name = $this->users->get_user_display_name($comment['user_id']);
						$data['comments'][$key]['author'] = $display_name;
					}
					else
					{
						$data['comments'][$key]['author'] = $comment['author'];
					}
				}
			}
			
			header("Content-Type: application/xml");
			$this->load->view('feed/rss_comments', $data);
		}
		else
		{
			$this->_template['page']	= 'errors/feed_disabled';
			
			$this->system_library->load($this->_template['page']);
		}
	}

}