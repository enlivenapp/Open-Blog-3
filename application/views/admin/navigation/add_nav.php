<div class="row">
	<div class="col-xs-12">
		<?= validation_errors() ?>

		<?php if (isset($message)): ?>
			<div class="alert alert-danger" role="alert">
				<?= $message ?>
			</div>
		<?php endif ?>

		<h2><?= lang('nav_new_hdr');?></h2>
		<?= form_open(current_url());?>
		<p><?= lang('edit_nav_subheading');?></p>
	</div>
</div>
<div>
	<div class="row m-t-m">
		<div class="col-xs-8">
			<div class="form-group">
				<label for="title"><?= lang('nav_form_title_text') ?></label>
				<p class="help-block"><?= lang('nav_form_title_help_text') ?></p>
				<?= form_input(['name' => 'title', 'class' => 'form-control', 'value' => set_value('title'), 'placeholder' => lang('nav_form_title_text') ]) ?>
	  		</div>

	  		<div class="form-group">
				<label for="description"><?= lang('nav_form_desc_text') ?></label>
				<p class="help-block"><?= lang('nav_form_desc_help_text') ?></p>
				<?= form_input(['name' => 'description', 'class' => 'form-control', 'value' => set_value('description'), 'placeholder' => lang('nav_form_desc_text') ]) ?>
	  		</div>

	  		
		</div>
		<div class="col-xs-4">

			<h4><?= lang('nav_right_side_hdr') ?></h4>
			<p><?= lang('nav_right_side_desc') ?></p>

			<div class="form-group">
				<label for="page"><?= lang('nav_form_choose_page') ?></label>
				<p class="help-block"><?= lang('nav_form_choose_page_help_text') ?></p>
				<?= form_dropdown('page', $page_slugs, '', 'class="form-control"'); ?>
	  		</div>	

	  		<div class="form-group">
				<label for="post"><?= lang('nav_form_choose_post') ?></label>
				<p class="help-block"><?= lang('nav_form_choose_post_help_text') ?></p>
				<?= form_dropdown('post', $post_slugs, '', 'class="form-control"'); ?>
	  		</div>	

	  		<!--
			<div class="form-group">
				<label for="url"><?= lang('nav_form_url_text') ?></label>
				<p class="help-block"><?= lang('nav_form_url_help_text') ?></p>
				<?= form_input(['name' => 'url', 'class' => 'form-control', 'value' => set_value('url'), 'placeholder' => lang('nav_form_url_text_example') ]) ?>
	  		</div>
	  		-->	
		</div>
		<div class="form-group">
			<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('nav_save_btn');?>">
		</div>	
	</div>
</div>
</form>