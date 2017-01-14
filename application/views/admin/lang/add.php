<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
			<?= validation_errors() ?>

			<?php if (isset($message)): ?>
				<div class="alert alert-danger" role="alert">
					<?= $message ?>
				</div>
			<?php endif ?>
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title"><?= lang('index_add_new_social');?></h3>
			 	</div>
			  	<div class="panel-body">
			    	<?= form_open(current_url());?>
			    		<p><?= lang('add_social_subheading');?></p>
                    <fieldset>
			    	  	<div class="form-group">
			    		    <?= form_input(['name'=> 'name', 'id' => 'name', 'class' => "form-control", 'placeholder' => lang('social_form_name'), 'value' => set_value('name')]) ?>
			    		</div>
			    		<div class="form-group">
			    			<?= form_input(['name'=> 'url', 'id' => 'url', 'class' => "form-control", 'placeholder' => lang('social_form_url'), 'value' => set_value('url')]) ?>
			    		</div>
			    		<div class="form-group">
			    			<label><?= lang('social_form_active') ?></label>
			    			<?= form_dropdown('enabled', ['0' => lang('no'), '1' => lang('yes')], '1', 'class="form-control"') ?>
			    		</div>
			    		<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('save_social_btn');?>">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>