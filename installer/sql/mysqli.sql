DROP TABLE IF EXISTS `{PREFIX}categories`;
CREATE TABLE `{PREFIX}categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `url_name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}categories` (`id`, `name`, `url_name`, `description`) VALUES
(1, 'Uncategorized', 'uncategorized', 'Uncategorized');

-- split --

DROP TABLE IF EXISTS `{PREFIX}comments`;
CREATE TABLE `{PREFIX}comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `author_email` varchar(100) DEFAULT NULL,
  `author_ip` varchar(100) NOT NULL,
  `content` text,
  `date` datetime DEFAULT '0000-00-00 00:00:00',
  `modded` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

DROP TABLE IF EXISTS `{PREFIX}groups`;
CREATE TABLE `{PREFIX}groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'contributors', 'Contributor'),
(4, 'editors', 'Editor');

-- split --

DROP TABLE IF EXISTS `{PREFIX}languages`;
CREATE TABLE `{PREFIX}languages` (
  `id` int(11) NOT NULL,
  `language` varchar(100) DEFAULT NULL,
  `abbreviation` varchar(3) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `author_website` varchar(255) NOT NULL,
  `is_default` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}languages` (`id`, `language`, `abbreviation`, `author`, `author_website`, `is_default`) VALUES
(1, 'english', 'en', 'Enliven Applications', 'http://www.open-blog.org', '1');

-- split --

DROP TABLE IF EXISTS `{PREFIX}links`;
CREATE TABLE `{PREFIX}links` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` enum('blank','self','parent') DEFAULT 'blank',
  `description` varchar(100) DEFAULT NULL,
  `visible` enum('yes','no') DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}links` (`id`, `name`, `url`, `target`, `description`, `visible`) VALUES
(1, 'Open Blog', 'http://enlivenapp.com', 'blank', 'Blog Pie Website', 'yes'),
(2, 'CodeIgniter', 'http://www.codeigniter.com', 'blank', 'Codeigniter PHP Framework', 'yes');

-- split --

DROP TABLE IF EXISTS `{PREFIX}login_attempts`;
CREATE TABLE `{PREFIX}login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

DROP TABLE IF EXISTS `{PREFIX}navigation`;
CREATE TABLE `{PREFIX}navigation` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `external` enum('0','1') NOT NULL DEFAULT '0',
  `position` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}navigation` (`id`, `title`, `description`, `url`, `external`, `position`) VALUES
(1, 'Home', 'Home', '', '0', 1),
(2, 'Archive', 'Archives', 'blog/archive/', '0', 2),
(3, 'Categories', 'Categories', 'categories', '0', 3);

-- split --

DROP TABLE IF EXISTS `{PREFIX}pages`;
CREATE TABLE `{PREFIX}pages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `url_title` varchar(200) DEFAULT NULL,
  `author` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  `content` text,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

DROP TABLE IF EXISTS `{PREFIX}posts`;
CREATE TABLE `{PREFIX}posts` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL DEFAULT '0',
  `date_posted` date NOT NULL DEFAULT '0000-00-00',
  `title` varchar(200) NOT NULL,
  `url_title` varchar(200) NOT NULL,
  `excerpt` text NOT NULL,
  `content` longtext NOT NULL,
  `allow_comments` enum('0','1') NOT NULL DEFAULT '1',
  `sticky` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('draft','published') NOT NULL DEFAULT 'published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}posts` (`id`, `author`, `date_posted`, `title`, `url_title`, `excerpt`, `content`, `allow_comments`, `sticky`, `status`) VALUES
(1, 1, '2016-12-20', 'Welcome to Open Blog', 'welcome-to-open-blog', '<p>Congratulations!</p>\n<p>If you can see this post, this means Open Blog was successfully installed.</p>\n<p>If you need help, don\'t hesitate and visit the Blog Pie <a href="http://open-blog.org" target="_blank">home page</a>.</p>\n<p>Sincerely,<br />The Open Blog team</p>\n<p><em>Since this is just an example post, feel free to delete it.</em></p>', '', '1', '0', 'published');

-- split --

DROP TABLE IF EXISTS `{PREFIX}posts_to_categories`;
CREATE TABLE `{PREFIX}posts_to_categories` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}posts_to_categories` (`id`, `post_id`, `category_id`) VALUES
(1, 1, 1);

-- split --

DROP TABLE IF EXISTS `{PREFIX}settings`;
CREATE TABLE `{PREFIX}settings` (
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
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
('theme_image', ''),
('use_recaptcha', '0');

-- split --

DROP TABLE IF EXISTS `{PREFIX}sidebar`;
CREATE TABLE `{PREFIX}sidebar` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` enum('enabled','disabled') NOT NULL,
  `position` int(11) NOT NULL
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

DROP TABLE IF EXISTS `{PREFIX}social`;
CREATE TABLE `{PREFIX}social` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `enabled` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}social` (`id`, `name`, `url`, `enabled`) VALUES
(1, 'Facebook', '', 0),
(2, 'Twitter', '', 0);

-- split --

DROP TABLE IF EXISTS `{PREFIX}tags`;
CREATE TABLE `{PREFIX}tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}tags` (`id`, `name`) VALUES
(1, 'codeigniter'),
(2, 'blog');

-- split --

DROP TABLE IF EXISTS `{PREFIX}tags_to_posts`;
CREATE TABLE `{PREFIX}tags_to_posts` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}tags_to_posts` (`id`, `tag_id`, `post_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- split --

DROP TABLE IF EXISTS `{PREFIX}templates`;
CREATE TABLE `{PREFIX}templates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `is_default` enum('0','1') DEFAULT '1',
  `is_active` varchar(1) NOT NULL DEFAULT '0',
  `is_admin` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}templates` (`id`, `name`, `author`, `path`, `image`, `is_default`, `is_active`, `is_admin`) VALUES
(1, 'Default', 'Enliven Applications', 'default', 'ea.jpg', '1', '1', '0');

-- split --

DROP TABLE IF EXISTS `{PREFIX}users`;
CREATE TABLE `{PREFIX}users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', '{USER-NAME}', '{PASSWORD}', '{SALT}', '{USER-EMAIL}', NULL, NULL, NULL, NULL, {NOW}, {NOW}, 1, '{FIRST-NAME}', '{LAST-NAME}', NULL, NULL);

-- split --

DROP TABLE IF EXISTS `{PREFIX}users_groups`;
CREATE TABLE `{PREFIX}users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- split --

INSERT INTO `{PREFIX}users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

-- split --

ALTER TABLE `{PREFIX}categories`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}comments`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}groups`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}languages`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}links`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}login_attempts`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}navigation`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}pages`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}posts`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}posts_to_categories`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}settings`
  ADD PRIMARY KEY (`name`);

-- split --

ALTER TABLE `{PREFIX}sidebar`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}social`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}tags`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}tags_to_posts`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}templates`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}users`
  ADD PRIMARY KEY (`id`);

-- split --

ALTER TABLE `{PREFIX}users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_{PREFIX}users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_{PREFIX}users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_{PREFIX}users_groups_groups1_idx` (`group_id`);

-- split --

ALTER TABLE `{PREFIX}categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- split --

ALTER TABLE `{PREFIX}comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- split --

ALTER TABLE `{PREFIX}groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- split --

ALTER TABLE `{PREFIX}languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- split --

ALTER TABLE `{PREFIX}links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- split --

ALTER TABLE `{PREFIX}login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

-- split --

ALTER TABLE `{PREFIX}navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- split --

ALTER TABLE `{PREFIX}pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- split --

ALTER TABLE `{PREFIX}posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- split --

ALTER TABLE `{PREFIX}posts_to_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- split --

ALTER TABLE `{PREFIX}sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- split --

ALTER TABLE `{PREFIX}social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- split --

ALTER TABLE `{PREFIX}tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- split --

ALTER TABLE `{PREFIX}tags_to_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- split --

ALTER TABLE `{PREFIX}templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- split --

ALTER TABLE `{PREFIX}users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- split --

ALTER TABLE `{PREFIX}users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- split --

ALTER TABLE `{PREFIX}users_groups`
  ADD CONSTRAINT `fk_{PREFIX}users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `{PREFIX}groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_{PREFIX}users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `{PREFIX}users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
