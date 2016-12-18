<?php

$writable['config_folder'] = is_writable('../application/config/');
$writable['config'] = is_writable('../application/config/config.php');
$writable['database'] = is_writable('../application/config/config.php');

$ob_new_version = check_for_new_version();

?>
<table class="install">
<tr>
    <td>
    	<h2>Open Blog information</h2>
    	<table>
	    	<tr>
	        	<td width="250px">Version:</td>
	        	<td><?php echo $config['version']; ?></td>
	       	</tr>
	        <tr>
	        	<td width="250px">New version available:</td>
	        	<? if ($ob_new_version == 1): ?>
	        		<td><font style="color: green">No</font></td>
	        	<? elseif ($ob_new_version == 2): ?>
	        		<td><font style="color: red">Yes</font> (you can download it <a href="<?php echo $config['download_url']; ?>" target="_blank">here</a>)</td>
	        	<? else: ?>
	        		<td>Check for upgrade failed</td>
	        	<? endif; ?>
	        </tr>
		    <tr>
		        <td width="250px">Official website:</td>
	        	<td><a href="<?=$config['website_url'];?>" target="_blank"><?php echo $config['website_url']; ?></a></td>
	        </tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<h2>Server information</h2>
    	<table>
	    <tr>
	        <td width="250px">PHP Version:</td>
	        <td><?php echo phpversion(); ?></td>
		</tr>
        </table>
	</td>
</tr>
<tr>
	<td>
   		<h2>File write permissions</h2>
    	<table>
	    	<tr>
	        	<td width="250px">config/</td>
	        	<? if ($writable['config_folder'] == true): ?>
	        		<td><img src="includes/images/yes.gif" alt="Yes" /></td>
	        	<? else: ?>
	        		<? $error = 1; ?>
	        		<td><img src="includes/images/no.gif" alt="No" /></td>
	        	<? endif; ?>
	        </tr>
        </table>
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td style="text-align: left">
		<input type="button" name="submit" value="&lsaquo;&lsaquo; Cancel" class="styled" onClick="window.location = 'index.php'" />
	</td>
	<td style="text-align: right">
		<? if ($error == 1): ?>
			<input type="button" name="submit" value="Refresh" class="styled" onClick="window.location.reload()" />
		<? else: ?>
			<input type="button" name="submit" value="Step 2 &rsaquo;&rsaquo;" class="styled" onClick="window.location = 'index.php?step=2'" />
		<? endif; ?>
	</td>
</tr>
</table>