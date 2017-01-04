<h2><?= lang('nav_hdr') ?></h2>

<p><a class="btn btn-default btn-sm" href="<?php echo site_url('admin_navigation/add_nav') ?>"><?php echo lang('index_add_new_nav') ?></a></p>

<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?= lang('tab_all_nav_items') ?></a></li>
        <li role="presentation"><a href="#redirects" aria-controls="redirects" role="tab" data-toggle="tab"><?= lang('tab_nav_redirects') ?></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home">
            <p class="m-t-l"><?= lang('index_nav_desc') ?></p>
            <ul class="list-group m-t-l" id="sortable">
                <?php foreach ($navs as $nav): ?>
                    <li class="list-group-item" id="item-<?= $nav->id ?>">
                        <?= $nav->title ?> 
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        <a href="<?= base_url($nav->url) ?>" target="_blank" class="btn btn-default btn-xs">View</a> 
                        <a href="<?= base_url('admin_navigation/edit/' . $nav->id) ?>" class="btn btn-default btn-xs">Edit</a> 
                        <a href="<?= base_url('admin_navigation/remove_nav/' . $nav->id) ?>" class="btn btn-danger btn-xs">Delete</a> 

                        <i class="fa fa-bars pull-right" aria-hidden="true"></i>
                    </li>
                <?php endforeach ?>
            </ul>

            <script>
                $('#sortable').sortable({
                    axis: 'y',
                    update: function (event, ui) {
                        var data = $(this).sortable('serialize');
                        $.ajax({
                            data: data,
                            type: 'POST',
                            url: '<?= base_url("admin_navigation/update_nav_order") ?>'
                        });
                    }
                });
            </script>

        </div>
        <div role="tabpanel" class="tab-pane fade" id="redirects">
            <p class="m-t-l"><?= lang('index_redirect_desc') ?></p>

            <?php if ( ! $redirects ): ?>
            <h4 class="text-center"><?= lang('nav_no_redirects_found') ?></h4>
            <?php else: ?>
            <table class="table table-condensed">
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Type</th>
                    <th>HTTP Redirect Type</th>
                    <th></th>
                </tr>
                <?php foreach ($redirects as $redir): ?>
                    <tr>
                    <td><?= $redir->old_slug ?></td>
                    <td><?= $redir->new_slug ?></td>
                    <td><?= $redir->type ?></td>
                    <td><?= $redir->code ?></td>
                    <td class="text-right">
                        <a href="<?= site_url('admin_navigation/edit_redirect/' . $redir->id) ?>" class="btn btn-default btn-xs"><?= lang('redir_edit_btn') ?></a>
                        <a href="<?= site_url('admin_navigation/remove_redirect/' . $redir->id) ?>" class="btn btn-danger btn-xs"><?= lang('redir_remove_btn') ?></a>
                    </td>
                </tr>
              <?php endforeach ?>
            </table>

            <?php endif ?>
        </div>
    </div>

</div>