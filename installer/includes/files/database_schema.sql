# Table: 'ob_categories' structure
CREATE TABLE `ob_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(60) default NULL,
  `url_name` varchar(200) default NULL,
  `description` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_categories' data
INSERT INTO `ob_categories` (`id`, `name`, `url_name`, `description`) VALUES(1, 'Sample category', 'sample-category', 'Sample category');

# Table: 'ob_comments' structure
CREATE TABLE `ob_comments` (
  `id` int(11) NOT NULL auto_increment,
  `post_id` int(11) default '0',
  `user_id` int(11) default NULL,
  `author` varchar(50) default NULL,
  `author_email` varchar(100) default NULL,
  `author_website` varchar(200) default NULL,
  `author_ip` varchar(100) NOT NULL,
  `content` text,
  `date` datetime default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_languages' structure
CREATE TABLE `ob_languages` (
  `id` int(11) NOT NULL auto_increment,
  `language` varchar(100) default NULL,
  `abbreviation` varchar(3) default NULL,
  `author` varchar(100) default NULL,
  `is_default` enum('0','1') default NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_languages' data
INSERT INTO `ob_languages` (`id`, `language`, `abbreviation`, `author`, `is_default`) VALUES(1, 'english', 'en', 'Tomaz Muraus', '1');
INSERT INTO `ob_languages` (`id`, `language`, `abbreviation`, `author`, `is_default`) VALUES(2, 'slovene', 'sl', 'Tomaz Muraus', '0');

# Table: 'ob_links' structure
CREATE TABLE `ob_links` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `url` varchar(255) default NULL,
  `target` enum('blank','self','parent') default 'blank',
  `description` varchar(100) default NULL,
  `visible` enum('yes','no') default 'yes',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_links' data
INSERT INTO `ob_links` (`id`, `name`, `url`, `target`, `description`, `visible`) VALUES(1, 'Open Blog', 'http://www.open-blog.info', 'blank', 'Open Blog Website', 'yes');
INSERT INTO `ob_links` (`id`, `name`, `url`, `target`, `description`, `visible`) VALUES(2, 'CodeIgniter', 'http://www.codeigniter.com', 'blank', 'Codeigniter PHP Framework', 'yes');

# Table: 'ob_navigation' structure
CREATE TABLE `ob_navigation` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) default NULL,
  `description` varchar(100) default NULL,
  `url` varchar(255) default NULL,
  `position` int(11) default '0',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_navigation' data
INSERT INTO `ob_navigation` (`id`, `title`, `description`, `url`, `position`) VALUES(1, 'Home', 'Index', '', 0);
INSERT INTO `ob_navigation` (`id`, `title`, `description`, `url`, `position`) VALUES(2, 'Archive', 'Archive', 'blog/archive/', 1);

# Table: 'ob_pages' structure
CREATE TABLE `ob_pages` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) default NULL,
  `url_title` varchar(200) default NULL,
  `author` int(11) default '0',
  `date` date default NULL,
  `content` text,
  `status` enum('active','inactive') default 'active',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_posts' structure
CREATE TABLE `ob_posts` (
  `id` int(11) NOT NULL auto_increment,
  `author` int(11) default '0',
  `date_posted` date default NULL,
  `title` varchar(200) default NULL,
  `url_title` varchar(200) default NULL,
  `category_id` int(11) default '0',
  `excerpt` text,
  `content` longtext,
  `allow_comments` enum('0','1') default '1',
  `status` enum('draft','published') default 'published',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_posts' data
INSERT INTO `ob_posts` (`id`, `author`, `date_posted`, `title`, `url_title`, `category_id`, `excerpt`, `allow_comments`, `status`) VALUES(1, 1, '2009-01-01', 'Welcome to Open Blog', 'welcome-to-open-blog', 1, '<p>Congratulations!</p>\n<p>If you can see this post, this means Open Blog was successfully installed.</p>\n<p>If you need help, don\'t hesitate and visit the Open Blog <a href="http://www.open-blog.info" target="_blank">home page</a>.</p>\n<p>Sincerely,<br />The Open Blog team</p>\n<p><em>Since this is just an example post, feel free to delete it.</em></p>', '1', 'published');

# Table: 'ob_settings' structure
CREATE TABLE `ob_settings` (
  `id` int(11) NOT NULL auto_increment,
  `blog_title` varchar(100) default NULL,
  `blog_description` varchar(255) default NULL,
  `meta_keywords` varchar(255) default NULL,
  `allow_registrations` enum('0','1') default '1',
  `enable_rss` enum('0','1') default '1',
  `enable_atom` enum('0','1') default '1',
  `posts_per_site` int(11) default '5',
  `links_per_box` int(11) default '5',
  `months_per_archive` int(11) default '8',
  `enabled` enum('0','1') default '1',
  `offline_reason` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
)  DEFAULT CHARSET=utf8;

# Table: 'ob_templates' structure
CREATE TABLE `ob_templates` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `author` varchar(100) default NULL,
  `path` varchar(100) default NULL,
  `image` varchar(100) default NULL,
  `is_default` enum('0','1') default '1',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_templates' data
INSERT INTO `ob_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(1, 'Colorvoid', 'Arcsin', 'colorvoid', 'colorvoid.jpg', '1');
INSERT INTO `ob_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(2, 'Beautiful Day', 'Arcsin', 'beautiful_day', 'beautiful_day.jpg', '0');
INSERT INTO `ob_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(3, 'Natural Essence', 'Arcsin', 'natural_essence', 'natural_essence.jpg', '0');
INSERT INTO `ob_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(4, 'Contaminated', 'Arcsin', 'contaminated', 'contaminated.jpg', '0');
INSERT INTO `ob_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(5, 'Interlude', 'Free CSS Templates', 'interlude', 'interlude.jpg', '0');

# Table: 'ob_users' structure
CREATE TABLE `ob_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(64) default NULL,
  `email` varchar(100) default NULL,
  `website` varchar(100) default NULL,
  `msn_messenger` varchar(200) default NULL,
  `jabber` varchar(100) default NULL,
  `display_name` varchar(50) default NULL,
  `about_me` text NOT NULL,
  `registered` datetime default '0000-00-00 00:00:00',
  `last_login` datetime default '0000-00-00 00:00:00',
  `level` enum('user','administrator') default 'user',
  `status` enum('0','1') default '1',
  PRIMARY KEY  (`id`)
)  DEFAULT CHARSET=utf8;
