<div class="layout-row min-size">
    <div class="control-toolbar toolbar-padded">
        <div class="toolbar-item toolbar-primary">
            <div data-control="toolbar">
                <?php if (! $this->readOnly) { ?>
                    <div class="btn-group offset-right">
                        <button type="button" class="btn btn-primary wn-icon-upload" data-control="upload"><?= e(trans('backend::lang.media.upload')) ?></button>
                        <button type="button" class="btn btn-primary wn-icon-folder" data-command="create-folder"><?= e(trans('backend::lang.media.add_folder')) ?></button>
                    </div>
                <?php } ?>

                <button type="button" class="btn btn-default wn-icon-refresh empty offset-right" data-command="refresh"></button>

                <?php if (! $this->readOnly) { ?>
                    <div class="btn-group offset-right">
                        <button type="button" class="btn btn-default wn-icon-reply-all" data-command="move"><?= e(trans('backend::lang.media.move')) ?></button>
                        <button type="button" class="btn btn-default wn-icon-trash" data-command="delete"><?= e(trans('backend::lang.media.delete')) ?></button>
                    </div>
                <?php } ?>

                <div class="btn-group offset-right" id="<?= $this->getId('view-mode-buttons') ?>">
                    <?= $this->makePartial('view-mode-buttons') ?>
                </div>
            </div>
        </div>
        <div class="toolbar-item" data-calculate-width>
            <div class="relative loading-indicator-container size-input-text">
                <input
                    type="text"
                    name="search"
                    value="<?= e($searchTerm) ?>"
                    class="form-control icon search growable"
                    placeholder="<?= e(trans('backend::lang.media.search')) ?>"
                    data-control="search"
                    autocomplete="off"
                    data-load-indicator
                    data-load-indicator-opaque
                />
            </div>
        </div>
    </div>
</div>
