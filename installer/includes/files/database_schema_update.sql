# Table: 'ob_categories' structure
CREATE TABLE `ob_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(60) default NULL,
  `url_name` varchar(200) default NULL,
  `description` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

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
  `author_website` varchar(255) NOT NULL,
  `is_default` enum('0','1') default NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

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

# Table: 'ob_navigation' structure
CREATE TABLE `ob_navigation` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) default NULL,
  `description` varchar(100) default NULL,
  `url` varchar(255) default NULL,
  `external` enum('0','1') NOT NULL default '0',
  `position` int(11) default '0',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

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
  `author` int(11) NOT NULL default '0',
  `date_posted` date NOT NULL default '0000-00-00',
  `title` varchar(200) character set utf8 NOT NULL,
  `url_title` varchar(200) character set utf8 NOT NULL,
  `excerpt` text character set utf8 NOT NULL,
  `content` longtext character set utf8 NOT NULL,
  `allow_comments` enum('0','1') character set utf8 NOT NULL default '1',
  `sticky` enum('0','1') NOT NULL default '0',
  `status` enum('draft','published') character set utf8 NOT NULL default 'published',
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_posts_to_categories' data

CREATE TABLE `ob_posts_to_categories` (
  `id` int(11) NOT NULL auto_increment,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_settings' structure
CREATE TABLE `ob_settings` (
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY  (`name`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_sidebar' structure
CREATE TABLE `ob_sidebar` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_sidebar' data
INSERT INTO `ob_sidebar` VALUES(1, 'Search', 'search', 'enabled', 1);
INSERT INTO `ob_sidebar` VALUES(2, 'Archive', 'archive', 'enabled', 2);
INSERT INTO `ob_sidebar` VALUES(3, 'Categories', 'categories', 'enabled', 3);
INSERT INTO `ob_sidebar` VALUES(4, 'Tag_cloud', 'tag_cloud', 'enabled', 4);
INSERT INTO `ob_sidebar` VALUES(5, 'Feeds', 'feeds', 'enabled', 5);
INSERT INTO `ob_sidebar` VALUES(6, 'Links', 'links', 'enabled', 6);
INSERT INTO `ob_sidebar` VALUES(7, 'Other', 'other', 'enabled', 7);

# Table: 'ob_tags' data
CREATE TABLE `ob_tags` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

# Table: 'ob_tags_to_posts' data
CREATE TABLE `ob_tags_to_posts` (
  `id` int(11) NOT NULL auto_increment,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) DEFAULT CHARSET=utf8;

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
INSERT INTO `ob_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(5, 'Emplode', 'Arcsin', 'emplode', 'emplode.jpg', '0');
INSERT INTO `ob_templates` (`id`, `name`, `author`, `path`, `image`, `is_default`) VALUES(6, 'Vector Lover', 'styleshout', 'vector_lover', 'vector_lover.jpg', '0');

# Table: 'ob_users' structure
CREATE TABLE `ob_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(64) default NULL,
  `wordpress_password` varchar(64) default NULL,
  `secret_key` varchar(64) default NULL,
  `email` varchar(100) default NULL,
  `website` varchar(100) default NULL,
  `msn_messenger` varchar(200) default NULL,
  `jabber` varchar(100) default NULL,
  `display_name` varchar(50) default NULL,
  `about_me` text default NULL,
  `registered` datetime default '0000-00-00 00:00:00',
  `last_login` datetime default '0000-00-00 00:00:00',
  `level` enum('user','administrator') default 'user',
  `status` enum('0','1') default '1',
  PRIMARY KEY  (`id`)
)  DEFAULT CHARSET=utf8;