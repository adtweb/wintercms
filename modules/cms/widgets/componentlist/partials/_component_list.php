<div class="components subitems">
    <div class="layout">
        <div class="layout-row">
            <?php
                $count = count($components);
            ?>
            <?php foreach ($components as $index => $component) { ?>
                <?php if ($index > 0 && ($index % 2) == 0) { ?>
                    </div>

                    <?php if ($index == ($count - 1)) { ?>
                        </div>
                        <div class="layout single">
                    <?php } ?>

                    <div class="layout-row">
                <?php } ?>
                <div class="layout-cell" data-control="dragcomponent" data-component>
                    <div class="layout-relative">
                        <span class="name"><?= e($component->title) ?></span>
                        <span class="description"><?= e($component->description) ?></span>
                        <span class="alias wn-icon-code"><?= e($component->alias) ?></span>

                        <input type="hidden" name="component_properties[]" data-inspector-values value="<?= e($component->propertyValues) ?>">
                        <input type="hidden" data-inspector-config value="<?= e($component->propertyConfig) ?>">
                        <input type="hidden" data-inspector-class value="<?= $component->className ?>">
                        <input type="hidden" data-component-icon value="<?= 'wn-'.e($component->pluginIcon) ?>">
                        <input type="hidden" data-component-default-alias value="<?= e($component->alias) ?>">
                        <input type="hidden" data-component-name value="<?= e($component->name) ?>">
                        <input type="hidden" name="component_names[]" value="">
                        <input type="hidden" name="component_aliases[]" value="">

                        <a href="#" class="remove">&times;</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>