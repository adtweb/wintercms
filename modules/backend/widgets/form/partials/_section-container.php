<div
    data-control="formwidget"
    data-refresh-handler="<?= $this->getEventHandler('onRefresh') ?>"
    class="layout-row"
    role="form"
    id="<?= $this->getId($renderSection.'Container') ?>">

    <?php if ($renderSection == 'outside') { ?>
        <?= $this->makePartial('section', ['tabs' => $outsideTabs]) ?>
    <?php } ?>

    <?php if ($renderSection == 'primary') { ?>
        <?= $this->makePartial('section', ['tabs' => $primaryTabs]) ?>
    <?php } ?>

    <?php if ($renderSection == 'secondary') { ?>
        <?= $this->makePartial('section', ['tabs' => $secondaryTabs]) ?>
    <?php } ?>

</div>