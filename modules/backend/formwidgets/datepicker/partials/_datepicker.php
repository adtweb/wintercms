<?php if (! empty($error)) { ?>
    <p class="flash-message static error">
        <?= e($error); ?></p>
    </p>
<?php } ?>
<?php if ($this->previewMode) { ?>
    <div class="form-control"><?= Backend::dateTime($value, [
        'format' => $format,
        'formatAlias' => $formatAlias,
        'defaultValue' => $value,
    ]) ?></div>
<?php } else { ?>
    <div
        id="<?= $this->getId() ?>"
        class="field-datepicker"
        data-control="datepicker"
        data-mode="<?= $mode ?>"
        data-show-week-number="<?= $showWeekNumber ?>"
        <?php if ($formatMoment) { ?>
            data-format="<?= $formatMoment ?>"
        <?php } ?>
        <?php if ($minDate) { ?>
            data-min-date="<?= $minDate ?>"
        <?php } ?>
        <?php if ($maxDate) { ?>
            data-max-date="<?= $maxDate ?>"
        <?php } ?>
        <?php if ($yearRange) { ?>
            data-year-range="<?= $yearRange ?>"
        <?php } ?>
        <?php if ($firstDay) { ?>
            data-first-day="<?= $firstDay ?>"
        <?php } ?>
        <?php if ($ignoreTimezone) { ?>
            data-ignore-timezone
        <?php } ?>
    >

        <?php if ($mode == 'date') { ?>
            <?= $this->makePartial('picker_date') ?>
        <?php } elseif ($mode == 'datetime') { ?>
            <div class="row">
                <div class="col-md-7">
                    <?= $this->makePartial('picker_date') ?>
                </div>
                <div class="col-md-5">
                    <?= $this->makePartial('picker_time') ?>
                </div>
            </div>
        <?php } elseif ($mode == 'time') { ?>
            <?= $this->makePartial('picker_time') ?>
        <?php } ?>

        <!-- Data locker -->
        <input
            type="hidden"
            name="<?= $field->getName() ?>"
            id="<?= $field->getId() ?>"
            value="<?= e($value) ?>"
            data-datetime-value
            />

    </div>

<?php } ?>
