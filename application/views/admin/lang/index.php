<h2><?= lang('languages_hdr') ?></h2>
<p><?= lang('languages_hdr_help_txt') ?></p>

<table class="table table-condensed">
    <tr>
        <th><?= lang('languages_table_lang_h') ?></th>
        <th><?= lang('languages_table_abbr_h') ?></th>
        <th><?= lang('languages_table_is_default_h') ?></th>
        <th><?= lang('languages_table_enabled_h') ?></th>
        <th></th>
    </tr>
    <?php foreach ($langs as $item): ?>
        <tr>
        <td><?= ucfirst($item['language']) ?></td>
        <td><?= $item['abbreviation'] ?></td>
        <td><?php echo ($item['is_default'] == '1') ? lang('yes') : lang('no'); ?></td>
        <td><?php echo ($item['is_avail'] == '1') ? lang('yes') : lang('no'); ?></td>
        <td class="text-right">
            <?php if ($item['is_default'] == '0'): ?>
                <a href="<?= site_url('admin_lang/make_default/' . $item['id']) ?>" class="btn btn-default btn-xs"><?= lang('languages_make_default_btn') ?></a>
            <?php endif ?>
            <?php if ($item['is_avail'] == '1'): ?>
                <?php if ($item['is_default'] == '0'): ?>
                <a href="<?= site_url('admin_lang/disable/' . $item['id']) ?>" class="btn btn-default btn-xs"><?= lang('languages_disable_btn') ?></a>
                <?php endif ?>
            <?php else: ?>
                <a href="<?= site_url('admin_lang/enable/' . $item['id']) ?>" class="btn btn-default btn-xs"><?= lang('languages_enable_btn') ?></a>
            <?php endif ?>

            
            
            
        </td>
    </tr>
  <?php endforeach ?>
</table>
<p><?= lang('languages_help_text') ?></p>






