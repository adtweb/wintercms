<div class="import-file-columns" id="importFileColumns">
    <?php if ($importFileColumns) { ?>
        <ul>
            <?php foreach ($importFileColumns as $index => $column) { ?>
                <li data-column-id="<?= $index ?>">
                    <div class="import-column-name">
                        <span>
                            <i class="column-success-icon text-success icon-check"></i>
                            <a
                                href="javascript:;"
                                class="column-ignore-button"
                                data-toggle="tooltip"
                                data-delay="300"
                                data-placement="right"
                                title="<?= e(trans('backend::lang.import_export.ignore_this_column')) ?>"
                                onclick="$.wn.importBehavior.ignoreFileColumn(this)"
                            >
                                <i class="icon-close"></i>
                            </a>
                            <a
                                href="javascript:;"
                                class="column-label"
                                onclick="$.wn.importBehavior.loadFileColumnSample(this)"
                            >
                                <?= e($column) ?>
                            </a>
                        </span>
                    </div>
                    <div class="import-column-bindings">
                        <ul data-empty-text="<?= e(trans('backend::lang.import_export.drop_column_here')) ?>"></ul>
                    </div>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p class="upload-prompt">
            <?= e(trans('backend::lang.import_export.upload_valid_csv')) ?>
        </p>
    <?php } ?>
</div>

<script>
    $.wn.importBehavior.bindColumnSorting()
</script>
