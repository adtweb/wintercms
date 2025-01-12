<?= Form::open([
    'data-request' => $this->getEventHandler('onMove'),
    'data-request-success' => "\$(this).trigger('close.oc.popup')",
    'data-stripe-load-indicator' => 1,
    'id' => 'asset-move-popup-form',
]) ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="popup">&times;</button>
        <h4 class="modal-title"><?= e(trans('cms::lang.asset.move_popup_title')) ?></h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label><?= e(trans('cms::lang.asset.move_destination')) ?></label>
            <select
                class="form-control custom-select"
                name="dest"
                data-placeholder="<?= e(trans('backend::lang.media.move_please_select')) ?>">
                <option></option>
                <?php foreach ($directories as $path => $directory) { ?>
                    <option value="<?= e($path) ?>"><?= e($directory) ?></option>
                <?php } ?>
            </select>
        </div>

        <input type="hidden" name="theme" value="<?= e($this->theme->getDirName()) ?>">
        <input type="hidden" name="selectedList" value="<?= e($selectedList) ?>">
    </div>
    <div class="modal-footer">
        <button
            type="submit"
            class="btn btn-primary">
            <?= e(trans('backend::lang.media.move_button')) ?>
        </button>
        <button
            type="button"
            class="btn btn-default"
            data-dismiss="popup">
            <?= e(trans('backend::lang.form.cancel')) ?>
        </button>
    </div>
<?= Form::close() ?>
