<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Most of this will end up in the database
	and be overwritten.  These are defaults.

 */


/*
	How many results per page?
	This is used for any page that uses pagination.

	Default: 10
 */
$config['results_per_page'] = '10';


$config['openblog']['tables']['posts']          			= 'posts';
$config['openblog']['tables']['categories']     			= 'categories';
$config['openblog']['tables']['tags']    					= 'tags';
$config['openblog']['tables']['tags_to_post']  				= 'tags_to_post';
$config['openblog']['tables']['links']    					= 'links';
$config['openblog']['tables']['comments']    				= 'comments';
$config['openblog']['tables']['users']    					= 'users';
$config['openblog']['tables']['posts_to_categories']     	= 'posts_to_categories';
$config['openblog']['tables']['settings']          			= 'settings';
$config['openblog']['tables']['pages']          			= 'pages';
$config['openblog']['tables']['navigation']        			= 'navigation';
$config['openblog']['tables']['redirects']          		= 'redirects';
$config['openblog']['tables']['templates']          		= 'templates';
$config['openblog']['tables']['social']          			= 'social';
$config['openblog']['tables']['notifications']          	= 'notifications';
$config['openblog']['tables']['languages']          		= 'languages';

/*
 | Users table column and Group table column you want to join WITH.
 |
 | Joins from users.id
 | Joins from groups.id
 */
$config['join']['users']  = 'user_id';
$config['join']['groups'] = 'group_id';


