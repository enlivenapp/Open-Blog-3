<?php

define('BASEPATH', TRUE);
require('../application/config/open_blog.php');

function is_installed()
{
	if (file_exists('../application/config/config.php') && file_exists('../application/config/database.php'))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function create_tables($tables_prefix)
{
	$database_schema = @file('includes/files/database_schema_install.sql');
	
	$database_schema = preg_replace('#ob_#i', $tables_prefix, $database_schema);
	
	foreach ($database_schema as $line)
	{
		if (substr($line, 0, 1) != '#' && $line != '') 
		{
			$query .= $line;
			if (substr(trim($line), -1, 1) == ';') 
			{
				mysql_query($query) or die(mysql_error());
				$query = '';
			}
		}
	}
}

function insert_blog_data($tables_prefix, $blog_title, $blog_description, $admin_email, $meta_keywords, $allow_registrations, $posts_per_page, $links_per_box, $months_per_archive)
{
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('blog_title', '$blog_title')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('blog_description', '$blog_description')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('meta_keywords', '$meta_keywords')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('allow_registrations', '$allow_registrations')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_captcha', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('recognize_user_agent', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_rss_posts', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_rss_comments', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_atom_posts', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_atom_comments', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_delicious', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_technorati', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_digg', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_stumbleupon', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_furl', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enable_reddit', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('posts_per_page', '$posts_per_page')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('links_per_box', '$links_per_box')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('months_per_archive', '$months_per_archive')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enabled', '1')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('offline_reason', '')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('admin_email', '$admin_email')");
}

function insert_admin_data($tables_prefix, $admin_username, $admin_password, $admin_email, $admin_display_name = NULL)
{
	$registered = date("Y-m-d H:i:s");
	
	if ($admin_display_name === NULL)
	{
		mysql_query("INSERT INTO " . $tables_prefix . "users (username, password, secret_key, email, registered, level, status) VALUES('$admin_username', '" . md5($admin_password) ."', '', '$admin_email', '$registered', 'administrator', '1')") or die (mysql_error());
	}
	else
	{
		mysql_query("INSERT INTO " . $tables_prefix . "users (username, password, secret_key, email, display_name, registered, level, status) VALUES('$admin_username', '" . md5($admin_password) ."', '', '$admin_email', '$admin_display_name', '$registered', 'administrator', '1')") or die (mysql_error());;
	}
}

?>