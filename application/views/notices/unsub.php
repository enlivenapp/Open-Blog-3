<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo lang('blog_notices_unsub_hdr'); ?></h3>
        </div>
          <div class="panel-body">
            <p class="text-center"><small><?= lang('blog_notices_help_unsub_txt') ?></small></p>
				<?php $this->load->helper('form'); ?>
				<?= form_open() ?>
				<div class="form-group">
				<?= form_input(['name' => 'email_address', 'class' => 'form-control', 'placeholder' => lang('notices_enter_email_address')]) ?>
				</div>
				<div class="form-group text-center">
				<?= form_submit(['value' => lang('notices_unsub_btn'), 'class' => 'btn btn-default']) ?>
				</div>
				</form>
          </div>
      </div>
    </div>
  </div>
</div>

