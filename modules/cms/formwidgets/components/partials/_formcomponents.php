<div class="control-componentlist bg-s">
    <?php foreach ($components as $component) { ?>
        <?php if ($component->isHidden) { ?>
            <?= $this->makePartial('component', ['component' => $component]) ?>
        <?php } ?>
    <?php } ?>

    <div class="components" data-control="toolbar">
        <div class="layout">
            <?php foreach ($components as $component) { ?>
                <?php if (! $component->isHidden) { ?>
                    <?= $this->makePartial('component', ['component' => $component]) ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
