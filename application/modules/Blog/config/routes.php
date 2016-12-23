<?php

$route['blog/page/(:num)'] 					= 'blog/index/$1';
$route['blog/(:num)/(:num)/(:num)/(:any)'] 	= 'blog/post/$1/$2/$3/$4';
$route['blog/post/(:any)'] 					= 'blog/post/$1';
$route['blog/archive/(:num)/(:num)']		= 'blog/archive/$1';
$route['blog/category/(:any)'] 				= 'blog/category/$1';
$route['blog/tags/(:any)'] 					= 'blog/tags/$1';
$route['search'] 							= 'blog/search';
