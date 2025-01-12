<button
    type="button"
    class="
        btn btn-danger wn-icon-bomb
        <?php if (! $canReset) { ?>
            hide
        <?php } ?>
    "
    data-request="onReset"
    data-request-confirm="<?= e(trans('cms::lang.editor.reset_confirm')) ?>"
    data-load-indicator="<?= e(trans('cms::lang.editor.resetting')) ?>"
    data-control="reset-button">
    <?= e(trans('cms::lang.editor.reset')) ?>
</button>
