<?php

if (is_installed() === FALSE)
{
	echo '<h1>No Open Blog installation detected</h1>
	<p>If you would like to make clean install of Open Blog, go <a href="install.php">here</a> and follow the on-screen instructions.</p>
	<p>If you think you got this message as an error, go to the <a href="http://www.open-blog.info" target="_blank">official website</a> and report this bug.</p>';
}
else
{
	echo '<p>Welcome to the Open Blog update process</p>
	<p>To begin the update process click the "<strong>Start update &rsaquo;&rsaquo;</strong>" button on the bottom of this website and follow the on-screen instructions.</p>
	<p>If you encounter an error or you want more detailed update instructions, go to the <a href="http://www.open-blog.info/updating_to_1_2_0/" target="_blank">Updating to 1.2.0</a> page.</p>
	<p align="center"><input type="button" name="submit" value="Start update &rsaquo;&rsaquo;" class="styled" onClick="window.location =\'update.php?step=1\'" /></p>';
}

?>