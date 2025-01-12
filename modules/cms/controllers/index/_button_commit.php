<button
    type="button"
    class="
        btn btn-danger wn-icon-download
        <?php if (! $canCommit) { ?>
            hide
        <?php } ?>
    "
    data-request="onCommit"
    data-request-confirm="<?= e(trans('cms::lang.editor.commit_confirm')) ?>"
    data-load-indicator="<?= e(trans('cms::lang.editor.committing')) ?>"
    data-control="commit-button">
    <?= e(trans('cms::lang.editor.commit')) ?>
</button>
