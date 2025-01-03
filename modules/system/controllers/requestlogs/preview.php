<?php Block::put('breadcrumb') ?>
    <ul>
        <li><a href="<?= Backend::url('system/requestlogs') ?>"><?= e(trans('system::lang.request_log.menu_label')) ?></a></li>
        <li><?= e(trans($this->pageTitle)) ?></li>
    </ul>
<?php Block::endPut() ?>

<?php if (! $this->fatalError) { ?>

    <div class="scoreboard">
        <div data-control="toolbar">
            <div class="scoreboard-item title-value">
                <h4><?= e(trans('system::lang.request_log.id_label')) ?></h4>
                <p>#<?= $formModel->id ?></p>
            </div>
            <div class="scoreboard-item title-value">
                <h4><?= e(trans('system::lang.request_log.status_code')) ?></h4>
                <p><?= $formModel->status_code ?></p>
            </div>
            <div class="scoreboard-item title-value">
                <h4><?= e(trans('system::lang.request_log.count')) ?></h4>
                <p><?= $formModel->count ?></p>
            </div>
            <div class="scoreboard-item title-value">
                <h4><?= e(trans('system::lang.request_log.referer')) ?></h4>
                <p><?= $formModel->referer ? count($formModel->referer) : 0 ?></p>
            </div>
        </div>
    </div>

    <div class="layout-item stretch layout-column">
        <?= $this->formRenderPreview() ?>
    </div>

<?php } else { ?>

    <p class="flash-message static error"><?= e(trans($this->fatalError)) ?></p>

<?php } ?>

<p>
    <a href="<?= Backend::url('system/requestlogs') ?>" class="btn btn-default wn-icon-chevron-left">
        <?= e(trans('system::lang.request_log.return_link')) ?>
    </a>
</p>
