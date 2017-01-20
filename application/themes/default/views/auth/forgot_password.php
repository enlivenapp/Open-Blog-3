<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title"><?= lang('forgot_password_heading') ?></h3>
			 	</div>
			  	<div class="panel-body">
			    	<?php echo form_open("auth/forgot_password");?>
                    <fieldset>
			    	  	<div class="form-group">
			    		    <?php echo form_input($identity);?>
			    		</div>
			    		<p class="text-center"><?= lang('forgot_password_subheading') ?></p>
			    		<input class="btn btn-lg btn-default btn-block" type="submit" value="<?= lang('reset_password_submit_btn') ?>">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>