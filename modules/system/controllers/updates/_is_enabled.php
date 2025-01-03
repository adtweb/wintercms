<?php $action = $record->is_disabled ? 'enable' : 'disable'; ?>
<label class="custom-switch" data-check="wn-disable-<?= $record->id ?>" style="margin-bottom:0">
    <input data-request="onBulkAction"
        data-request-data="action: '<?= $action ?>', checked: [<?= $record->id ?>]"
        data-request-update="list_manage_toolbar: '#plugin-toolbar'"
        type="checkbox"
        name="disable_<?= $record->id ?>"
        value="<?= ! $record->is_disabled ?>"
        <?php if (! $record->is_disabled) { ?>
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
