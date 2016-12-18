<?php

define('BASEPATH', TRUE);
require('../application/config/open_blog.php');

function get_root_url($type = 'install')
{
	$server_host = $_SERVER['HTTP_HOST'];
	$server_path = $_SERVER['PHP_SELF'];
	$server_ssl = $_SERVER['HTTPS'];
	
	$blog_root = (($server_ssl) ? 'https://' : 'http://') . $server_host . $server_path;

	$install_path = ($type == 'install') ? stripos($blog_root, 'install/install.php') : stripos($blog_root, 'install/migrate.php');
	$blog_root = substr($blog_root, 0, $install_path);
	
	return $blog_root;
}

function get_mod_rewrite_status()
{
	$apache_modules = apache_get_modules();
	
	if (in_array('mod_rewrite', $apache_modules))
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
	require('../application/config/open_blog.php');
	
	$current_version = $config['version'];
	$latest_version = file_get_contents($config['version_check_url']);
	$latest_version = explode('|', $latest_version);
	$latest_version['version'] = $latest_version[0];
	
	if ($latest_version['version'] == "")
	{
		return 3;
	}
	else
	{	
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
	
	@mysql_close($connection);
	
	return $error;
}

function write_main_config($base_url, $mod_rewrite = true)
{
	$sample_config['path'] 		= ($mod_rewrite) ? 'includes/files/config1.sample.php' : 'includes/files/config2.sample.php';
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

function send_welcome_email($email, $blog_url, $username, $password)
{
	$headers = 'From: info@open-blog.info' . "\r\n" .
    'Reply-To: noreply@open-blog.info' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$subject = 'Open Blog was successfully installed';
	$message = "Congratulations,

Your new blog was successfully installed and is available at {$blog_url}.

You can now login with the information provided below:

Username: {$username}
Password: {$password}

Happy blogging,
The Open Blog Team";

	mail($email, $subject, $message, $headers);
}

?>