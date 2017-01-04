<h2><?= lang('updates_hdr') ?></h2>
<p><?= lang('updates_subheader') ?></p>

<?php if ($update_avail && $update_avail['status'] == 'failed'): ?>
  <h4 class="text-center text-danger"><?= $update_avail['message'] ?></h4>

<?php else: ?>

<div class="row">
  <div class="col-xs-6 text-center">
    <h5><?= lang('updates_ob_install_text') ?></h5>
    <h3><?= $this->config->item('ob_version') ?></h3>
  </div>

  <div class="col-xs-6 text-center">
    <h5><?= lang('updates_ob_current_stable_text') ?></h5>
    <h3><?= $update_avail['current_version'] ?></h3>
  </div>

</div>

<div class="row">
  <div class="col-xs-12 text-center">
    <?php if ($this->config->item('ob_version') == $update_avail['current_version']): ?>
    <h4><?= lang('updates_install_up_to_date_text') ?></h4>
    <?php elseif ($this->config->item('ob_version') < $update_avail['current_version']): ?>
    <h4><?= lang('updates_update_available') ?></h4>
    <a href="http://addons.open-blog.org" class="btn btn-warning btn-lg btn-block" target="_blank"><?= lang('updates_download_btn') ?></a>
    <!-- <a href="<?= base_url('admin_updates/do_update') ?>" class="btn btn-warning btn-lg btn-block"><?= lang('updates_update_now_btn') ?></a> -->

    <?php endif ?> 
  </div>
</div>

<?php endif ?>