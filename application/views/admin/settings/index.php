<div>
    <p><?php echo lang('settings_help_txt'); ?></p>
    <!-- Nav tabs -->

    <div>
        <?= validation_errors() ?>
    </div>
    <?php if (isset($message)): ?>
    <div class="alert alert-warning" role="alert">
        <?= $message ?>
    </div>
    <?php endif ?>
    <ul class="nav nav-tabs" role="tablist">
        <?php $count = 0 ?>
        <?php foreach ($settings as $tab): ?>
        <li role="presentation"<?php if ($count == 0) echo ' class="active"' ?>><a href="#<?= $tab->tab ?>" aria-controls="<?= $tab->tab ?>" role="tab" data-toggle="tab"><?= ucfirst($tab->tab) ?></a></li>
        <?php $count++ ?>
        <?php endforeach ?>
    </ul>

    <!-- Tab panes -->
    <?= form_open() ?>
    <div class="tab-content">
        <?php $count = 0 ?>
        <?php foreach ($settings as $tab): ?>
        <div role="tabpanel" class="tab-pane fade<?php echo ($count == 0) ? ' in active': ''; ?>" id="<?= $tab->tab ?>">
            <?php foreach ($tab->list as $item): ?>
            <div class="form-group">
                <label for="<?= $item->name ?>" class="col-sm-8 control-label"><?= lang($item->name . '_label') ?>
                    <span id="helpBlock" class="help-block"><?= lang($item->name . '_desc') ?></span>
                </label>

                <div class="col-sm-4">
                    <p><?= $item->input ?></p>
                </div>
            </div>
            <hr><p class="settingshr">&nbsp;</p>
            <?php if ($item->field_type == 'radio' || $item->field_type == 'checkbox'): ?>
                <script type="text/javascript">
                    var options = {
                        onText: "<?= lang('yes') ?>",
                        offText: "<?= lang('no') ?>",
                        onColor: 'success',
                    };
                    $("[name='<?= $item->name ?>']").bootstrapSwitch(options);
                </script>
            <?php endif ?>

            <?php endforeach ?>

        </div>
    <?php $count++ ?>
    <?php endforeach ?>
    </div>
    <div class="text-right">
        <input type="submit" class="btn btn-default" value="<?= lang('save_settings') ?>">
    </div>
    <?= form_close() ?>
</div>
