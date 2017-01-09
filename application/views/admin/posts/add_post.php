<div class="row">
	<div class="col-xs-12">
		<?= validation_errors() ?>

		<?php if (isset($message)): ?>
			<div class="alert alert-danger" role="alert">
				<?= $message ?>
			</div>
		<?php endif ?>

		<h2><?= lang('index_add_new_post');?></h2>
		<?= form_open_multipart(current_url());?>
		<p><?= lang('add_post_subheading');?></p>
	</div>
</div>
			
<div class="row">

	<div class="col-xs-8">
		<div class="form-group">
			<label for="title"><?= lang('post_form_title_text') ?></label>
			<p class="help-block"><?= lang('post_form_title_help_text') ?></p>
			<?= form_input(['name' => 'title', 'class' => 'form-control', 'placeholder' => lang('post_form_title_text') ]) ?>
  		</div>

  		<div class="form-group">
			<label for="status"><?= lang('post_form_status_text') ?></label>
			<p class="help-block"><?= lang('post_form_status_help_text') ?></p>
			<?= form_dropdown('status',['published' => lang('post_form_status_active'), 'draft' => lang('post_form_status_inactive')] , 'draft', ['class' => 'form-control', 'placeholder' => lang('post_form_status_text')]) ?>
  		</div>

  		<div class="form-group">
			<label for="content"><?= lang('post_form_content_text') ?></label>
			<p class="help-block"><?= lang('post_form_content_help_text') ?></p>
			<?= form_textarea(['name' => 'content', 'id' => 'content', 'value' => set_value('content'), 'class' => 'form-control', 'placeholder' => lang('post_form_content_text')]) ?>
  		</div>


  		<div class="form-group">
			<label for="excerpt"><?= lang('post_form_excerpt_text') ?></label>
			<p class="help-block"><?= lang('post_form_excerpt_help_text') ?></p>
			<?= form_textarea(['name' => 'excerpt', 'class' => 'form-control', 'placeholder' => lang('post_form_excerpt_text')]) ?>
  		</div>

		
	</div>

	<div class="col-xs-4">

		<div class="form-group">
			<label for="excerpt"><?= lang('cats_hdr') ?></label>
			<p class="help-block"><?= lang('post_form_cats_help_text') ?></p>
			<?= form_multiselect('cats[]', $cats, null, ['class' => 'form-control']) ?>
  		</div>

  		


		<h4><?= lang('optional_hdr') ?></h4>

		<div class="form-group">
			<label for="feature_image"><?= lang('post_form_feature_image_text') ?></label>
			<p class="help-block"><?= lang('post_add_form_feature_image_help_text') ?></p>
			<?= form_upload(['name' => 'feature_image', 'class' => 'form-control', 'placeholder' => lang('post_form_feature_image_text') ]) ?>
  		</div>

		<div class="form-group">
			<label for="url_title"><?= lang('post_form_url_title_text') ?></label>
			<p class="help-block"><?= lang('post_add_form_url_title_help_text') ?></p>
			<?= form_input(['name' => 'url_title', 'class' => 'form-control', 'placeholder' => lang('post_form_url_title_text') ]) ?>
  		</div>

		<p class="help-block"><?= lang('optional_help_text') ?></p>
		<div class="form-group">
			<label for="meta_title"><?= lang('post_form_meta_title_text') ?></label>
			<p class="help-block"><?= lang('post_form_meta_title_help_text') ?></p>
			<?= form_input(['name' => 'meta_title', 'class' => 'form-control', 'placeholder' => lang('post_form_meta_title_text')]) ?>
  		</div>

  		<div class="form-group">
			<label for="meta_keywords"><?= lang('post_form_meta_keywords_text') ?></label>
			<p class="help-block"><?= lang('post_form_meta_keywords_help_text') ?></p>
			<?= form_input(['name' => 'meta_keywords', 'class' => 'form-control', 'placeholder' => lang('post_form_meta_keywords_text') ]) ?>
  		</div>

  		<div class="form-group">
			<label for="meta_description"><?= lang('post_form_meta_desc_text') ?></label>
			<p class="help-block"><?= lang('post_form_meta_desc_help_text') ?></p>
			<?= form_input(['name' => 'meta_description', 'class' => 'form-control', 'placeholder' => lang('post_form_meta_desc_text')]) ?>
  		</div>

  		<div class="form-group">
			<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('save_post_btn');?>">
  		</div>
  		
		</form>
	</div>

</div>

<script>
var simplemde = new SimpleMDE({
	forceSync: true,
    element: document.getElementById("content")
});
</script>

		
