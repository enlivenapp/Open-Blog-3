<div class="row">
	<div class="col-xs-12">
		<?= validation_errors() ?>

		<?php if (isset($message)): ?>
			<div class="alert alert-danger" role="alert">
				<?= $message ?>
			</div>
		<?php endif ?>

		<h2><?= lang('index_add_new_page');?></h2>
		<?= form_open(current_url());?>
		<p><?= lang('add_page_subheading');?></p>
	</div>
</div>
			
<div class="row">

	<div class="col-xs-8">
		<div class="form-group">
			<label for="title"><?= lang('page_form_title_text') ?></label>
			<p class="help-block"><?= lang('page_form_title_help_text') ?></p>
			<?= form_input(['name' => 'title', 'class' => 'form-control', 'placeholder' => lang('page_form_title_text') ]) ?>
  		</div>

  		<div class="form-group">
			<label for="status"><?= lang('page_form_status_text') ?></label>
			<p class="help-block"><?= lang('page_form_status_help_text') ?></p>
			<?= form_dropdown('status',['active' => lang('page_form_status_active'), 'inactive' => lang('page_form_status_inactive')] , 'inactive', ['class' => 'form-control', 'placeholder' => lang('page_form_status_text')]) ?>
  		</div>

  		<div class="form-group">
			<label for="content"><?= lang('page_form_content_text') ?></label>
			<p class="help-block"><?= lang('page_form_content_help_text') ?></p>
			<?= form_textarea(['name' => 'content', 'class' => 'form-control', 'placeholder' => lang('page_form_content_text')]) ?>
  		</div>
		
	</div>

	<div class="col-xs-4">
		<h4><?= lang('optional_hdr') ?></h4>
		<p class="help-block"><?= lang('optional_help_text') ?></p>
		<div class="form-group">
			<label for="meta_title"><?= lang('page_form_meta_title_text') ?></label>
			<p class="help-block"><?= lang('page_form_meta_title_help_text') ?></p>
			<?= form_input(['name' => 'meta_title', 'class' => 'form-control', 'placeholder' => lang('page_form_meta_title_text')]) ?>
  		</div>

  		<div class="form-group">
			<label for="meta_keywords"><?= lang('page_form_meta_keywords_text') ?></label>
			<p class="help-block"><?= lang('page_form_meta_keywords_help_text') ?></p>
			<?= form_input(['name' => 'meta_keywords', 'class' => 'form-control', 'placeholder' => lang('page_form_meta_keywords_text') ]) ?>
  		</div>

  		<div class="form-group">
			<label for="meta_description"><?= lang('page_form_meta_desc_text') ?></label>
			<p class="help-block"><?= lang('page_form_meta_desc_help_text') ?></p>
			<?= form_input(['name' => 'meta_description', 'class' => 'form-control', 'placeholder' => lang('page_form_meta_desc_text')]) ?>
  		</div>

  		<div class="checkbox">
    		<label>
      			<input type="checkbox" name="is_home"> <?= lang('page_form_home_text') ?>
      			<p class="help-block"><?= lang('page_form_home_help_text') ?></p>
    		</label>
  		</div>

  		<div class="form-group">
			<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('save_page_btn');?>">
  		</div>
  		
		</form>
	</div>

</div>

<script>
var simplemde = new SimpleMDE();
</script>

		
