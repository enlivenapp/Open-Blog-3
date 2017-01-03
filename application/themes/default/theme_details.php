<?php

	class Theme_default
	{
		/*
			This file is loaded and the information
			is inserted into the database.  The only
			time this file is accessed is duing 
			installation of the theme and when updating
			the theme.
		 */


		/* 
		 Name of your theme. 
		*/
		public $name = 'Default Open Blog Theme';

		/*
		  The description of your theme.  
		 */
		public $description = 'The default theme for Open Blog';

		// The author of the theme.
		public $author = 'Enliven Applications';

		// the author's email address
		public $author_email = 'info@open-blog.org';

		/*
			Is this theme a replacement for the default admin theme?
			if so, enter a value of '1', otherwise, set to '0' to 
			use as a publicly facing theme.
		 */
		public $is_admin = '0';

		/* 
			Enter the version of your theme. We use this
			in the blog and on open-blog.org to determine
			if an update in available.
		*/
		public $version = '1.0.0';


}





