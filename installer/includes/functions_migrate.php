<?php

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

function check_for_database_tables($hostname, $username, $password, $database, $ob_tables_prefix)
{
	$connection = @mysql_connect($hostname, $username, $password) or $error = TRUE;
	@mysql_select_db($database) or $error = TRUE;
	
	$query = mysql_query("SHOW TABLES LIKE '" . $ob_tables_prefix . "%'");
	
	if (mysql_num_rows($query) == 10)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
	
	mysql_close($connection);
}

function get_data($wp_tables_prefix = 'wp_')
{
	$data['comments'] = mysql_query("SELECT comment_post_id AS post_id, user_id, comment_author AS author, comment_author_email AS author_email, comment_author_IP AS author_ip, comment_date AS date, comment_content AS content FROM " . $wp_tables_prefix . "comments");
	$data['links'] = mysql_query("SELECT link_name AS name, link_url AS url, link_target AS target, link_description AS description, link_visible AS visible FROM " . $wp_tables_prefix . "links");
	$data['users'] = mysql_query("SELECT ID AS id, user_login AS username, user_pass AS password, user_email AS email, user_url AS website, user_registered AS registered, user_status AS status, display_name, wp_usermeta.meta_value AS capabilities FROM " . $wp_tables_prefix . "users LEFT JOIN " . $wp_tables_prefix . "usermeta ON " . $wp_tables_prefix . "users.ID = " . $wp_tables_prefix . "usermeta.user_id WHERE wp_usermeta.meta_key = 'wp_capabilities'");
	
	$data['settings']['blog_title'] = mysql_result(mysql_query("SELECT option_value FROM " . $wp_tables_prefix . "options WHERE option_name = 'blogname'"), 0);
	$data['settings']['blog_description'] = mysql_result(mysql_query("SELECT option_value FROM " . $wp_tables_prefix . "options WHERE option_name = 'blogdescription'"), 0);
	$data['settings']['allow_registrations'] = mysql_result(mysql_query("SELECT option_value FROM " . $wp_tables_prefix . "options WHERE option_name = 'users_can_register'"), 0);
	$data['settings']['admin_email'] = mysql_result(mysql_query("SELECT option_value FROM " . $wp_tables_prefix . "options WHERE option_name = 'admin_email'"), 0);
	$data['settings']['posts_per_page'] = mysql_result(mysql_query("SELECT option_value FROM " . $wp_tables_prefix . "options WHERE option_name = 'posts_per_page'"), 0);
	$data['settings']['blog_title'] = mysql_result(mysql_query("SELECT option_value FROM " . $wp_tables_prefix . "options WHERE option_name = 'blogname'"), 0);
	
	$data['posts'] = mysql_query("SELECT ID AS id, post_author AS author, post_date AS date_posted, post_title AS title, post_name AS url_title, post_excerpt AS excerpt, post_content AS content, post_status AS status, comment_status FROM " . $wp_tables_prefix . "posts WHERE post_type = 'post' AND (post_status = 'publish' OR post_status = 'draft')");
	$data['pages'] = mysql_query("SELECT post_title AS title, post_name AS url_title, post_author AS author, post_date AS date, post_content AS content, post_status AS status FROM  " . $wp_tables_prefix . "posts WHERE post_type = 'page'");
	$data['categories'] = mysql_query("SELECT " . $wp_tables_prefix . "terms.term_id AS id, name, slug AS url_name, description FROM " . $wp_tables_prefix . "terms INNER JOIN " . $wp_tables_prefix . "term_taxonomy ON " . $wp_tables_prefix . "terms.term_id = " . $wp_tables_prefix . "term_taxonomy.term_id WHERE taxonomy = 'category'");
	$data['tags'] = mysql_query("SELECT " . $wp_tables_prefix . "terms.term_id AS id, name FROM " . $wp_tables_prefix . "terms INNER JOIN " . $wp_tables_prefix . "term_taxonomy ON " . $wp_tables_prefix . "terms.term_id = " . $wp_tables_prefix . "term_taxonomy.term_id WHERE taxonomy = 'post_tag'");
	$data['posts_to_categories'] = mysql_query("SELECT " . $wp_tables_prefix . "term_taxonomy.term_id AS category_id, " . $wp_tables_prefix . "term_relationships.object_id AS post_id FROM " . $wp_tables_prefix . "term_taxonomy INNER JOIN " . $wp_tables_prefix . "term_relationships ON " . $wp_tables_prefix . "term_taxonomy.term_taxonomy_id = " . $wp_tables_prefix . "term_relationships.term_taxonomy_id INNER JOIN " . $wp_tables_prefix . "posts ON " . $wp_tables_prefix . "term_relationships.object_id = " . $wp_tables_prefix . "posts.ID WHERE " . $wp_tables_prefix . "term_taxonomy.taxonomy = 'category' AND " . $wp_tables_prefix . "posts.post_status = 'publish' AND " . $wp_tables_prefix . "posts.post_type = 'post'");
	$data['tags_to_posts'] = mysql_query("SELECT " . $wp_tables_prefix . "term_taxonomy.term_id AS tag_id, " . $wp_tables_prefix . "term_relationships.object_id AS post_id FROM " . $wp_tables_prefix . "term_taxonomy INNER JOIN " . $wp_tables_prefix . "term_relationships ON " . $wp_tables_prefix . "term_taxonomy.term_taxonomy_id = " . $wp_tables_prefix . "term_relationships.term_taxonomy_id WHERE " . $wp_tables_prefix . "term_taxonomy.taxonomy = 'post_tag'");
	
	return $data;
}

function create_new_tables($ob_tables_prefix)
{
	$database_schema = @file('includes/files/database_schema_migrate.sql');
	
	$database_schema = preg_replace('#ob_#i', $ob_tables_prefix, $database_schema);
	
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

function insert_data($wp_tables_prefix = 'wp_', $ob_tables_prefix = 'ob_', $data)
{	
	// settings
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('blog_title', '" . $data['settings']['blog_title'] . "')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('blog_description', '" . $data['settings']['blog_description'] . "')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('meta_keywords', 'open blog, open source, freeware')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('allow_registrations', '" . $data['settings']['allow_registrations'] . "')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_captcha', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('recognize_user_agent', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_rss_posts', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_rss_comments', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_atom_posts', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_atom_comments', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_delicious', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_technorati', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_digg', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_stumbleupon', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_furl', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enable_reddit', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('posts_per_page', '" . $data['settings']['posts_per_page'] . "')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('links_per_box', '5')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('months_per_archive', '8')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('enabled', '1')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('offline_reason', '')");
	mysql_query("INSERT INTO " . $ob_tables_prefix . "settings (name, value) VALUES ('admin_email', '" . $data['settings']['admin_email'] . "')");
	
	// categories
	while ($row = mysql_fetch_assoc($data['categories']))
	{
		mysql_query("INSERT INTO " . $ob_tables_prefix . "categories (id, name, url_name, description) VALUES('" . $row[id] . "', '" . $row[name] . "', '" . $row[url_name] . "', '" . $row[description] . "')") or die (mysql_error());
	}
	
	// posts to categories
	while ($row = mysql_fetch_assoc($data['posts_to_categories']))
	{
		mysql_query("INSERT INTO " . $ob_tables_prefix . "posts_to_categories (post_id, category_id) VALUES('" . $row[post_id] . "', '" . $row[category_id] . "')");
	}
	
	// tags
	while ($row = mysql_fetch_assoc($data['tags']))
	{
		mysql_query("INSERT INTO " . $ob_tables_prefix . "tags (id, name) VALUES('" . $row[id] . "', '" . $row[name] . "')") or die (mysql_error());
	}
	
	// tags to posts
	while ($row = mysql_fetch_assoc($data['tags_to_posts']))
	{
		mysql_query("INSERT INTO " . $ob_tables_prefix . "tags_to_posts (tag_id, post_id) VALUES('" . $row[tag_id] . "', '" . $row[post_id] . "')") or die (mysql_error());
	}
	
	// posts
	while ($row = mysql_fetch_assoc($data['posts']))
	{
		$status = $row['status'];
		$allow_comments = $row['comment_status'];
		
		if ($status == 'publish')
		{
			$status = 'published';
		}
		else if ($status == 'draft')
		{
			$status = 'draft';
		}
		
		$more_marker = strpos($row['content'], '<!--more-->');
		$more_market_length = strlen('<!--more-->');
		
		// we found '<!--more-->' tag
		if ($more_marker !== FALSE)
		{
			$excerpt = nl2br(substr($row['content'], 0, $more_marker));
			$content = nl2br(substr($row['content'], $more_marker + $more_market_length)) ;
		}
		else
		{
			$excerpt = $row['content'];
			$content = '';
		}
		
		if ($allow_comments == 'open')
		{
			$allow_comments = 1;
		}
		else if ($allow_comments == 'closed')
		{
			$allow_comments = 0;
		}

		mysql_query("INSERT INTO " . $ob_tables_prefix . "posts (id, author, date_posted, title, url_title, excerpt, content, allow_comments, status) VALUES('" . $row['id'] . "', '" . $row[author] . "', '" . $row[date_posted] . "', '" . $row[title] . "', '" . $row[url_title] . "', '" . mysql_real_escape_string($excerpt) . "', '" . mysql_real_escape_string($content) . "', '" . $allow_comments . "', '" . $status . "')") or die (mysql_error());
	}
	
	// comments
	while ($row = mysql_fetch_assoc($data['comments']))
	{
		$user_id = $row['user_id'];

		if ($user_id == 0)
		{
			$comment_user_id = 'NULL';
			$author = $row['author'];
			$author_email = $row['author_email'];
			$author_website = $row['author_website'];
		}
		else
		{
			$comment_user_id  = $user_id;
			$author = 'NULL';
			$author_email = 'NULL';
			$author_website = 'NULL';
		}

		mysql_query("INSERT INTO " . $ob_tables_prefix . "comments (id, post_id, user_id, author, author_email, author_website, author_ip, content, date) VALUES('" . $row[id] . "', '" . $row[post_id] . "', " . $comment_user_id . ", '" . $author . "', '" . $author_email . "', '" . $author_website . "', '" . $row[author_ip] . "', '" . mysql_real_escape_string($row[content]) . "', '" . $row[date] . "')") or die (mysql_error());
	}
	
	// pages
	while ($row = mysql_fetch_assoc($data['pages']))
	{
		$status = $row['status'];
		
		if ($status == 'publish')
		{
			$status = 'active';
		}
		else if ($status == 'draft')
		{
			$status = 'inactive';
		}
		
		mysql_query("INSERT INTO " . $ob_tables_prefix . "pages (title, url_title, author, date, content, status) VALUES('" . $row[title] . "', '" . $row[url_title] . "', '" . $row[author] . "', '" . $row[date] . "', '" . $row[content] . "', '" . $status . "')") or die (mysql_error());
	}
	
	// links
	while ($row = mysql_fetch_assoc($data['links']))
	{
		$target = $row['target'];
		$visible = $row['visible'];
		
		if ($target == '')
		{
			$target = 'self';
		}
		
		if ($visible == 'Y')
		{
			$visible = 'yes';
		}
		else if ($visible == 'N')
		{
			$visible = 'no';
		}
		
		mysql_query("INSERT INTO " . $ob_tables_prefix . "links (name, url, target, description, visible) VALUES('" . $row[name] . "', '" . $row[url] . "', '" . $row[target] . "', '" . $row[description] . "', '" . $visible . "')") or die (mysql_error());
	}
	
	// users
	while ($row = mysql_fetch_assoc($data['users']))
	{
		$capabilities = $row['capabilities'];
		
		if (strpos($capabilities, 'administrator') !== FALSE)
		{
			$level = 'administrator';
		}
		else
		{
			$level = 'user';
		}
		
		mysql_query("INSERT INTO " . $ob_tables_prefix . "users (id, username, wordpress_password, email, website, display_name, registered, level) VALUES('" . $row[id] . "', '" . $row[username] . "', '" . $row[password] . "', '" . $row[email] . "', '" . $row[website] . "', '" . $row[display_name] . "', '" . $row[registered] . "', '" . $level . "')") or die (mysql_error());
	}
}

?>