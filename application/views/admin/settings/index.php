<div>
    <p><?php echo lang('settings_help_txt'); ?></p>
    <!-- Nav tabs -->

    <div>
        <?= validation_errors() ?>
    </div>
    <?php if (isset($message)): ?>
    <div>
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
                <label for="<?= $item->name ?>" class="col-sm-2 control-label"><?= lang($item->name . '_label') ?></label>
                <div class="col-sm-10">
                    <span id="helpBlock" class="help-block"><?= lang($item->name . '_desc') ?></span>
                    <?= $item->input ?>
                    <hr>
                </div>
            </div>
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
