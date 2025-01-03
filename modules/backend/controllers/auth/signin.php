<h2><?= e(Backend\Models\BrandSetting::get('app_tagline')) ?></h2>

<?= Form::open() ?>
    <input type="hidden" name="postback" value="1" />

    <div class="form-elements" role="form">
        <div class="form-group text-field horizontal-form">

            <!-- Login -->
            <input
                type="text"
                name="login"
                value="<?= e(post('login')) ?>"
                class="form-control icon user"
                placeholder="<?= e(trans('backend::lang.account.login_placeholder')) ?>"
                autocomplete="off"
                maxlength="255" />

            <!-- Password -->
            <input
                type="password"
                name="password"
                value=""
                class="form-control icon lock"
                placeholder="<?= e(trans('backend::lang.account.password_placeholder')) ?>"
                autocomplete="off"
                maxlength="255" />

            <!-- Submit Login -->
            <button type="submit" class="btn btn-primary login-button">
                <?= e(trans('backend::lang.account.login')) ?>
            </button>
        </div>

        <?php if (is_null(config('cms.backendForceRemember', true))) { ?>
            <!-- Remember checkbox -->
            <div class="form-group checkbox-field horizontal-form remember">
                <div class="checkbox custom-checkbox">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember" />
                    <label for="remember">
                        <?= e(trans('backend::lang.account.remember_me')) ?>
                    </label>
                </div>
            </div>
        <?php } ?>

        <p class="wn-icon-lock pull-right forgot-password">
            <!-- Forgot your password? -->
            <a href="<?= Backend::url('backend/auth/restore') ?>" class="text-muted">
                <?= e(trans('backend::lang.account.forgot_password')) ?>
            </a>
        </p>

    </div>
<?= Form::close() ?>

<?= $this->fireViewEvent('backend.auth.extendSigninView') ?>
