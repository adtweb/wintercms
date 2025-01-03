<!-- Checkbox -->
<div class="checkbox custom-checkbox" tabindex="0">
    <input
        type="hidden"
        name="<?= $field->getName() ?>"
        value="0"
        <?= $this->previewMode ? 'disabled="disabled"' : '' ?>>
    <input
        type="checkbox"
        id="<?= $field->getId() ?>"
        name="<?= $field->getName() ?>"
        value="1"
        <?= $this->previewMode ? 'disabled="disabled"' : '' ?>
        <?= $field->isSelected() ? 'checked="checked"' : '' ?>
        <?= $field->getAttributes() ?>>

    <label for="<?= $field->getId() ?>">
        <?= e(trans($field->label)) ?>
    </label>
    <?php if ($field->comment) { ?>
        <p class="help-block"><?= $field->commentHtml ? trans($field->comment) : e(trans($field->comment)) ?></p>
    <?php } ?>
</div>
