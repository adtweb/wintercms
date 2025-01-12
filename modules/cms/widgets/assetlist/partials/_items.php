<?php
$searchMode = $this->isSearchMode();

if (($upPath = $this->getUpPath()) !== null && ! $searchMode) {
    ?>
    <p class="parent">
        <a href="<?= $upPath ?>" data-path="<?= $upPath ?>" class="link"><?= $this->getCurrentRelativePath() ?></a>
    </p>
<?php } ?>
<div class="list-container animate">
    <?php if ($items) { ?>
        <ul class="list">
            <?php foreach ($items as $item) {
                $dataId = 'asset-'.$this->theme->getDirName().'-'.ltrim($item->path, '/');
                ?>
                <li
                    class="<?= $item->type ?>"
                    <?php if ($item->editable) { ?>
                        data-editable
                    <?php } ?>
                    data-item-path="<?= e(ltrim($item->path, '/')) ?>"
                    data-item-theme="<?= e($this->theme->getDirName()) ?>"
                    data-item-type="asset" data-id="<?= e($dataId) ?>"
                >
                    <a class="link" target="_blank" data-path="<?= $item->path ?>" href="<?= $this->getThemeFileUrl($item->path) ?>">
                        <?= e($item->name) ?>

                        <?php if ($searchMode) { ?>
                            <span class="description">
                                <?= e(dirname($item->path)) ?>
                            </span>
                        <?php } ?>
                    </a>

                    <div class="controls">
                        <a
                            href="javascript:;"
                            class="control icon btn-primary wn-icon-terminal"
                            title="<?= e(trans('cms::lang.asset.rename')) ?>"
                            data-control="popup"
                            data-request-data="renamePath: '<?= e($item->path) ?>'"
                            data-handler="<?= $this->getEventHandler('onLoadRenamePopup') ?>"
                        ><?= e(trans('cms::lang.asset.rename')) ?></a>
                    </div>

                    <input type="hidden" name="file[<?= e($item->path) ?>]" value="0"/>
                    <div class="checkbox custom-checkbox nolabel">
                        <?php $cbId = 'cb'.md5($item->path) ?>
                        <input
                            id="<?= $cbId ?>"
                            type="checkbox"
                            name="file[<?= e($item->path) ?>]"
                            <?= $this->isItemSelected($item->path) ? 'checked' : null ?>
                            data-request="<?= $this->getEventHandler('onSelect') ?>"
                            value="1">
                        <label for="<?= $cbId ?>"><?= e(trans('cms::lang.asset.select')) ?></label>
                    </div>

                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p class="no-data"><?= e(trans($this->noRecordsMessage)) ?></p>
    <?php } ?>
</div>

<?php if (! isset($nested)) { ?>
    <input type="hidden" name="theme" value="<?= e($this->theme->getDirName()) ?>">
<?php } ?>
