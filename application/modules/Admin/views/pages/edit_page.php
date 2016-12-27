<div class="row">
	<div class="col-xs-12">
		<?= validation_errors() ?>

		<?php if (isset($message)): ?>
			<div class="alert alert-danger" role="alert">
				<?= $message ?>
			</div>
		<?php endif ?>

		<h2><?= lang('index_edit_page');?></h2>
		<?= form_open(current_url());?>
		<p><?= lang('add_page_subheading');?></p>
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
					<label for="title"><?= lang('page_form_title_text') ?></label>
					<p class="help-block"><?= lang('page_form_title_help_text') ?></p>
					<?= form_input(['name' => 'title', 'class' => 'form-control', 'value' => $page['title'], 'placeholder' => lang('page_form_title_text') ]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="status"><?= lang('page_form_status_text') ?></label>
					<p class="help-block"><?= lang('page_form_status_help_text') ?></p>
					<?= form_dropdown('status',['active' => lang('page_form_status_active'), 'inactive' => lang('page_form_status_inactive')] , $page['status'], ['class' => 'form-control', 'placeholder' => lang('page_form_status_text')]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="content"><?= lang('page_form_content_text') ?></label>
					<p class="help-block"><?= lang('page_form_content_help_text') ?></p>
					<?= form_textarea(['name' => 'content', 'class' => 'form-control', 'value' => $page['content'], 'placeholder' => lang('page_form_content_text')]) ?>
		  		</div>
				
			</div>

			<div class="col-xs-4">
				<h4><?= lang('optional_hdr') ?></h4>
				<p class="help-block"><?= lang('optional_help_text') ?></p>
				<div class="form-group">
					<label for="meta_title"><?= lang('page_form_meta_title_text') ?></label>
					<p class="help-block"><?= lang('page_form_meta_title_help_text') ?></p>
					<?= form_input(['name' => 'meta_title', 'class' => 'form-control', 'value' => $page['meta_title'], 'placeholder' => lang('page_form_meta_title_text')]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="meta_keywords"><?= lang('page_form_meta_keywords_text') ?></label>
					<p class="help-block"><?= lang('page_form_meta_keywords_help_text') ?></p>
					<?= form_input(['name' => 'meta_keywords', 'class' => 'form-control', 'value' => $page['meta_keywords'], 'placeholder' => lang('page_form_meta_keywords_text') ]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="meta_description"><?= lang('page_form_meta_desc_text') ?></label>
					<p class="help-block"><?= lang('page_form_meta_desc_help_text') ?></p>
					<?= form_input(['name' => 'meta_description', 'class' => 'form-control', 'value' => $page['meta_description'], 'placeholder' => lang('page_form_meta_desc_text')]) ?>
		  		</div>

		  		<div class="checkbox">
		    		<label>
		      			<input type="checkbox" name="is_home"<?php echo ($page['is_home'] == '1') ? ' checked' : ''; ?>> <?= lang('page_form_home_text') ?>
		      			<p class="help-block"><?= lang('page_form_home_help_text') ?></p>
		    		</label>
		  		</div>
				
			</div>

		</div>


    </div>
    <div role="tabpanel" class="tab-pane fade" id="advanced">

    	<div class="row m-t-m">
			<div class="col-xs-8">

		    	<div class="form-group">
					<label for="url_title"><?= lang('page_form_url_title_text') ?></label>
					<p class="help-block"><?= lang('page_form_url_title_help_text') ?></p>
					<?= form_input(['name' => 'url_title', 'class' => 'form-control', 'value' => $page['url_title'], 'placeholder' => lang('page_form_url_title_text') ]) ?>
		  		</div>

		  		<div class="form-group">
					<label for="status"><?= lang('page_form_redirect_text') ?></label>
					<p class="help-block"><?= lang('page_form_redirect_help_text') ?></p>
					<?= form_dropdown('redirection',['none' => lang('page_form_redirect_none'), '301' => lang('page_form_redirect_perm'), '302' => lang('page_form_redirect_temp')] , '301', ['class' => 'form-control', 'placeholder' => lang('page_form_redirect_text')]) ?>
		  		</div>

		  	</div>
		  </div>

    </div>

  </div>

	<div class="form-group">
		<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('save_page_btn');?>">
	</div>

</div>

</form>
<script>
var simplemde = new SimpleMDE();
</script>