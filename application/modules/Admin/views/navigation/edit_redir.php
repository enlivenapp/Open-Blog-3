<div class="row">
	<div class="col-xs-12">
		<?= validation_errors() ?>

		<?php if (isset($message)): ?>
			<div class="alert alert-danger" role="alert">
				<?= $message ?>
			</div>
		<?php endif ?>

		<h2><?= lang('nav_redir_edit_hdr');?></h2>
		<?= form_open(current_url());?>
		<p><?= lang('nav_redir_edit_subheading');?></p>
	</div>
</div>
<div>
	<div class="row m-t-m">
		<div class="col-xs-8">
			<div class="form-group">
				<label for="old_slug"><?= lang('nav_redir_form_old_slug_text') ?></label>
				<p class="help-block"><?= lang('nav_redir_form_old_slug_desc') ?></p>
				<?= form_input(['name' => 'old_slug', 'class' => 'form-control', 'value' => (set_value('old_slug')) ? set_value('old_slug') : $redir['old_slug'], 'placeholder' => lang('nav_redir_form_old_slug_text') ]) ?>
	  		</div>

	  		<div class="form-group">
				<label for="new_slug"><?= lang('nav_redir_form_new_slug_text') ?></label>
				<p class="help-block"><?= lang('nav_redir_form_new_slug_desc') ?></p>
				<?= form_input(['name' => 'new_slug', 'class' => 'form-control', 'value' => (set_value('new_slug')) ? set_value('new_slug') : $redir['new_slug'], 'placeholder' => lang('nav_redir_form_old_slug_text') ]) ?>
	  		</div>

	  		<div class="form-group">
				<label for="status"><?= lang('nav_redir_form_code_text') ?></label>
				<p class="help-block"><?= lang('nav_redir_form_code_desc') ?></p>
				<?= form_dropdown('code',['301' => lang('page_form_redirect_perm'), '302' => lang('page_form_redirect_temp')] , $redir['code'], ['class' => 'form-control']) ?>
	  		</div>

	  		<div class="form-group">
				<label for="status"><?= lang('nav_redir_form_type_text') ?></label>
				<p class="help-block"><?= lang('nav_redir_form_type_desc') ?></p>
				<?= form_dropdown('type',['page' => lang('nav_form_type_page'), 'post' => lang('nav_form_type_post')] , $redir['type'], ['class' => 'form-control']) ?>
	  		</div>
	  		
		</div>

		<div class="form-group">
			<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('redir_edit_btn');?>">
		</div>	
	</div>
</div>
</form>