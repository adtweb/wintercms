<?php

namespace Backend\Models;

use BackendAuth;
use Winter\Storm\Auth\Models\Preferences as PreferencesBase;

/**
 * All preferences for the backend user
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class UserPreference extends PreferencesBase
{
    /**
     * @var string The database table used by the model.
     */
    protected $table = 'backend_user_preferences';

    public $timestamps = false;

    protected static $cache = [];

    /**
     * Checks for a supplied user or uses the default logged in. You should override this method.
     *
     * @param  mixed  $user  An optional back-end user object.
     * @return User object
     */
    public function resolveUser($user)
    {
        $user = BackendAuth::getUser();

        return $user;
    }
}
