<?php
$groupCode = $useGroups ? $this->getGroupCodeFromIndex($indexValue) : '';
$itemTitle = $useGroups ? $this->getGroupTitle($groupCode) : null;
?>
<li
    <?= $itemTitle ? 'data-collapse-title="'.e(trans($itemTitle)).'"' : '' ?>
    class="field-repeater-item"
    <?php if ($mode === 'grid') { ?>
    style="min-height: <?= $rowHeight ?>px"
    <?php } ?>
>

    <?php if (! $this->previewMode) { ?>
        <?php if ($sortable) { ?>
            <div class="repeater-item-handle <?= $this->getId('items') ?>-handle">
                <i class="icon-bars"></i>
            </div>
        <?php } ?>

        <div class="repeater-item-remove">
            <button
                type="button"
                class="close"
                aria-label="Remove"
                data-repeater-remove
                data-request="<?= $this->getEventHandler('onRemoveItem') ?>"
                data-request-data="'_repeater_index': '<?= $indexValue ?>', '_repeater_group': '<?= $groupCode ?>'"
                data-request-confirm="<?= e(trans('backend::lang.form.action_confirm')) ?>">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <?php if ($mode !== 'grid') { ?>
    <div class="repeater-item-collapse">
        <a href="javascript:;" class="repeater-item-collapse-one">
            <i class="icon-chevron-up"></i>
        </a>
    </div>

    <div class="repeater-item-collapsed-title"></div>
    <?php } ?>

    <div class="field-repeater-form"
         data-control="formwidget"
         data-refresh-handler="<?= $this->getEventHandler('onRefresh') ?>"
         data-refresh-data="'_repeater_index': '<?= $indexValue ?>', '_repeater_group': '<?= $groupCode ?>'">
        <?php foreach ($widget->getFields() as $field) { ?>
            <?= $widget->renderField($field) ?>
        <?php } ?>
        <?php if ($useGroups) { ?>
            <input type="hidden" name="<?= $widget->arrayName ?>[_group]" value="<?= $groupCode ?>" />
        <?php } ?>
    </div>

</li>
