<h2><?= lang('comments_hdr') ?></h2>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= lang('comments_tab_moderated') ?></a></li>
        <li role="presentation"><a href="#active-comments" aria-controls="active-comments" role="tab" data-toggle="tab"><?= lang('comments_tab_active') ?></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home">
            <?php if ($modded_comments): ?>
            <table class="table table-condensed table-responsive">
                <tr>
                    <th><?= lang('comments_tbl_hdr_post_title') ?></th>
                    <th><?= lang('comments_tbl_hdr_author') ?></th>
                    <th><?= lang('comments_tbl_hdr_date') ?></th>
                    <th><?= lang('comments_tbl_hdr_short_excerpt') ?></th>
                    <th></th>
                </tr>   
                <?php foreach ($modded_comments as $com): ?>
                <tr>
                    <td><?= $com['post_title'] ?></td>
                    <td><?= $com['display_name'] ?></td>
                    <td><?= $com['date'] ?></td>
                    <td><?php echo word_limiter($com['content'], 10, '&#8230;') ?></td>
                    <td class="text-right">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#moddedModal<?= $com['id'] ?>"><?= lang('comments_btn_view') ?></button>
                        <a href="<?= site_url('admin_comments/accept_comment/' . $com['id']) ?>" class="btn btn-xs btn-default"><?= lang('comments_btn_accept') ?></a>
                        <a href="<?= site_url('admin_comments/edit_comment/' . $com['id']) ?>" class="btn btn-xs btn-default"><?= lang('comments_btn_edit') ?></a>
                        <a href="<?= site_url('admin_comments/remove_comment/' . $com['id']) ?>" class="btn btn-xs btn-danger"><?= lang('comments_btn_remove') ?></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <?php else: ?>
            <h4 class="text-center m-t-l"><?= lang('comments_no_comments_found_mod') ?></h4>
            <?php endif ?>
      
        </div>

        <div role="tabpanel" class="tab-pane fade" id="active-comments">
            <?php if ($active_comments): ?>
            <table class="table table-condensed table-responsive">
                <tr>
                    <th><?= lang('comments_tbl_hdr_post_title') ?></th>
                    <th><?= lang('comments_tbl_hdr_author') ?></th>
                    <th><?= lang('comments_tbl_hdr_date') ?></th>
                    <th><?= lang('comments_tbl_hdr_short_excerpt') ?></th>
                    <th></th>
                </tr>   
                <?php foreach ($active_comments as $com): ?>
                <tr>
                    <td><?= $com['post_title'] ?></td>
                    <td><?= $com['display_name'] ?></td>
                    <td><?= $com['date'] ?></td>
                    <td><?php echo word_limiter($com['content'], 10, '&#8230;') ?></td>
                    <td class="text-right">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#activeModal<?= $com['id'] ?>"><?= lang('comments_btn_view') ?></button>
                        <a href="<?= site_url('admin_comments/hide_comment/' . $com['id']) ?>" class="btn btn-xs btn-warning"><?= lang('comments_btn_hide') ?></a>
                        <a href="<?= site_url('admin_comments/edit_comment/' . $com['id']) ?>" class="btn btn-xs btn-default"><?= lang('comments_btn_edit') ?></a>
                        <a href="<?= site_url('admin_comments/remove_comment/' . $com['id']) ?>" class="btn btn-xs btn-danger"><?= lang('comments_btn_remove') ?></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <?php else: ?>
            <h4 class="text-center m-t-l"><?= lang('comments_no_comments_found_act') ?></h4>
            <?php endif ?>

        </div>
    </div>
</div>


<!-- modals -->
<?php foreach ($active_comments as $com): ?>
    <!-- Modal -->
<div class="modal fade" id="activeModal<?= $com['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $com['display_name'] ?> : <?= $com['date'] ?></h4>
      </div>
      <div class="modal-body">
        <?= $com['content'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?= site_url('admin_comments/hide_comment/' . $com['id']) ?>" class="btn btn-warning"><?= lang('comments_btn_hide') ?></a>
        <a href="<?= site_url('admin_comments/edit_comment/' . $com['id']) ?>" class="btn btn-default"><?= lang('comments_btn_edit') ?></a>
        <a href="<?= site_url('admin_comments/remove_comment/' . $com['id']) ?>" class="btn btn-danger"><?= lang('comments_btn_remove') ?></a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>


<?php foreach ($modded_comments as $com): ?>
    <!-- Modal -->
<div class="modal fade" id="moddedModal<?= $com['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $com['display_name'] ?> : <?= $com['date'] ?></h4>
      </div>
      <div class="modal-body">
        <?= $com['content'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?= site_url('admin_comments/accept_comment/' . $com['id']) ?>" class="btn btn-success"><?= lang('comments_btn_accept') ?></a>
        <a href="<?= site_url('admin_comments/edit_comment/' . $com['id']) ?>" class="btn btn-default"><?= lang('comments_btn_edit') ?></a>
        <a href="<?= site_url('admin_comments/remove_comment/' . $com['id']) ?>" class="btn btn-danger"><?= lang('comments_btn_remove') ?></a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>


