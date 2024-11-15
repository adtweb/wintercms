<?php if (! $field->hidden) { ?>

    <?php if (! $this->showFieldLabels($field)) { ?>

        <?= $this->renderFieldElement($field) ?>

    <?php } else { ?>
        <?php
            $fieldComment = $field->commentHtml ? trans($field->comment) : e(trans($field->comment));
        ?>

        <?php if ($field->label) { ?>
            <label for="<?= $field->getId() ?>">
                <?= e(trans($field->label)) ?>
            </label>
        <?php } ?>

        <?php if ($field->comment && $field->commentPosition == 'above') { ?>
            <p class="help-block before-field"><?= $fieldComment ?></p>
        <?php } ?>

        <?= $this->renderFieldElement($field) ?>

        <?php if ($field->comment && $field->commentPosition == 'below') { ?>
            <p class="help-block"><?= $fieldComment ?></p>
        <?php } ?>

    <?php } ?>

<?php } ?>