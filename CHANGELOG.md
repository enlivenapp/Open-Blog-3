# Change Log for Open Blog v3

## v3.0.3

* Fixes #60 (issue)
* Ion_auth security update
* MySQL update: ob_login_attempts table -> `ip_address` varchar(15) NOT NULL, TO `ip_address` varchar(45) NOT NULL,


## v3.0.2

* Updated README
* CodeIgniter Updated from 3.1.3 -> 3.1.6
* mcrypt_create_iv() depreciated in PHP 7.1+, Updated to check random_bytes() first, then mcrypt_create_iv() for PHP 5.6 - 7.1.x compatibility.
* foreach() error in themes/default/views/posts/index.php (Default Theme)
* spelling error in application/language/english/blog_lang.php
* Portuguese Translation Added
* Added this CHANGELOG file

## v3.0.1 

* Fix #56 create mysql 5.7 tables with STRICT_TRANS_TABLES enabled

## v3.0.0 - Initial Public Release

* Initial Public release with basic functionality


