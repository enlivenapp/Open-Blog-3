<?php

if (is_installed() === TRUE): ?>
	echo '<h1>Open Blog already installed</h1>
	<p>It looks like Open Blog is already installed.<br /><br />
	Please delete the <strong>install/</strong> directory and then visit your blog home page.</p>
	<p>If you think you didn\'t install the Blog and you got this message as an error, go to the <a href="http://www.open-blog.info" target="_blank">official website</a> and report this bug.</p>';
<?php else: ?>
	<p>Welcome to the Open Blog Installation</p>
	<p>To begin the installation process click the "<strong>Start installation &rsaquo;&rsaquo;</strong>" button on the bottom of this website and follow the on-screen instructions.</p>
	<p>If you encounter an error or you want more detailed installation instructions, go to the <a href="http://www.open-blog.info/getting_started/" target="_blank">Getting started</a> page.</p>
	<p align="center"><input type="button" name="submit" value="Start installation &rsaquo;&rsaquo;" class="styled" onClick="window.location =\'index.php?step=1\'" /></p>';
<?php endif ?>