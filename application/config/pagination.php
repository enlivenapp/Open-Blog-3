<?php 


/*

These may end up in the database with
	themes having a details.php file to set
	the front end framework...

 */

/*
	This is the pagination settings for 
	bootstrap 3.x

	Default: comment below if you will
	use semantic UI
 */

$config['full_tag_open'] = '<div class="text-center"><ul class="pagination pagination-small pagination-centered">';
$config['full_tag_close'] = '</ul></div>';
$config['num_links'] = 5;
$config['prev_link'] = '&lt; Prev';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['next_link'] = 'Next &gt;';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['first_link'] = FALSE;
$config['last_link'] = FALSE;
$config['anchor_class'] = 'follow_link';



/*
	This is the pagination settings for 
	Semantic UI

	Uncomment below to use.

$config['full_tag_open'] = '<div class="ui pagination menu">';
$config['full_tag_close'] ='</div>';
$config['num_tag_open'] = '<li class="item">';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active item">';
$config['cur_tag_close'] = '</li>';
$config['next_tag_open'] = '<li class="item">';
$config['next_tagl_close'] = '</li>';
$config['prev_tag_open'] = '<li class="item">';
$config['prev_tagl_close'] = '</li>';
$config['first_tag_open'] = '<li class="item">';
$config['first_tagl_close'] = '</li>';
$config['last_tag_open'] = '<li class="item">';
$config['last_tagl_close'] = '</li>';

 */