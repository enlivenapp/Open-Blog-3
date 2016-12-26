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
			    	<h3 class="panel-title"><?= lang('index_add_new_cat');?></h3>
			 	</div>
			  	<div class="panel-body">
			    	<?= form_open(current_url());?>
			    		<p><?= lang('add_cat_subheading');?></p>
                    <fieldset>
			    	  	<div class="form-group">
			    		    <?= form_input( [ 'name'=> 'name', 'id' => 'name', 'class' => "form-control", 'placeholder' => lang('cat_form_name'), 'value' => ($this->input->post('name'))?$this->input->post('name'):$cat['name'] ] ) ?>
			    		</div>
			    		<div class="form-group">
			    			<?= form_input(['name'=> 'url_name', 'id' => 'url_name', 'class' => "form-control", 'placeholder' => lang('cat_form_url'), 'value' => ($this->input->post('url_name'))?$this->input->post('url_name'):$cat['url_name'] ] ) ?>
			    		</div>
			    		<div class="form-group">
			    			<?= form_input(['name'=> 'description', 'id' => 'description', 'class' => "form-control", 'placeholder' => lang('cat_form_desc'), 'value' => ($this->input->post('description'))?$this->input->post('description'):$cat['description'] ] ) ?>
			    		</div>
			    		<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('save_cat_btn');?>">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>