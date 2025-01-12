<?php $action = $record->is_frozen ? 'unfreeze' : 'freeze'; ?>
<label class="custom-switch" data-check="wn-freeze-<?= $record->id ?>" style="margin-bottom:0">
    <input data-request="onBulkAction"
        data-request-data="action: '<?= $action ?>', checked: [<?= $record->id ?>]"
        data-request-update="list_manage_toolbar: '#plugin-toolbar'"
        type="checkbox"
        name="freeze_<?= $record->id ?>"
        value="<?= ! $record->is_frozen ?>"
        <?php if (! $record->is_frozen) { ?>
            checked="checked"
        <?php } ?>
        data-stripe-load-indicator
    >

    <span>
        <span><?= e(trans('system::lang.plugins.check_yes')) ?></span>
        <span><?= e(trans('system::lang.plugins.check_no')) ?></span>
    </span>
    <a class="slide-button"></a>
</label>
