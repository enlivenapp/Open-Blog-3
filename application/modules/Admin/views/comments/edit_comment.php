<div class="row">
	<div class="col-xs-12">
		<?= validation_errors() ?>

		<?php if (isset($message)): ?>
			<div class="alert alert-danger" role="alert">
				<?= $message ?>
			</div>
		<?php endif ?>

		<h2><?= lang('comment_edit_hdr');?></h2>
		<?= form_open(current_url());?>
		<p><?= lang('comment_edit_subheading');?></p>
	</div>
</div>
			
<div class="row">

	<div class="col-xs-8">
  		<div class="form-group">
			<label for="content"><?= lang('comment_form_field_content') ?></label>
			<p class="help-block"><?= lang('comment_form_field_content_hlp_txt') ?></p>
			<?= form_textarea(['name' => 'content', 'class' => 'form-control', 'value' => $comment['content'], 'placeholder' => lang('comment_form_field_content')]) ?>
  		</div>

  		<div class="form-group">
			<input class="btn btn-lg btn-default btn-block" type="submit" value="<?php echo lang('comments_save_btn');?>">
  		</div>
	</div>

	<div class="col-xs-4">
		<h4><?= lang('comment_details_hdr') ?></h4>
		<p><?= lang('comments_blog_post_hdr') ?>: <?= $comment['post_title'] ?> (<?= $comment['post_id'] ?>)</p>
		<p><?= lang('comments_comment_id') ?>: <?= $comment['id'] ?></p>
		<p><?= lang('comments_author') ?>: <?= $comment['display_name'] ?></p>
		<p><?= lang('comments_date_posted') ?>: <?= $comment['date'] ?></p>
		<p><?= lang('comments_current_status') ?>: <? echo ($comment['modded'] == 1) ? "Moderated" : "Published"; ?></p>
	</div>

</div>
</form>

