
<?php if ($outsideTabs->hasFields()) { ?>
    <?= $this->makePartial('section', ['tabs' => $outsideTabs]) ?>
<?php } ?>

<?php if ($primaryTabs->hasFields()) { ?>
    <?= $this->makePartial('section', ['tabs' => $primaryTabs]) ?>
<?php } ?>

<?php if ($secondaryTabs->hasFields()) { ?>
    <?= $this->makePartial('section', ['tabs' => $secondaryTabs]) ?>
<?php } ?>