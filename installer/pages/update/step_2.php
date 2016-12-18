<?php

if (is_installed())
{
	require('../application/config/config.php');
	require('../application/config/database.php');
	
	mysql_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password']) or die(mysql_error());
	mysql_select_db($db['default']['database']) or die(mysql_error());
	
	// SEO urls
	$blog['enable_seo_urls'] = get_mod_rewrite_status();
	
	//  data
	$data = get_data($db['default']['dbprefix']);
	// drop old tables
	drop_old_tables($db['default']['dbprefix']);
	// create new tables
	create_new_tables($db['default']['dbprefix']);
	// insert old data
	insert_data($db['default']['dbprefix'], $data);
	
	mysql_close();
	
	// write the main config file
	if ($blog['enable_seo_urls'] == TRUE)
	{
		write_main_config($config['base_url'], TRUE);
	}
	else
	{
		write_main_config($config['base_url'], FALSE);
		
		// delete the .htaccess file
		unlink('../.htaccess');
	}
	
	echo 'Open Blog has been successfully updated to version 1.2.1.<br /><br />
	Before you can start using your blog, you must delete the <strong>install/</strong> directory.<br /><br />
	When you are done, go to your <a href="' . $config['base_url'] . '" target="_blank">blog home page</a>.';
}
else
{
	header("Location: update.php");
}

?>