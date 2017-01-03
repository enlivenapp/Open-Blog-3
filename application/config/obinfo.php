<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	Editing the information below can have
	significant negative side effects.

	Some of this information is used for
	the update process.
 */


$config['ob_version'] 	= '3.0.0';
$config['ob_author']	= 'Enliven Applications';
$config['ob_email']		= 'info@open-blog.org';


// API endpoints

// returns current release 
// version number
$config['ob_updates_url']			= 'http://updates.open-blog.org/current/';

// returns current release 
// version files
$config['ob_update_download_url']	= 'http://updates.open-blog.org/current/download';

// returns list of available themes 
// for the current release of OB.
$config['ob_themes_url']			= 'http://addons.open-blog.org/api/themes/';