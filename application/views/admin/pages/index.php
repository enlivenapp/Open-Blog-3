<h2><?= lang('pages_hdr') ?></h2>

<p><a class="btn btn-default btn-sm" href="<?php echo site_url('admin_pages/add_page') ?>"><?php echo lang('index_add_new_page') ?></a></p>

<table class="table table-condensed">
    <tr>
        <th>Title</th>
        <th>Date Created</th>
        <th>Status</th>
        <th></th>
    </tr>
    <?php foreach ($pages as $page): ?>
        <tr>
        <td><?= $page->title ?></td>
        <td><?= $page->date ?></td>
        <td><?= $page->status ?></td>
        <td class="text-right">
            <a href="<?= site_url('admin_pages/edit_page/' . $page->id) ?>" class="btn btn-default btn-xs"><?= lang('page_edit_btn') ?></a>
            <a href="<?= site_url('admin_pages/remove_page/' . $page->id) ?>" class="btn btn-danger btn-xs"><?= lang('page_remove_btn') ?></a>
        </td>
    </tr>
  <?php endforeach ?>
</table>
