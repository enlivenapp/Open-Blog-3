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

function check_for_new_version()
{
		
	$current_version = $config['version'];
	$latest_version['version'] = @file_get_contents($config['version_check_url']);
		
	if ($latest_version['version'] == "")
	{
		return 3;
	}
	else
	{
		$latest_version['number'] = $data[0];
			
		if ($current_version >= $latest_version['version'])
		{
			return 1;
		}
		else
		{
			return 2;
		}
	}
}

function test_database_connection($hostname, $username, $password, $database)
{
	$error = FALSE;
	
	$connection = @mysql_connect($hostname, $username, $password) or $error = TRUE;
	@mysql_select_db($database) or $error = TRUE;
	
	return $error;
	
	mysql_close($connection);
}

function create_tables($tables_prefix)
{
	$database_schema = @file('includes/files/database_schema.sql');
	
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

function insert_blog_data($tables_prefix, $blog_title, $blog_description, $meta_keywords, $allow_registrations, $posts_per_site, $links_per_box, $months_per_archive)
{
	mysql_query("INSERT INTO " . $tables_prefix . "settings (blog_title, blog_description, meta_keywords, allow_registrations, posts_per_site, links_per_box, months_per_archive) VALUES ('$blog_title', '$blog_description', '$meta_keywords', '$allow_registrations', '$posts_per_site', '$links_per_box', '$months_per_archive')");
}

function insert_admin_data($tables_prefix, $admin_username, $admin_password, $admin_email, $admin_display_name = NULL)
{
	$registered = date("Y-m-d H:i:s");
	
	if ($admin_display_name === NULL)
	{
		mysql_query("INSERT INTO " . $tables_prefix . "users (username, password, email, registered, level, status) VALUES('$admin_username', '" . md5($admin_password) ."', '$admin_email', '$registered', 'administrator', '1')") or die (mysql_error());
	}
	else
	{
		mysql_query("INSERT INTO " . $tables_prefix . "users (username, password, email, display_name, registered, level, status) VALUES('$admin_username', '" . md5($admin_password) ."', '$admin_email', '$admin_display_name', '$registered', 'administrator', '1')") or die (mysql_error());;
	}
}

function write_main_config($base_url)
{
	$sample_config['path'] 		= 'includes/files/config.sample.php';
	$sample_config['handle'] 	= fopen($sample_config['path'], 'r');
	
	$main_config['path'] 		= '../application/config/config.php';
	$main_config['handle'] 		= fopen($main_config['path'], 'w');
		
	$sample_config['content'] = fread($sample_config['handle'], filesize($sample_config['path']));

	$find = array('__url__');
	$replace = array($base_url);
		
	$main_config['content'] = str_replace($find, $replace, $sample_config['content']);
		
	fwrite($main_config['handle'], $main_config['content']);
	chmod($main_config['path'], 0777);
		
	fclose($sample_config['handle']);
	fclose($main_config['handle']);
}

function write_database_config($hostname, $username, $password, $database, $prefix)
{
	$sample_config['path'] 		= 'includes/files/database.sample.php';
	$sample_config['handle'] 	= fopen($sample_config['path'], 'r');
	
	$database_config['path'] 	= '../application/config/database.php';
	$database_config['handle'] 	= fopen($database_config['path'], 'w');
		
	$sample_config['content'] = fread($sample_config['handle'], filesize($sample_config['path']));

	$find = array('__hostname__', '__username__', '__password__', '__database__', '__prefix__');
	$replace = array($hostname, $username, $password, $database, $prefix);
		
	$database_config['content'] = str_replace($find, $replace, $sample_config['content']);
		
	fwrite($database_config['handle'], $database_config['content']);
	chmod($database_config['path'], 0777);
		
	fclose($sample_config['handle']);
	fclose($database_config['handle']);
}

?>