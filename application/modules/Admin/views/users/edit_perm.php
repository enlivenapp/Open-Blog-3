<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title"><?php echo lang('edit_perm_heading');?></h3>
			 	</div>
			  	<div class="panel-body">
			    	<?php echo form_open(current_url());?>
			    		<p><?php echo lang('edit_perm_subheading');?></p>
                    <fieldset>
			    	  	<div class="form-group">
			    		    <?php echo form_input($perm_name);?>
			    		</div>
			    		<div class="form-group">
			    			<?php echo form_input($perm_description);?>
			    		</div>
			    		<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('edit_perm_heading');?>">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>