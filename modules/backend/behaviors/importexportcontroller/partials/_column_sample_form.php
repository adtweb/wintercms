<div class="modal-header">
    <button type="button" class="close" data-dismiss="popup">&times;</button>
    <h4 class="modal-title"><?= e(trans('backend::lang.import_export.column_preview')) ?></h4>
</div>
<div class="modal-body">
    <p>
        <?= e(trans('backend::lang.import_export.column')) ?>:
        <strong><?= $columnName ?></strong>
    </p>
    <div class="list-preview">
        <div class="control-simplelist is-divided is-scrollable size-small" data-control="simplelist">
            <ul>
                <?php foreach ($columnData as $sample) { ?>
                    <li class="wn-icon-file-o">
                        <?= e($sample) ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button
        type="button"
        class="btn btn-default"
        data-dismiss="popup">
        <?= e(trans('backend::lang.form.close')) ?>
    </button>
</div>
