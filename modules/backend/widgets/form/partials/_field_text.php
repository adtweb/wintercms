<!-- Text -->
<?php if ($this->previewMode) { ?>
    <span class="form-control"><?= $field->value ? e($field->value) : '&nbsp;' ?></span>
<?php } else { ?>
    <input
        type="text"
        name="<?= $field->getName() ?>"
        id="<?= $field->getId() ?>"
        value="<?= e($field->value) ?>"
        placeholder="<?= e(trans($field->placeholder)) ?>"
        class="form-control"
        autocomplete="off"
        <?= $field->getAttributes() ?>
    />
<?php } ?>
