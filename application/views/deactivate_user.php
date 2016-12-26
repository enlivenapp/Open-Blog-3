<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title"><?php echo lang('deactivate_heading');?> </h3>
			 	</div>
			  	<div class="panel-body">
			    	<?php echo form_open("auth/deactivate/".$user->id);?>
			    	<?php echo form_hidden($csrf); ?>
  					<?php echo form_hidden(array('id'=>$user->id)); ?>
			    	<div class="alert alert-danger"><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></div>
                    <fieldset>
			    	  	<div class="form-group">
			    		    <div class="radio">
							  <label>
							    <input type="radio" name="confirm" value="yes" />
							    Yes
							  </label>
							</div>
							<div class="radio">
							  <label>
							    <input type="radio" name="confirm" value="no" checked="checked" />
							    No
							  </label>
							</div>
			    		</div>
			    		<input class="btn btn-lg btn-default btn-block" type="submit" value="Deactivate User">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>