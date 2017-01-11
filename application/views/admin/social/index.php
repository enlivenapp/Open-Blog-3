<h2><?= lang('social_hdr') ?></h2>
<p><?= lang('social_hdr_help_txt') ?></p>
<p><a class="btn btn-default btn-sm" href="<?php echo site_url('admin_social/add') ?>"><?php echo lang('social_add_new') ?></a></p>

<table class="table table-condensed">
    <tr>
        <th>Name</th>
        <th>URL</th>
        <th>Enabled</th>
        <th></th>
    </tr>
    <?php foreach ($social as $item): ?>
        <tr>
        <td><?= $item['name'] ?></td>
        <td><a href="<?= $item['url'] ?>" target="_blank"><?= $item['url'] ?></a></td>
        <td><?php echo ($item['enabled'] == '1') ? lang('yes') : lang('no'); ?></td>
        <td class="text-right">
            <a href="<?= site_url('admin_social/edit/' . $item['id']) ?>" class="btn btn-default btn-xs"><?= lang('social_edit_btn') ?></a>
            <a href="<?= site_url('admin_social/remove/' . $item['id']) ?>" class="btn btn-danger btn-xs"><?= lang('social_remove_btn') ?></a>
        </td>
    </tr>
  <?php endforeach ?>
</table>
