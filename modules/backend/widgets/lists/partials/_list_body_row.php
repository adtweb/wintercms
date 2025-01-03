<?php
$expanded = $showTree ? $this->isTreeNodeExpanded($record) : null;
$childRecords = $showTree ? $record->getChildren() : null;
$treeLevelClass = $showTree ? 'list-tree-level-'.$treeLevel : '';
?>
<tr class="<?= $treeLevelClass ?> <?= $this->getRowClass($record) ?>">
    <?php if ($showCheckboxes) { ?>
        <?= $this->makePartial('list_body_checkbox', ['record' => $record]) ?>
    <?php } ?>

    <?php if ($showTree) { ?>
        <?= $this->makePartial('list_body_tree', [
            'record' => $record,
            'expanded' => $expanded,
            'childCount' => $record->getChildCount(),
        ]) ?>
    <?php } ?>

    <?php $index = $url = 0;
foreach ($columns as $key => $column) { ?>
        <?php $index++; ?>
        <td class="list-cell-index-<?= $index ?> list-cell-name-<?= $column->getName() ?> list-cell-type-<?= $column->type ?> <?= $column->clickable ? '' : 'nolink' ?> <?= $column->getAlignClass() ?> <?= $column->cssClass ?>">
            <?php if ($column->clickable && ! $url && ($url = $this->getRecordUrl($record))) { ?>
                <a <?= $this->getRecordOnClick($record) ?> href="<?= $url ?>">
                    <?= $this->getColumnValue($record, $column) ?>
                </a>
            <?php } else { ?>
                <?= $this->getColumnValue($record, $column) ?>
            <?php } ?>
        </td>
    <?php } ?>

    <?php if ($showSetup) { ?>
        <td class="list-setup">&nbsp;</td>
    <?php } ?>
</tr>

<?php if ($showTree && $expanded) { ?>
    <?= $this->makePartial('list_body_rows', ['records' => $childRecords, 'treeLevel' => $treeLevel + 1]) ?>
<?php } ?>
