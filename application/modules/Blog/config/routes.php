<?php

$route['blog/page/(:num)'] 				= 'blog/index/$1';
$route['(:num)/(:num)/(:num)/(:any)'] 	= 'blog/post/$1/$2/$3/$4';
$route['post/(:any)'] 					= 'blog/post/$1';
$route['archive/(:any)']				= 'blog/archive/$1';
$route['category/(:any)'] 				= 'blog/category/$1';
$route['tags/(:any)'] 					= 'blog/tags/$1';
$route['search'] 						= 'blog/search';
