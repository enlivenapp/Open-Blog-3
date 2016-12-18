<?php

if ($_POST['submit'] != "")
{
	// database details
	$database['hostname'] = $_POST['database_hostname'];
	$database['username'] = $_POST['database_username'];
	$database['password'] = $_POST['database_password'];
	$database['name'] = $_POST['database_name'];
	$database['prefix'] = $_POST['database_tables_prefix'];
	
	// blog url
	$blog['url'] = $_POST['blog_url'];
	
	// blog details
	$blog['title'] = $_POST['blog_title'];
	$blog['description'] = $_POST['blog_description'];
	$blog['meta_keywords'] = $_POST['meta_keywords'];
	$blog['allow_registrations'] = $_POST['allow_registrations'];
	$blog['posts_per_site'] = $_POST['posts_per_site'];
	$blog['links_per_box'] = $_POST['links_per_box'];
	$blog['months_per_archive'] = $_POST['months_per_archive'];
	
	// administrator details
	$administrator['username'] = $_POST['admin_username'];
	$administrator['display_name'] = $_POST['admin_display_name'];
	$administrator['password'] = $_POST['admin_password'];
	$administrator['email'] = $_POST['admin_email'];
	
	if (empty($database['prefix']))
	{
		$database['prefix'] = 'ob_';
	}
	
	if (empty($blog['allow_registrations']))
	{
		$blog['allow_registrations'] = 0;
	}
	
	if (empty($blog['posts_per_site']))
	{
		$blog['posts_per_site'] = 5;
	}
	
	if (empty($blog['links_per_box']))
	{
		$blog['links_per_box'] = 5;
	}
	
	if (empty($blog['months_per_archive']))
	{
		$blog['months_per_archive'] = 8;
	}
	
	if (strpos($database['prefix'], '_') === false)
	{
		$database['prefix'] .= '_';
	}
	
	if (substr($blog['url'], -1, 1) != '/')
	{
		$blog['url'] .= '/';
	}
	
	if (empty($database['hostname']) || empty($database['username']) || empty($database['password']) || empty($database['name']) || empty($database['prefix']) || empty($blog['url']) || empty($blog['title']) || empty($blog['description']) || empty($blog['meta_keywords']) || empty($blog['posts_per_site']) || empty($blog['links_per_box']) || empty($blog['months_per_archive']) || empty($administrator['username']) || empty($administrator['password']) || empty($administrator['email']))
	{
		echo "All fields are required!<br /><br /><a href=\"javascript:history.go(-1)\">&lsaquo;&lsaquo; Back</a>";
	}
	else
	{
		$database_error = test_database_connection($database['hostname'], $database['username'], $database['password'], $database['name']);
		
		if ($database_error)
		{
			echo "Could not connect to the server or select the dabatase!<br /><br /><a href=\"javascript:history.go(-1)\">&lsaquo;&lsaquo; Back</a>";
		}
		else
		{
			mysql_connect($database['hostname'], $database['username'], $database['password']) or die(mysql_error());
			mysql_select_db($database['name']) or die(mysql_error());
			
			// create tables
			create_tables($database['prefix']);
			insert_blog_data($database['prefix'], $blog['title'], $blog['description'], $blog['meta_keywords'], $blog['allow_registrations'], $blog['posts_per_site'], $blog['links_per_box'], $blog['months_per_archive']);
			
			if (empty($administrator['display_name']))
				insert_admin_data($database['prefix'], $administrator['username'], $administrator['password'], $administrator['email']);
			else
				insert_admin_data($database['prefix'], $administrator['username'], $administrator['password'], $administrator['email'], $administrator['display_name']);
		
			mysql_close();
			
			// write main config file
			write_main_config($blog['url']);
			
			// write database config file
			write_database_config($database['hostname'], $database['username'], $database['password'], $database['name'], $database['prefix']);
			
			echo 'Open Blog has been successfully installed.<br /><br />
			Before you can start using your blog, you must delete the <strong>install/</strong> directory.<br /><br />
			When you are done, go to your <a href="' . $blog['url'] . '" target="_blank">blog home page</a>.';
		}
	}
}
else
{
	header("Location: index.php");
}

?>