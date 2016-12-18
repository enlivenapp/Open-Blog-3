<?php

if ($_POST['submit'] != "")
{
	// Wordpress database details
	$database['wordpress']['hostname'] = $_POST['wp_database_hostname'];
	$database['wordpress']['username'] = $_POST['wp_database_username'];
	$database['wordpress']['password'] = $_POST['wp_database_password'];
	$database['wordpress']['name'] = $_POST['wp_database_name'];
	$database['wordpress']['prefix'] = $_POST['wp_database_tables_prefix'];
	
	// Open Blog database details
	$database['openblog']['hostname'] = $_POST['ob_database_hostname'];
	$database['openblog']['username'] = $_POST['ob_database_username'];
	$database['openblog']['password'] = $_POST['ob_database_password'];
	$database['openblog']['name'] = $_POST['ob_database_name'];
	$database['openblog']['prefix'] = $_POST['ob_database_tables_prefix'];
	
	// Blog url
	$blog['url'] = get_root_url('migrate');
	
	if (strpos($database['wordpress']['prefix'], '_') === FALSE)
	{
		$database['wordpress']['prefix'] .= '_';
	}
	
	if (strpos($database['openblog']['prefix'], '_') === FALSE)
	{
		$database['openblog']['prefix'] .= '_';
	}
	
	// SEO urls
	$blog['enable_seo_urls'] = get_mod_rewrite_status();
	
	if (empty($database['wordpress']['hostname']) || empty($database['wordpress']['username']) || empty($database['wordpress']['password']) || empty($database['wordpress']['name']) || empty($database['wordpress']['prefix']) || empty($database['openblog']['hostname']) || empty($database['openblog']['username']) || empty($database['openblog']['password']) || empty($database['openblog']['name']) || empty($database['openblog']['prefix']))
	{
		echo "All fields are required!<br /><br /><a href=\"javascript:history.go(-1)\">&lsaquo;&lsaquo; Back</a>";
	}
	else if (empty($blog['url']))
	{
		echo "Could not detect the blog root URL!";
	}
	else
	{
		$database_error['wordpress'] = test_database_connection($database['wordpress']['hostname'], $database['wordpress']['username'], $database['wordpress']['password'], $database['wordpress']['name']);
		$database_error['openblog'] = test_database_connection($database['openblog']['hostname'], $database['openblog']['username'], $database['openblog']['password'], $database['openblog']['name']);
		
		if ($database_error['wordpress'])
		{
			echo "Could not connect to the server or select the database (Wordpress)!<br /><br /><a href=\"javascript:history.go(-1)\">&lsaquo;&lsaquo; Back</a>";
		}
		else if ($database_error['openblog'])
		{
			echo "Could not connect to the server or select the database (Open Blog)!<br /><br /><a href=\"javascript:history.go(-1)\">&lsaquo;&lsaquo; Back</a>";
		}
		else
		{
			mysql_connect($database['wordpress']['hostname'], $database['wordpress']['username'], $database['wordpress']['password']) or die(mysql_error());
			mysql_select_db($database['wordpress']['name']) or die(mysql_error());
			
			$data = get_data($database['wordpress']['prefix']);
			
			mysql_close();
			
			mysql_connect($database['openblog']['hostname'], $database['openblog']['username'], $database['openblog']['password']) or die(mysql_error());
			mysql_select_db($database['openblog']['name']) or die(mysql_error());
			
			create_new_tables($database['openblog']['prefix']);

			insert_data($database['wordpress']['prefix'], $database['openblog']['prefix'], $data);
			
			// write the main config file
			if ($blog['enable_seo_urls'] == TRUE)
			{
				write_main_config($blog['url'], TRUE);
			}
			else
			{
				write_main_config($blog['url'], FALSE);
				
				// delete the .htaccess file
				unlink('../.htaccess');
			}
			
			// write the database config file
			write_database_config($database['openblog']['hostname'], $database['openblog']['username'], $database['openblog']['password'], $database['openblog']['name'], $database['openblog']['prefix']);
			
			mysql_close();
			
			echo 'You have successfully migrated from Wordpress to Open Blog.<br /><br />
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