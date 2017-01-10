<h4 class="text-center text-muted"><?php echo lang('blog_notices_hdr'); ?></h4>

<p class="text-center"><small><?= lang('blog_notices_help_txt') ?></small></p>
<?php $this->load->helper('form'); ?>
<?= form_open(site_url('notices/add')) ?>
<div class="form-group">
<?= form_input(['name' => 'email_address', 'class' => 'form-control', 'placeholder' => lang('notices_enter_email_address')]) ?>
</div>
<div class="form-group text-center">
<?= form_submit(['value' => lang('notices_get_notices'), 'class' => 'btn btn-default']) ?>
</div>
</form>