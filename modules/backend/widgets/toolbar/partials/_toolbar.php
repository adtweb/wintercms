<?php if ($controlPanel || $search) { ?>
<div class="toolbar-widget <?= $cssClasses ?>" id="<?= $this->getId() ?>">
    <div class="control-toolbar">

    <?php if ($controlPanel) { ?>
        <!-- Control Panel -->
        <div class="toolbar-item toolbar-primary">
            <?= ($controlPanel) ?>
        </div>
    <?php } ?>

    <?php if ($search) { ?>
        <!-- List Search -->
        <div class="toolbar-item" data-calculate-width>
            <?= $search ?>
        </div>
    <?php } ?>

    </div>
</div>
<?php } ?>
