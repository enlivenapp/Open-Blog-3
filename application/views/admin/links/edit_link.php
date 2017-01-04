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
			    	<h3 class="panel-title"><?= lang('index_add_new_link');?></h3>
			 	</div>
			  	<div class="panel-body">
			    	<?= form_open(current_url());?>
			    		<p><?= lang('add_link_subheading');?></p>
                    <fieldset>
			    	  	<div class="form-group">
			    		    <?= form_input( [ 'name'=> 'name', 'id' => 'name', 'class' => "form-control", 'placeholder' => lang('link_form_name'), 'value' => ($this->input->post('name'))?$this->input->post('name'):$link['name'] ] ) ?>
			    		</div>
			    		<div class="form-group">
			    			<?= form_input(['name'=> 'url', 'id' => 'url', 'class' => "form-control", 'placeholder' => lang('link_form_url'), 'value' => ($this->input->post('url'))?$this->input->post('url'):$link['url'] ] ) ?>
			    		</div>
			    		<div class="form-group">
			    			<?= form_dropdown('target', ['_blank' => lang('blank_window'), '_self' => lang('same_window')], ($this->input->post('target'))?$this->input->post('target'):$link['target'], 'class="form-control"') ?>
			    		</div>
			    		<div class="form-group">
			    			<?= form_input(['name'=> 'description', 'id' => 'description', 'class' => "form-control", 'placeholder' => lang('link_form_desc'), 'value' => ($this->input->post('description'))?$this->input->post('description'):$link['description'] ] ) ?>
			    		</div>
			    		<div class="form-group">
			    			<?= form_dropdown('visible', ['1' => lang('visible'), '0' => lang('not_visible')], ($this->input->post('visible'))?$this->input->post('visible'):$link['visible'], 'class="form-control"') ?>
			    		</div>
			    		<div class="form-group">
			    			<?= form_input(['name'=> 'position', 'id' => 'position', 'class' => "form-control", 'placeholder' => lang('link_form_position'), 'value' => ($this->input->post('position'))?$this->input->post('position'):$link['position'] ] ) ?>
			    		</div>
			    		<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('save_link_btn');?>">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>