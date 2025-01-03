<?php if (! $this->fatalError) { ?>

    <?php if ($hasUpdates) { ?>

        <div class="modal-body">
            <p>
                <strong><?= e(trans('system::lang.updates.found.label')) ?></strong>
                <?= e(trans('system::lang.updates.found.help')) ?>
            </p>

            <div class="control-updatelist">
                <div class="control-scrollbar" style="height:400px" data-control="scrollbar">
                    <?php if ($core) { ?>
                        <div class="update-item <?= $core['isImportant'] ? 'item-danger' : '' ?>">
                            <div class="item-header">
                                <?php if ($core['isImportant']) { ?>
                                    <div class="important-update form-group form-group-sm">
                                        <select
                                            name="core_action"
                                            class="form-control custom-select select-no-search"
                                            data-important-update-select>
                                            <option value="">-- <?= e(trans('system::lang.updates.important_action.empty')) ?> --</option>
                                            <option value="confirm"><?= e(trans('system::lang.updates.important_action.confirm')) ?></option>
                                        </select>
                                    </div>
                                <?php } ?>
                                <h5>
                                    <i class="icon-cube"></i>
                                    <?= e(trans('system::lang.system.name')) ?>
                                </h5>
                            </div>
                            <dl>
                                <?php foreach (array_get($core, 'updates', []) as $build => $description) { ?>
                                    <dt><?= e(trans('system::lang.updates.core_build', ['build' => $build])) ?></dt>
                                    <?php if (is_array($description)) { ?>
                                        <dd>
                                            <span class="important-update-label">
                                                <?= e(trans('system::lang.updates.important_action_required')) ?>
                                            </span>
                                            <?= e($description[0]) ?>
                                            <a href="<?= $description[1] ?>" target="_blank">
                                                <?= e(trans('system::lang.updates.important_view_release_notes')) ?>
                                                <i class="icon-external-link"></i>
                                            </a>
                                        </dd>
                                    <?php } else { ?>
                                        <dd><?= e($description) ?></dd>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($core['old_build']) { ?>
                                    <dt class="text-muted"><?= e(trans('system::lang.updates.core_build', ['build' => $core['old_build']])) ?></dt>
                                    <dd class="text-muted"><?= e(trans('system::lang.updates.core_current_build')) ?></dd>
                                <?php } ?>
                            </dl>
                            <input type="hidden" name="hash" value="<?= e($core['hash']) ?>" />
                            <input type="hidden" name="build" value="<?= e($core['build']) ?>" />
                        </div>
                    <?php } ?>

                    <?php foreach ($themeList as $code => $theme) { ?>
                        <div class="update-item">
                            <div class="item-header">
                                <h5>
                                    <i class="icon-picture-o"></i>
                                    <?= e(array_get($theme, 'name', 'Unknown')) ?>
                                </h5>
                            </div>
                            <dl>
                                <dt><?= e(array_get($theme, 'version', 'v1.0.0')) ?></dt>
                                <dd><?= e(trans('system::lang.updates.theme_new_install')) ?></dd>
                            </dl>

                            <input type="hidden" name="themes[<?= e($this->encodeCode($code)) ?>]" value="<?= e($theme['hash']) ?>" />
                        </div>
                    <?php } ?>

                    <?php foreach ($pluginList as $code => $plugin) { ?>
                        <div class="update-item <?= $plugin['isImportant'] ? 'item-danger' : '' ?>">
                            <div class="item-header">
                                <?php if ($plugin['isImportant']) { ?>
                                    <div class="important-update form-group form-group-sm">
                                        <select
                                            name="plugin_actions[<?= e($this->encodeCode($code)) ?>]"
                                            class="form-control custom-select select-no-search"
                                            data-important-update-select>
                                            <option value="">-- <?= e(trans('system::lang.updates.important_action.empty')) ?> --</option>
                                            <option value="confirm"><?= e(trans('system::lang.updates.important_action.confirm')) ?></option>
                                            <option value="skip"><?= e(trans('system::lang.updates.important_action.skip')) ?></option>
                                            <option value="ignore"><?= e(trans('system::lang.updates.important_action.ignore')) ?></option>
                                        </select>
                                    </div>
                                <?php } ?>
                                <h5>
                                    <i class="<?= e($plugin['icon'] ?: 'icon-puzzle-piece') ?>"></i>
                                    <?= e($plugin['name']) ?>
                                </h5>
                            </div>
                            <dl>
                                <?php if (! $plugin['old_version']) { ?>
                                    <dt>
                                        <?= $plugin['version'] ?>
                                    </dt>
                                    <dd>
                                        <?= e(trans('system::lang.updates.plugin_version_none')) ?>
                                    </dd>
                                <?php } else { ?>
                                    <?php foreach (array_get($plugin, 'updates', []) as $version => $description) { ?>
                                        <dt><?= e($version) ?></dt>
                                        <?php if (is_array($description)) { ?>
                                            <dd>
                                                <span class="important-update-label">
                                                    <?= e(trans('system::lang.updates.important_action_required')) ?>
                                                </span>
                                                <?= e($description[0]) ?>
                                                <a href="<?= $description[1] ?>" target="_blank">
                                                    <?= e(trans('system::lang.updates.important_view_guide')) ?>
                                                    <i class="icon-external-link"></i>
                                                </a>
                                            </dd>
                                        <?php } else { ?>
                                            <dd><?= e($description) ?></dd>
                                        <?php } ?>
                                    <?php } ?>

                                    <dt class="text-muted">
                                        <?= e($plugin['old_version']) ?>
                                    </dt>
                                    <dd class="text-muted">
                                        <?= e(trans('system::lang.updates.plugin_current_version')) ?>
                                    </dd>
                                <?php } ?>
                            </dl>

                            <input type="hidden" name="plugins[<?= e($this->encodeCode($code)) ?>]" value="<?= e($plugin['hash']) ?>" />
                        </div>
                    <?php } ?>

                </div>
            </div>

        </div>

        <div class="modal-footer">
            <?php if ($hasImportantUpdates) { ?>
                <p class="text-danger pull-left wn-icon-exclamation important-update-label" id="updateListImportantLabel">
                    <?= e(trans('system::lang.updates.important_alert_text')) ?>
                </p>
            <?php } ?>
            <button
                type="button"
                id="updateListUpdateButton"
                class="btn btn-primary"
                data-dismiss="popup"
                data-control="popup"
                data-handler="onApplyUpdates"
                data-keyboard="false">
                <?= e(trans('system::lang.updates.update_label')) ?>
            </button>
            <button
                type="button"
                class="btn btn-default"
                data-dismiss="popup">
                <?= e(trans('backend::lang.form.cancel')) ?>
            </button>
        </div>

    <?php } else { ?>

        <div class="modal-body">
            <p><?= e(trans('system::lang.updates.none.help')) ?></p>
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-default"
                data-dismiss="popup">
                <?= e(trans('backend::lang.form.close')) ?>
            </button>
            <button
                type="button"
                class="btn btn-primary"
                data-dismiss="popup"
                data-control="popup"
                data-handler="onForceUpdate"
                data-keyboard="false">
                <?= e(trans('system::lang.updates.force_label')) ?>
            </button>
        </div>

    <?php } ?>

<?php } else { ?>

    <div class="modal-body">
        <p class="flash-message static error"><?= e(trans($this->fatalError)) ?></p>
    </div>
    <div class="modal-footer">
        <button
            type="button"
            class="btn btn-default"
            data-dismiss="popup">
            <?= e(trans('backend::lang.form.close')) ?>
        </button>
    </div>

<?php } ?>
