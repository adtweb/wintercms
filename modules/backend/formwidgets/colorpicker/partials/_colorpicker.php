<div
    id="<?= $this->getId() ?>"
    class="
        field-colorpicker
        <?php if ($readOnly || $disabled || $this->previewMode) { ?>
            disabled
        <?php } ?>
    "
    data-control="colorpicker"
    data-formats="<?= e(json_encode($formats)) ?>"
    data-available-colors="<?= e(json_encode($availableColors)) ?>"
    data-data-locker="#<?= $this->getId('input') ?>"
    <?php if ($showAlpha) { ?>
        data-show-alpha="<?= $showAlpha ?>"
    <?php } ?>
    <?php if ($allowEmpty) { ?>
        data-allow-empty="<?= $allowEmpty ?>"
    <?php } ?>
    <?php if ($allowCustom) { ?>
        data-allow-custom="<?= $allowCustom ?>"
    <?php } ?>
    <?php if ($readOnly || $disabled || $this->previewMode) { ?>
        data-disabled="true"
    <?php } ?>
    <?= $this->formField->getAttributes() ?>
>

    <div class="colorpicker-container">
        <?php if ($readOnly || ! $allowCustom || $this->previewMode) { ?>
            <span
                data-color-value
                class="form-control"
            >
                <?= e($value); ?>
            </span>
        <?php } else { ?>
            <input
                data-color-value
                class="form-control"
                placeholder="No color"
                value="<?= e($value); ?>"
                <?php if ($disabled) { ?>
                    disabled
                <?php } ?>
            >
        <?php } ?>
        <div
            data-color-preview
        ></div>
    </div>

    <input
        type="hidden"
        id="<?= $this->getId('input') ?>"
        name="<?= $name ?>"
        value="<?= e($value) ?>" />
</div>
