<?= Form::ajax($this->getEventHandler('onApplyName'), [
    'success' => "\$el.trigger('close.oc.popup');",
    'data-stripe-load-indicator' => 1,
    'id' => 'asset-rename-popup-form',
]) ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="popup">&times;</button>
        <h4 class="modal-title"><?= e(trans('backend::lang.media.rename_popup_title')) ?></h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label><?= e(trans('backend::lang.media.rename_new_name')) ?></label>
            <input
                type="text"
                name="name"
                value="<?= e($name) ?>"
                class="form-control"
                autocomplete="off" />
        </div>

        <input type="hidden" name="originalPath" value="<?= e($originalPath) ?>" />
        <input type="hidden" name="theme" value="<?= e($this->theme->getDirName()) ?>" />
    </div>
    <div class="modal-footer">
        <button
            type="submit"
            class="btn btn-primary">
            <?= e(trans('backend::lang.form.apply')) ?>
        </button>
        <button
            type="button"
            class="btn btn-default"
            data-dismiss="popup">
            <?= e(trans('backend::lang.form.cancel')) ?>
        </button>
    </div>
    <script>
        setTimeout(
            function(){ $('#asset-rename-popup-form input.form-control').focus() },
            310
        )
    </script>
<?= Form::close() ?>
