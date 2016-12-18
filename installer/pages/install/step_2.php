<table class="install">
<tr>
	<form action="install.php?step=3" method="post">
    <td>
    	<h2>Database Settings</h2>
    	<table>
	    	<tr>
	        	<td width="250px">Database hostname:</td>
	        	<td><input type="text" name="database_hostname" value="localhost" id="database_hostname" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Database username:</td>
	        	<td><input type="text" name="database_username" value="" id="database_username" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Database password:</td>
	        	<td><input type="password" name="database_password" value="" id="database_password" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Database name:</td>
	        	<td><input type="text" name="database_name" value="" id="database_name" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Tables prefix:</td>
	        	<td><input type="text" name="database_tables_prefix" value="ob_" id="database_tables_prefix" size="35" class="styled"  /></td>
	        </tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<h2>Main Settings</h2>
    	<table>
	   		<tr>
	        	<td width="250px">Blog URL:</td>
	        	<td><input type="text" name="blog_url" value="<?php echo get_root_url(); ?>" id="blog_url" size="35" class="styled"  /></td>
	        </tr>
	        	<td width="250px">Enable SEO URLs :</td>
	        	<td><input type="checkbox" name="enable_seo_urls" value="1" id="enable_seo_urls" class="styled" <?php echo (get_mod_rewrite_status()) ? 'checked="checked"' : ''; ?>  /> (choose this if your web server has mod_rewrite module enabled)</td>
	        </tr>
        </table>
	</td>
</tr>
<tr>
	<td>
		<h2>Blog Settings</h2>
    	<table>
	   		<tr>
	        	<td width="250px">Blog title:</td>
	        	<td><input type="text" name="blog_title" value="" id="blog_title" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Blog description:</td>
	        	<td><input type="text" name="blog_description" value="" id="blog_description " size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">META keywords:</td>
	        	<td><input type="text" name="meta_keywords" value="open blog, open source, freeware" id="meta_keywords" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Admin email:</td>
	        	<td><input type="text" name="blog_admin_email" id="blog_admin_email" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Allow registrations:</td>
	        	<td><input type="checkbox" name="allow_registrations" value="1" checked="checked"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Posts per page:</td>
	        	<td><input type="text" name="posts_per_site" value="5" id="posts_per_site" size="1" class="styled"  /> (default = 5)</td>
	        </tr>
	        <tr>
	        	<td width="250px">Links per box:</td>
	        	<td><input type="text" name="links_per_box" value="5" id="links_per_box" size="1" class="styled"  /> (default = 5)</td>
	        </tr>
	        <tr>
	        	<td width="250px">Months per archive:</td>
	        	<td><input type="text" name="months_per_archive" value="8" id="months_per_archive" size="1" class="styled"  /> (default = 8)</td>
	        </tr>
        </table>
	</td>
</tr>
<tr>
	<td>
		<h2>Administrator details</h2>
    	<table>
	   		<tr>
	        	<td width="250px">Admin username:</td>
	        	<td><input type="text" name="admin_username" value="" id="admin_username" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Display name:</td>
	        	<td><input type="text" name="admin_display_name" value="" id="admin_display_name" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Password:</td>
	        	<td><input type="password" name="admin_password" value="" id="admin_password" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Email address:</td>
	        	<td><input type="text" name="admin_email" value="" id="admin_email" size="35" class="styled"  /></td>
	        </tr>
        </table>
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td style="text-align: left">
		<input type="button" name="step_1" value="&lsaquo;&lsaquo; Step 1" class="styled" onClick="window.location = 'install.php?step=1'" />
	</td>
	<td style="text-align: right">
		<input type="submit" name="submit" value="Install &rsaquo;&rsaquo;" class="styled" />
	</td>
</tr>
	</form>
</table>