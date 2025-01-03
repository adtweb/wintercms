<?php
$fieldOptions = $field->options();
$useSearch = $field->getConfig('showSearch', true);
$emptyOption = $field->getConfig('emptyOption', $field->placeholder);
$allowCustom = $field->getConfig('allowCustom', false);
?>

<!-- Dropdown -->
<?php if ($this->previewMode || $field->readOnly) { ?>
    <div class="form-control" <?= $field->readOnly ? 'disabled="disabled"' : ''; ?>>
        <?= (isset($fieldOptions[$field->value])) ? e(trans($fieldOptions[$field->value])) : '' ?>
    </div>
    <input type="hidden" name="<?= $field->getName() ?>" value="<?= $field->value ?>">
<?php } else { ?>
    <select
        id="<?= $field->getId() ?>"
        name="<?= $field->getName() ?>"
        class="form-control custom-select <?= $useSearch ? '' : 'select-no-search' ?> <?= $allowCustom ? 'select-modifiable' : '' ?>"
        <?= $field->getAttributes() ?>
        <?= $field->placeholder ? 'data-placeholder="'.e(trans($field->placeholder)).'"' : '' ?>
        >
        <?php if ($emptyOption) { ?>
            <option value=""><?= e(trans($emptyOption)) ?></option>
        <?php } ?>
        <?php foreach ($fieldOptions as $value => $option) { ?>
            <?php
            if (! is_array($option)) {
                $option = [$option];
            }
            ?>
            <option
                <?= $field->isSelected($value) ? 'selected="selected"' : '' ?>
                <?php if (isset($option[1])) { ?>
                    data-<?= strpos($option[1], '.') ? 'image' : 'icon' ?>="<?= $option[1] ?>"
                <?php } ?>
                value="<?= e($value) ?>"
            ><?= e(trans($option[0])) ?></option>
        <?php } ?>
    </select>
<?php } ?>
