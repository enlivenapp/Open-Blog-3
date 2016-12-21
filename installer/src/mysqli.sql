DROP TABLE IF EXISTS {PREFIX}categories;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}categories (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(60) DEFAULT NULL,
  url_name varchar(200) DEFAULT NULL,
  description varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}categories` (`id`, `name`, `url_name`, `description`) VALUES
(1, 'Uncategorized', 'uncategorized', 'Uncategorized');

-- split --

DROP TABLE IF EXISTS {PREFIX}comments;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}comments (
  id int(11) NOT NULL AUTO_INCREMENT,
  post_id int(11) DEFAULT '0',
  user_id int(11) DEFAULT NULL,
  author varchar(50) DEFAULT NULL,
  author_email varchar(100) DEFAULT NULL,
  author_ip varchar(100) NOT NULL,
  content text,
  date datetime DEFAULT '0000-00-00 00:00:00',
  modded int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- split --

DROP TABLE IF EXISTS {PREFIX}groups;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}groups (
  id mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(20) NOT NULL,
  description varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'contributors', 'Contributor'),
(4, 'editors', 'Editor');

-- split --

DROP TABLE IF EXISTS {PREFIX}languages;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}languages (
  id int(11) NOT NULL AUTO_INCREMENT,
  language varchar(100) DEFAULT NULL,
  abbreviation varchar(3) DEFAULT NULL,
  author varchar(100) DEFAULT NULL,
  author_website varchar(255) NOT NULL,
  is_default enum('0','1') DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}languages` (`id`, `language`, `abbreviation`, `author`, `author_website`, `is_default`) VALUES
(1, 'english', 'en', 'Tomaz Muraus', 'http://www.open-blog.org', '1'),
(2, 'slovene', 'sl', 'Tomaz Muraus', 'http://www.open-blog.org', '0');

-- split --

DROP TABLE IF EXISTS {PREFIX}links;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}links (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  url varchar(255) DEFAULT NULL,
  target enum('blank','self','parent') DEFAULT 'blank',
  description varchar(100) DEFAULT NULL,
  visible enum('yes','no') DEFAULT 'yes',
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}links` (`id`, `name`, `url`, `target`, `description`, `visible`) VALUES
(1, 'Open Blog', 'http://open-blog.org', 'blank', 'Open Blog Website', 'yes'),
(2, 'CodeIgniter', 'http://www.codeigniter.com', 'blank', 'Codeigniter PHP Framework', 'yes');

-- split --

DROP TABLE IF EXISTS {PREFIX}login_attempts;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}login_attempts (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  ip_address varchar(15) NOT NULL,
  login varchar(100) NOT NULL,
  time int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

DROP TABLE IF EXISTS {PREFIX}navigation;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}navigation (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(50) DEFAULT NULL,
  description varchar(100) DEFAULT NULL,
  url varchar(255) DEFAULT NULL,
  external enum('0','1') NOT NULL DEFAULT '0',
  position varchar(100) NULL,
  PRIMARY KEY (id)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}navigation` (`id`, `title`, `description`, `url`, `external`, `position`) VALUES
(1, 'Home', 'Home', '', '0', 1),
(2, 'Archive', 'Archives', 'blog/archive/', '0', 2),
(3, 'Categories', 'Categories', 'categories', '0', 3);

-- split --

DROP TABLE IF EXISTS {PREFIX}pages;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}pages (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(200) DEFAULT NULL,
  url_title varchar(200) DEFAULT NULL,
  author int(11) DEFAULT '0',
  date date DEFAULT NULL,
  content text,
  status enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

DROP TABLE IF EXISTS {PREFIX}posts;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}posts (
  id int(11) NOT NULL AUTO_INCREMENT,
  author int(11) NOT NULL DEFAULT '0',
  date_posted date NOT NULL DEFAULT '0000-00-00',
  title varchar(200) NOT NULL,
  url_title varchar(200) NOT NULL,
  excerpt text NOT NULL,
  content longtext NOT NULL,
  allow_comments enum('0','1') NOT NULL DEFAULT '1',
  sticky enum('0','1') NOT NULL DEFAULT '0',
  status enum('draft','published') NOT NULL DEFAULT 'published',
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO {PREFIX}posts (id, author, date_posted, title, url_title, excerpt, content, allow_comments, sticky, `status`) VALUES(1, 1, '2016-12-21', 'Welcome to Open Blog', 'welcome-to-open-blog', '<p>Congratulations!</p>\n<p>If you can see this post, this means Open Blog was successfully installed.</p>\n<p>If you need help, don\'t hesitate and visit the <a href="http://open-blog.org" target="_blank">Open Blog website</a>.</p>\n<p>Sincerely,<br />The Open Blog team</p>\n<p><em>Since this is just an example post, feel free to delete it.</em></p>', '', '1', '0', 'published');

-- split --

DROP TABLE IF EXISTS {PREFIX}posts_to_categories;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}posts_to_categories (
  id int(11) NOT NULL AUTO_INCREMENT,
  post_id int(11) NOT NULL,
  category_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO {PREFIX}posts_to_categories (id, post_id, category_id) VALUES(1, 1, 1);


-- split --

DROP TABLE IF EXISTS {PREFIX}settings;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}settings (
  name varchar(255) NOT NULL,
  value varchar(255) NOT NULL,
  PRIMARY KEY (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}settings` (`name`, `value`) VALUES
('allow_comments', '1'),
('links_per_box', '10'),
('mod_non_user_comments', '1'),
('mod_user_comments', '0'),
('months_per_archive', '10'),
('posts_per_page', '10'),
('recaptcha_private_key', ''),
('recaptcha_site_key', ''),
('site_name', 'Open Blog'),
('theme_image', 'bg_suburb.jpg'),
('use_recaptcha', '1');

-- split --

DROP TABLE IF EXISTS {PREFIX}sidebar;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}sidebar (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(100) NOT NULL,
  file varchar(100) NOT NULL,
  status enum('enabled','disabled') NOT NULL,
  position varchar(100) NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}sidebar` (`id`, `title`, `file`, `status`, `position`) VALUES
(1, 'Search', 'search', 'enabled', 1),
(2, 'Archive', 'archive', 'enabled', 2),
(3, 'Categories', 'categories', 'enabled', 3),
(4, 'Tag_cloud', 'tag_cloud', 'enabled', 4),
(5, 'Feeds', 'feeds', 'enabled', 5),
(6, 'Links', 'links', 'enabled', 6),
(7, 'Other', 'other', 'enabled', 7);

-- split --

DROP TABLE IF EXISTS {PREFIX}social;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}social (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(30) NULL,
  url varchar(100) NULL,
  enabled int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}social` (`id`, `name`, `url`, `enabled`) VALUES
(1, 'Facebook', NULL, 1),
(2, 'Twitter', NULL, 1);

-- split --

DROP TABLE IF EXISTS {PREFIX}tags;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}tags (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}tags` (`id`, `name`) VALUES
(1, 'codeigniter'),
(2, 'blog');

-- split --

DROP TABLE IF EXISTS {PREFIX}tags_to_posts;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}tags_to_posts (
  id int(11) NOT NULL AUTO_INCREMENT,
  tag_id int(11) NOT NULL,
  post_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}tags_to_posts` (`id`, `tag_id`, `post_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- split --

DROP TABLE IF EXISTS {PREFIX}templates;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}templates (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  author varchar(100) DEFAULT NULL,
  path varchar(100) DEFAULT NULL,
  image varchar(100) DEFAULT NULL,
  is_default enum('0','1') DEFAULT '1',
  is_active varchar(1) NOT NULL DEFAULT '0',
  is_admin varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO {PREFIX}templates (id, `name`, author, path, image, is_default, is_active, is_admin) VALUES(1, 'Default', 'Enliven Applications', 'default', 'ea.jpg', '1', '1', '0');

-- split --

DROP TABLE IF EXISTS {PREFIX}users;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}users (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  ip_address varchar(45) NOT NULL,
  username varchar(100) DEFAULT NULL,
  password varchar(255) NOT NULL,
  salt varchar(255) DEFAULT NULL,
  email varchar(100) NOT NULL,
  activation_code varchar(40) DEFAULT NULL,
  forgotten_password_code varchar(40) DEFAULT NULL,
  forgotten_password_time int(11) UNSIGNED DEFAULT NULL,
  remember_code varchar(40) DEFAULT NULL,
  created_on int(11) UNSIGNED NOT NULL,
  last_login int(11) UNSIGNED DEFAULT NULL,
  active tinyint(1) UNSIGNED DEFAULT NULL,
  first_name varchar(50) DEFAULT NULL,
  last_name varchar(50) DEFAULT NULL,
  company varchar(100) DEFAULT NULL,
  phone varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO {PREFIX}users (id, ip_address, username, `password`, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, company, phone) VALUES(1, '127.0.0.1', '{USER-NAME}', '{PASSWORD}', '{SALT}', '{USER-EMAIL}', NULL, NULL, NULL, NULL, {NOW}, {NOW}, 1, '{FIRST-NAME}', '{LAST-NAME}', NULL, NULL);

-- split --

DROP TABLE IF EXISTS {PREFIX}users_groups;

-- split --

CREATE TABLE IF NOT EXISTS {PREFIX}users_groups (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id int(11) UNSIGNED NOT NULL,
  group_id mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uc_bp_users_groups (user_id,group_id),
  KEY fk_bp_users_groups_users1_idx (user_id),
  KEY fk_bp_users_groups_groups1_idx (group_id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- split --

INSERT INTO {PREFIX}users_groups (id, user_id, group_id) VALUES(1, 1, 1);

-- split --

ALTER TABLE {PREFIX}users_groups
  ADD CONSTRAINT fk_bp_users_groups_groups1 FOREIGN KEY (group_id) REFERENCES {PREFIX}groups (id) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_bp_users_groups_users1 FOREIGN KEY (user_id) REFERENCES {PREFIX}users (id) ON DELETE CASCADE ON UPDATE NO ACTION;

