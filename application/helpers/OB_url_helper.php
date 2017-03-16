<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function post_url($url_title)
{

	return site_url('blog/' . $url_title);
}

function archive_url($url)
{
	return site_url('blog/archive/' . $url);
}

function category_url($url_name)
{
	return site_url('blog/category/' . $url_name);
}


function page_url($url_title)
{
	return site_url('pages/' . $url_title);
}

function categories_url($categories, $blank = FALSE)
{
	$categories_count = count($categories);
	
	$i = 0;
	$result = '';
	foreach ($categories as $category)
	{
		if ($blank)
		{
			$result .= anchor('category/' . $category['url_name'], $category['name'], array('target' => '_blank'));
		}
		else
		{
			$result .= anchor('category/' . $category['url_name'], $category['name']);
		}
		
		if ($i < $categories_count - 1)
		{
			$result .= ', ';
		}
		
		$i++;
	}
	
	return $result;
}

function is_home()
{
	if (!$this->uri->segment(1))
	{
		return true;
	}
	return false;
}


/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */