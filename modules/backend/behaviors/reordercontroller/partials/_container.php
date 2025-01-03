<?php if ($reorderToolbarWidget) { ?>
    <!-- Reorder Toolbar -->
    <div id="<?= $this->getId('reorderToolbar') ?>" class="reorder-toolbar">
        <?= $reorderToolbarWidget->render() ?>
    </div>
<?php } ?>

<!-- Reorder List -->
<?= Form::open() ?>
    <div
        id="reorderTreeList"
        class="control-treelist"
        data-control="treelist"
        <?= $reorderShowTree ? '' : 'data-nested="0"' ?>
        data-handle="<?= $reorderShowTree ? 'a.move' : '> li > .record > a.move' ?>"
        data-stripe-load-indicator>
        <?php if ($reorderRecords) { ?>
            <ol id="reorderRecords">
                <?= $this->reorderMakePartial('records', ['records' => $reorderRecords]) ?>
            </ol>
        <?php } else { ?>
            <p><?= Lang::get('backend::lang.reorder.no_records') ?></p>
        <?php } ?>
    </div>
<?= Form::close() ?>

<script>
    $.wn.reorderBehavior.initSorting('<?= $reorderSortMode ?>')
</script>
