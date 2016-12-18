<?php

if (is_installed() === TRUE)
{
	echo '<h1>Open Blog is already installed</h1>
	<p>It looks like Open Blog is already installed.<br /><br />
	Please delete the <strong>install/</strong> directory and then visit your blog home page.</p>
	<p>If you think you didn\'t install the blog and you got this message as an error, go to the <a href="http://www.open-blog.info" target="_blank">official website</a> and report this bug.</p>';
}
else
{
	echo '<p>Welcome to the Wordpress to Open Blog migration process</p>
	<p>To begin the migration process click the "<strong>Start migration &rsaquo;&rsaquo;</strong>" button on the bottom of this website and follow the on-screen instructions.</p>
	<p>If you encounter an error or you want more detailed installation instructions, go to the <a href="http://www.open-blog.info/migrating_from_wordpress/" target="_blank">Migrating from Wordpress</a> page.</p>
	<p align="center"><input type="button" name="submit" value="Start migration &rsaquo;&rsaquo;" class="styled" onClick="window.location =\'migrate.php?step=1\'" /></p>';
}

?>