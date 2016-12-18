<?php

define('BASEPATH', TRUE);
require('../application/config/open_blog.php');

function is_installed()
{
	if (file_exists('../application/config/config.php') && file_exists('../application/config/database.php'))
	{
		require('../application/config/database.php');
		
		if (!(test_database_connection($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database'])))
		{
			if (check_for_database_tables($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database'], $db['default']['dbprefix']))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
	else
	{
		return FALSE;
	}
}

function check_for_database_tables($hostname, $username, $password, $database, $tables_prefix)
{
	$connection = @mysql_connect($hostname, $username, $password) or $error = TRUE;
	@mysql_select_db($database) or $error = TRUE;
	
	$query = mysql_query("SHOW TABLES LIKE '" . $tables_prefix . "%'");
	
	if (mysql_num_rows($query) == 11)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
	
	mysql_close($connection);
}

function get_data($tables_prefix)
{
	$data['settings']['blog_title'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'blog_title'"), 0);
	$data['settings']['blog_description'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'blog_description'"), 0);
	$data['settings']['meta_keywords'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'meta_keywords'"), 0);
	$data['settings']['allow_registrations'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'allow_registrations'"), 0);
	$data['settings']['posts_per_site'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'posts_per_site'"), 0);
	$data['settings']['links_per_box'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'links_per_box'"), 0);
	$data['settings']['months_per_archive'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'months_per_archive'"), 0);
	$data['settings']['enabled'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'enabled'"), 0);
	$data['settings']['offline_reason'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'offline_reason'"), 0);
	$data['settings']['admin_email'] = mysql_result(mysql_query("SELECT value FROM " . $tables_prefix . "settings WHERE name = 'admin_email'"), 0);
	$data['default_template'] = mysql_result(mysql_query("SELECT id FROM " . $tables_prefix . "templates WHERE is_default = '1'"), 0);
	$data['languages'] = mysql_query("SELECT * FROM " . $tables_prefix . "languages");
	$data['links'] = mysql_query("SELECT * FROM " . $tables_prefix . "links");
	$data['navigation'] = mysql_query("SELECT * FROM " . $tables_prefix . "navigation");
	$data['categories'] = mysql_query("SELECT * FROM " . $tables_prefix . "categories");
	$data['posts'] = mysql_query("SELECT * FROM " . $tables_prefix . "posts");
	$data['comments'] = mysql_query("SELECT * FROM " . $tables_prefix . "comments");
	$data['pages'] = mysql_query("SELECT * FROM " . $tables_prefix . "pages");
	$data['users'] = mysql_query("SELECT * FROM " . $tables_prefix . "users");
	
	return $data;
}

function drop_old_tables($tables_prefix)
{
	mysql_query("DROP TABLE " . $tables_prefix . "categories");
	mysql_query("DROP TABLE " . $tables_prefix . "comments");
	mysql_query("DROP TABLE " . $tables_prefix . "languages");
	mysql_query("DROP TABLE " . $tables_prefix . "links");
	mysql_query("DROP TABLE " . $tables_prefix . "navigation");
	mysql_query("DROP TABLE " . $tables_prefix . "pages");
	mysql_query("DROP TABLE " . $tables_prefix . "posts");
	mysql_query("DROP TABLE " . $tables_prefix . "settings");
	mysql_query("DROP TABLE " . $tables_prefix . "sidebar");
	mysql_query("DROP TABLE " . $tables_prefix . "templates");
	mysql_query("DROP TABLE " . $tables_prefix . "users");
}

function create_new_tables($tables_prefix)
{
	$database_schema = @file('includes/files/database_schema_update.sql');
	
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

function insert_data($tables_prefix, $data)
{	
	// settings
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('blog_title', '" . $data['settings']['blog_title'] . "')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('blog_description', '" . $data['settings']['blog_description'] . "')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('meta_keywords', '" . $data['settings']['meta_keywords'] . "')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('allow_registrations', '" . $data['settings']['allow_registrations'] . "')");
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
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('posts_per_page', '" . $data['settings']['posts_per_site'] . "')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('links_per_box', '" . $data['settings']['links_per_box'] . "')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('months_per_archive', '" . $data['settings']['months_per_archive'] . "')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('enabled', '" . $data['settings']['enabled'] . "')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('offline_reason', '" . $data['settings']['offline_reason'] . "')");
	mysql_query("INSERT INTO " . $tables_prefix . "settings (name, value) VALUES ('admin_email', '" . $data['settings']['admin_email'] . "')");
	
	// set the default template
	mysql_query("UPDATE " . $tables_prefix . "templates SET is_default = '0'") or die (mysql_error());
	mysql_query("UPDATE " . $tables_prefix . "templates SET is_default = '1' WHERE id = '" . $data['default_template'] . "'") or die (mysql_error());
	
	// languages
	while ($row = mysql_fetch_assoc($data['languages']))
	{
		mysql_query("INSERT INTO " . $tables_prefix . "languages (id, language, abbreviation, author, author_website, is_default) VALUES('" . $row[id] . "', '" . $row[language] . "', '" . $row[abbreviation] . "', '" . $row[author] . "', '" . $row[author_website] . "', '" . $row[is_default] . "')") or die (mysql_error());
	}
	
	// navigation
	while ($row = mysql_fetch_assoc($data['navigation']))
	{
		mysql_query("INSERT INTO " . $tables_prefix . "navigation (id, title, description, url, external, position) VALUES('" . $row[id] . "', '" . $row[title] . "', '" . $row[description] . "', '" . $row[url] . "', '', '" . $row[position] . "')") or die (mysql_error());
	}
	
	// categories
	while ($row = mysql_fetch_assoc($data['categories']))
	{
		mysql_query("INSERT INTO " . $tables_prefix . "categories (id, name, url_name, description) VALUES('" . $row[id] . "', '" . $row[name] . "', '" . $row[url_name] . "', '" . $row[description] . "')") or die (mysql_error());
	}
	
	// posts and posts_to_categories
	while ($row = mysql_fetch_assoc($data['posts']))
	{
		mysql_query("INSERT INTO " . $tables_prefix . "posts (id, author, date_posted, title, url_title, excerpt, content, allow_comments, status) VALUES('" . $row[id] . "', '" . $row[author] . "', '" . $row[date_posted] . "', '" . $row[title] . "', '" . $row[url_title] . "', '" . mysql_real_escape_string($row[excerpt]) . "', '" . mysql_real_escape_string($row[content]) . "', '" . $row[allow_comments] . "', '" . $row[status] . "')") or die (mysql_error());
		mysql_query("INSERT INTO " . $tables_prefix . "posts_to_categories (post_id, category_id) VALUES('" . $row[id] . "', '" . $row[category_id] . "')");
	}
	
	// comments
	while ($row = mysql_fetch_assoc($data['comments']))
	{
		$user_id = $row['user_id'];
		
		if ($user_id == 0)
		{
			$user_id = 'NULL';
		}
		
		mysql_query("INSERT INTO " . $tables_prefix . "comments (id, post_id, user_id, author, author_email, author_website, author_ip, content, date) VALUES('" . $row[id] . "', '" . $row[post_id] . "', " . $user_id . ", '" . $row[author] . "', '" . $row[author_email] . "', '" . $row[author_website] . "', '" . $row[author_ip] . "', '" . mysql_real_escape_string($row[content]) . "', '" . $row[date] . "')") or die (mysql_error());
	}
	
	// pages
	while ($row = mysql_fetch_assoc($data['pages']))
	{
		mysql_query("INSERT INTO " . $tables_prefix . "pages (id, title, url_title, author, date, content, status) VALUES('" . $row[id] . "', '" . $row[title] . "', '" . $row[url_title] . "', '" . $row[author] . "', '" . $row[date] . "', '" . $row[content] . "', '" . $row[status] . "')") or die (mysql_error());
	}
	
	// links
	while ($row = mysql_fetch_assoc($data['links']))
	{
		mysql_query("INSERT INTO " . $tables_prefix . "links (id, name, url, target, description, visible) VALUES('" . $row[id] . "', '" . $row[name] . "', '" . $row[url] . "', '" . $row[target] . "', '" . $row[description] . "', '" . $row[visible] . "')") or die (mysql_error());
	}
	
	// users
	while ($row = mysql_fetch_assoc($data['users']))
	{
		mysql_query("INSERT INTO " . $tables_prefix . "users (id, username, password, secret_key, email, website, msn_messenger, jabber, display_name, about_me, registered, last_login, level, status) VALUES('" . $row[id] . "', '" . $row[username] . "', '" . $row[password] . "', '', '" . $row[email] . "', '" . $row[website] . "', '" . $row[msn_messenger] . "', '" . $row[jabber] . "', '" . $row[display_name] . "', 'about_me', '" . $row[registered] . "', '" . $row[last_login] . "', '" . $row[level] . "', '" . $row[status] . "')") or die (mysql_error());;
	}
}

?>