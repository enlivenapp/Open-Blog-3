<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title"><?php echo lang('edit_group_heading');?></h3>
			 	</div>
			  	<div class="panel-body">
			    	<?php echo form_open(current_url());?>
			    		<p><?php echo lang('edit_group_subheading');?></p>
                    <fieldset>
			    	  	<div class="form-group">
			    		    <?php echo form_input($group_name);?>
			    		</div>
			    		<div class="form-group">
			    			<?php echo form_input($group_description);?>
			    		</div>
			    		
			    		<input class="btn btn-lg btn-default btn-block" type="submit" value="Edit Group">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>