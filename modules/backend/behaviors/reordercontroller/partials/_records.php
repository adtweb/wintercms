<?php foreach ($records as $record) { ?>

    <li data-record-id="<?= $record->getKey() ?>"
        <?php if ($reorderSortMode === 'simple') { ?>
            data-record-sort-order="<?= $record->{$record->getSortOrderColumn()} ?>"
        <?php } ?>
    >
        <div class="record">
            <a href="javascript:;" class="move"></a>
            <span><?= e($this->reorderGetRecordName($record)) ?></span>
            <input name="record_ids[]" type="hidden" value="<?= $record->getKey() ?>" />
        </div>

        <?php if ($reorderShowTree) { ?>
            <ol>
                <?php if ($record->children) { ?>
                    <?= $this->reorderMakePartial('records', ['records' => $record->children]) ?>
                <?php } ?>
            </ol>
        <?php } ?>
    </li>

<?php } ?>
