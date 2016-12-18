<table class="install">
<tr>
	<form action="migrate.php?step=3" method="post">
    <td>
    	<h2>Wordpress database information</h2>
    	<table>
	    	<tr>
	        	<td width="250px">Database hostname:</td>
	        	<td><input type="text" name="wp_database_hostname" value="localhost" id="wp_database_hostname" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Database username:</td>
	        	<td><input type="text" name="wp_database_username" value="" id="wp_database_username" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Database password:</td>
	        	<td><input type="password" name="wp_database_password" value="" id="wp_database_password" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Database name:</td>
	        	<td><input type="text" name="wp_database_name" value="" id="wp_database_name" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Tables prefix:</td>
	        	<td><input type="text" name="wp_database_tables_prefix" value="wp_" id="wp_database_tables_prefix" size="35" class="styled"  /></td>
	        </tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<td>
    	<h2>Open Blog database information</h2>
    	<table>
	    	<tr>
	        	<td width="250px">Database hostname:</td>
	        	<td><input type="text" name="ob_database_hostname" value="localhost" id="ob_database_hostname" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Database username:</td>
	        	<td><input type="text" name="ob_database_username" value="" id="ob_database_username" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Database password:</td>
	        	<td><input type="password" name="ob_database_password" value="" id="ob_database_password" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Database name:</td>
	        	<td><input type="text" name="ob_database_name" value="" id="ob_database_name" size="35" class="styled"  /></td>
	        </tr>
	        <tr>
	        	<td width="250px">Tables prefix:</td>
	        	<td><input type="text" name="ob_database_tables_prefix" value="ob_" id="ob_database_tables_prefix" size="35" class="styled"  /></td>
	        </tr>
		</table>
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td style="text-align: left">
		<input type="button" name="step_1" value="&lsaquo;&lsaquo; Step 1" class="styled" onClick="window.location = 'migrate.php?step=1'" />
	</td>
	<td style="text-align: right">
		<input type="submit" name="submit" value="Migrate &rsaquo;&rsaquo;" class="styled" />
	</td>
</tr>
	</form>
</table>