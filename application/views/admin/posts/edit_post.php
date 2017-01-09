<div class="row">
	<div class="col-xs-12">
		<?= validation_errors() ?>

		<?php if (isset($message)): ?>
			<div class="alert alert-danger" role="alert">
				<?= $message ?>
			</div>
		<?php endif ?>

		<h2><?= lang('index_edit_post');?></h2>
		<?= form_open_multipart(current_url());?>
		<p><?= lang('add_post_subheading');?></p>
	</div>
</div>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Basics</a></li>
    <li role="presentation"><a href="#advanced" aria-controls="advanced" role="tab" data-toggle="tab">Advanced</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">

		<div class="row m-t-m">
			<div class="col-xs-8">
				<div class="form-group">
					<label for="title"><?= lang('post_form_title_text') ?></label>
					<p class="help-block"><?= lang('post_form_title_help_text') ?></p>
					<?= form_input(['name' => 'title', 'class' => 'form-control', 'value' => $post['title'], 'placeholder' => lang('post_form_title_text') ]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="status"><?= lang('post_form_status_text') ?></label>
					<p class="help-block"><?= lang('post_form_status_help_text') ?></p>
					<?= form_dropdown('status',['published' => lang('post_form_status_active'), 'draft' => lang('post_form_status_inactive')] , $post['status'], ['class' => 'form-control', 'placeholder' => lang('post_form_status_text')]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="content"><?= lang('post_form_content_text') ?></label>
					<p class="help-block"><?= lang('post_form_content_help_text') ?></p>
					<?= form_textarea(['name' => 'content', 'id' => 'content', 'class' => 'form-control', 'value' => $post['content'], 'placeholder' => lang('post_form_content_text')]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="excerpt"><?= lang('post_form_excerpt_text') ?></label>
					<p class="help-block"><?= lang('post_form_excerpt_help_text') ?></p>
					<?= form_textarea(['name' => 'excerpt', 'class' => 'form-control', 'value' => $post['excerpt'], 'placeholder' => lang('post_form_excerpt_text')]) ?>
		  		</div>
				
			</div>

			<div class="col-xs-4">

				<div class="form-group">
					<label for="excerpt"><?= lang('cats_hdr') ?></label>
					<p class="help-block"><?= lang('post_form_cats_help_text') ?></p>
					<?= form_multiselect('cats[]', $post['cats'], $post['selected_cats'], ['class' => 'form-control']) ?>
		  		</div>


				<h4><?= lang('optional_hdr') ?></h4>

				<div class="form-group">
					<label for="feature_image"><?= lang('post_form_feature_image_text') ?></label>
					<?php if($post['feature_image']): ?>
			          <img src="<?= base_url('uploads/' . $post['feature_image']) ?>" class="img-responsive" alt="<?php echo $post['title'] ?>">
			        <?php endif ?>
					
					<p class="help-block"><?= lang('post_edit_form_feature_image_help_text') ?></p>
					<?= form_upload(['name' => 'feature_image', 'class' => 'form-control', 'placeholder' => lang('post_form_feature_image_text') ]) ?>
		  		</div>


				<p class="help-block"><?= lang('optional_help_text') ?></p>
				<div class="form-group">
					<label for="meta_title"><?= lang('post_form_meta_title_text') ?></label>
					<p class="help-block"><?= lang('post_form_meta_title_help_text') ?></p>
					<?= form_input(['name' => 'meta_title', 'class' => 'form-control', 'value' => $post['meta_title'], 'placeholder' => lang('post_form_meta_title_text')]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="meta_keywords"><?= lang('post_form_meta_keywords_text') ?></label>
					<p class="help-block"><?= lang('post_form_meta_keywords_help_text') ?></p>
					<?= form_input(['name' => 'meta_keywords', 'class' => 'form-control', 'value' => $post['meta_keywords'], 'placeholder' => lang('post_form_meta_keywords_text') ]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="meta_description"><?= lang('post_form_meta_desc_text') ?></label>
					<p class="help-block"><?= lang('post_form_meta_desc_help_text') ?></p>
					<?= form_input(['name' => 'meta_description', 'class' => 'form-control', 'value' => $post['meta_description'], 'placeholder' => lang('post_form_meta_desc_text')]) ?>
		  		</div>
				
			</div>

		</div>


    </div>
    <div role="tabpanel" class="tab-pane fade" id="advanced">

    	<div class="row m-t-m">
			<div class="col-xs-8">

		    	<div class="form-group">
					<label for="url_title"><?= lang('post_form_url_title_text') ?></label>
					<p class="help-block"><?= lang('post_form_url_title_help_text') ?></p>
					<?= form_input(['name' => 'url_title', 'class' => 'form-control', 'value' => $post['url_title'], 'placeholder' => lang('post_form_url_title_text') ]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="status"><?= lang('post_form_redirect_text') ?></label>
					<p class="help-block"><?= lang('post_form_redirect_help_text') ?></p>
					<?= form_dropdown('redirection',['none' => lang('post_form_redirect_none'), '301' => lang('post_form_redirect_perm'), '302' => lang('post_form_redirect_temp')] , '301', ['class' => 'form-control', 'placeholder' => lang('post_form_redirect_text')]) ?>
		  		</div>

		  	</div>
		  </div>

    </div>

  </div>

	<div class="form-group">
		<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('save_post_btn');?>">
	</div>

</div>

</form>
<script>
var simplemde = new SimpleMDE({
	forceSync: true,
    element: document.getElementById("content")
});
</script>