<?php if ($this->previewMode) { ?>
    <div class="form-control"><?= Markdown::parse(e($value)) ?></div>
<?php } else { ?>
    <div
        id="<?= $this->getId() ?>"
        class="
            field-markdowneditor
            size-<?= $size ?>
            <?php if ($stretch) { ?>
                layout-relative stretch
            <?php } ?>
            <?php if ($readOnly || $disabled) { ?>
                disabled
            <?php } ?>
        "
        data-control="markdowneditor"
        data-refresh-handler="<?= $this->getEventHandler('onRefresh') ?>"
        data-view-mode="<?= $mode ?>"
        <?php if ($useMediaManager) { ?>
            data-use-media-manager="true"
        <?php } ?>
        data-vendor-path="<?= Url::asset('/modules/backend/formwidgets/codeeditor/assets/vendor/ace') ?>"
        <?php if ($readOnly || $disabled) { ?>
            data-disabled="true"
        <?php } ?>
        <?= $this->formField->getAttributes() ?>>

        <div class="control-toolbar editor-toolbar"></div>

        <div class="editor-write layout-cell">
            <textarea name="<?= $name ?>" id="<?= $this->getId('textarea') ?>"><?= e($value) ?></textarea>
        </div>

        <div class="editor-preview layout-cell"></div>

    </div>
<?php } ?>
