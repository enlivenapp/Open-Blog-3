<h2><?= lang('links_hdr') ?></h2>

<table class="table table-condensed">
    <tr>
        <th>Name</th>
        <th>URL</th>
        <th>target</th>
        <th>Description</th>
        <th>Visible</th>
        <th>Order</th>
        <th></th>
    </tr>
    <?php foreach ($links as $link): ?>
        <tr>
        <td><?= $link->name ?></td>
        <td><a href="<?= $link->url ?>" target="_blank"><?= $link->url ?></a></td>
        <td><?= $link->target ?></td>
        <td><?= $link->description ?></td>
        <td><?= $link->visible ?></td>
        <td><?= $link->position ?></td>
        <td>
            <a href="<?= site_url('admin/admin_links/edit_link' . $link->id) ?>" class="btn btn-default btn-xs"><?= lang('link_edit_btn') ?></a>
            <a href="<?= site_url('admin/admin_links/remove_link' . $link->id) ?>" class="btn btn-danger btn-xs"><?= lang('link_remove_btn') ?></a>
        </td>
    </tr>
  <?php endforeach ?>
</table>
