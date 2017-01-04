<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function account_activation_url($email, $key)
{
	return site_url('user/account_activation/key/' . $key . '/email/' . $email);
}

function forgotten_password_url($email, $key)
{
	return site_url('user/forgotten_password/key/' . $key . '/email/' . $email);
}

function post_url($url_title, $date)
{
	return site_url('blog/' . date('Y', strtotime($date)) . '/' . date('m', strtotime($date)) . '/' . date('d', strtotime($date)) . '/' . $url_title);
}

function post_uri($url_title, $date)
{
	return 'blog/' . date('Y', strtotime($date)) . '/' . date('m', strtotime($date)) . '/' . date('d', strtotime($date)) . '/' . $url_title;
}

function archive_url($url)
{
	return site_url('blog/archive/' . $url);
}

function category_url($url_name)
{
	return site_url('blog/category/' . $url_name);
}

function tag_url($tag_name)
{
	return site_url('blog/tags/' . $tag_name);
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

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */