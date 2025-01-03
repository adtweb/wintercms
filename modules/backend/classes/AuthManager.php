<?php

namespace Backend\Classes;

use Config;
use System\Classes\PluginManager;
use Winter\Storm\Auth\Manager as StormAuthManager;
use Winter\Storm\Exception\SystemException;

/**
 * Back-end authentication manager.
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class AuthManager extends StormAuthManager
{
    protected static $instance;

    protected $sessionKey = 'admin_auth';

    protected $userModel = 'Backend\Models\User';

    protected $groupModel = 'Backend\Models\UserGroup';

    protected $throttleModel = 'Backend\Models\UserThrottle';

    protected $requireActivation = false;

    //
    // Permission management
    //

    protected static $permissionDefaults = [
        'code' => null,
        'label' => null,
        'comment' => null,
        'roles' => null,
        'order' => 500,
    ];

    /**
     * @var array Cache of registration callbacks.
     */
    protected $callbacks = [];

    /**
     * @var array List of registered permissions.
     */
    protected $permissions = [];

    /**
     * @var array List of owner aliases. ['Aliased.Owner' => 'Real.Owner']
     */
    protected $aliases = [];

    /**
     * @var array List of registered permission roles.
     */
    protected $permissionRoles = false;

    /**
     * @var array Cache of registered permissions.
     */
    protected $permissionCache = false;

    protected function init()
    {
        $this->useThrottle = Config::get('auth.throttle.enabled', true);
        parent::init();
    }

    /**
     * Registers a callback function that defines authentication permissions.
     * The callback function should register permissions by calling the manager's
     * registerPermissions() function. The manager instance is passed to the
     * callback function as an argument. Usage:
     *
     *     BackendAuth::registerCallback(function ($manager) {
     *         $manager->registerPermissions([...]);
     *     });
     *
     * @param  callable  $callback  A callable function.
     */
    public function registerCallback(callable $callback)
    {
        $this->callbacks[] = $callback;
    }

    /**
     * Registers the back-end permission items.
     * The argument is an array of the permissions. The array keys represent the
     * permission codes, specific for the plugin/module. Each element in the
     * array should be an associative array with the following keys:
     * - label - specifies the menu label localization string key, required.
     * - order - a position of the item in the menu, optional.
     * - comment - a brief comment that describes the permission, optional.
     * - tab - assign this permission to a tabbed group, optional.
     *
     * @param  string  $owner  Specifies the permissions' owner plugin or module in the format Author.Plugin
     * @param  array  $definitions  An array of the menu item definitions.
     */
    public function registerPermissions($owner, array $definitions)
    {
        // Resolve alias
        $owner = $this->aliases[$owner] ?? $owner;

        foreach ($definitions as $code => $definition) {
            $permission = (object) array_merge(self::$permissionDefaults, array_merge($definition, [
                'code' => $code,
                'owner' => $owner,
            ]));

            $this->permissions[] = $permission;
        }

        // Clear the permission cache
        $this->permissionCache = false;
    }

    /**
     * Register a permission owner alias
     *
     * @param  string  $owner  The owner to register an alias for. Example: Real.Owner
     * @param  string  $alias  The alias to register. Example: Aliased.Owner
     * @return void
     */
    public function registerPermissionOwnerAlias(string $owner, string $alias)
    {
        $this->aliases[$alias] = $owner;
    }

    /**
     * Removes a single back-end permission
     *
     * @param  string  $owner  Specifies the permissions' owner plugin or module in the format Author.Plugin
     * @param  string  $code  The code of the permission to remove
     * @return void
     */
    public function removePermission($owner, $code)
    {
        if (! $this->permissions) {
            throw new SystemException('Unable to remove permissions before they are loaded.');
        }

        // Resolve alias
        $owner = $this->aliases[$owner] ?? $owner;

        $ownerPermissions = array_filter($this->permissions, function ($permission) use ($owner) {
            return $permission->owner === $owner;
        });

        foreach ($ownerPermissions as $key => $permission) {
            if ($permission->code === $code) {
                unset($this->permissions[$key]);
            }
        }

        // Clear the permission cache
        $this->permissionCache = false;
    }

    /**
     * Returns a list of the registered permissions items.
     *
     * @return array
     */
    public function listPermissions()
    {
        if ($this->permissionCache !== false) {
            return $this->permissionCache;
        }

        /*
         * Load module items
         */
        foreach ($this->callbacks as $callback) {
            $callback($this);
        }

        /*
         * Load plugin items
         */
        $plugins = PluginManager::instance()->getPlugins();

        foreach ($plugins as $id => $plugin) {
            $items = $plugin->registerPermissions();
            if (! is_array($items)) {
                continue;
            }

            $this->registerPermissions($id, $items);
        }

        /*
         * Sort permission items
         */
        usort($this->permissions, function ($a, $b) {
            if ($a->order == $b->order) {
                return 0;
            }

            return $a->order > $b->order ? 1 : -1;
        });

        return $this->permissionCache = $this->permissions;
    }

    /**
     * Returns an array of registered permissions, grouped by tabs.
     *
     * @return array
     */
    public function listTabbedPermissions()
    {
        $tabs = [];

        foreach ($this->listPermissions() as $permission) {
            $tab = $permission->tab ?? 'backend::lang.form.undefined_tab';

            if (! array_key_exists($tab, $tabs)) {
                $tabs[$tab] = [];
            }

            $tabs[$tab][] = $permission;
        }

        return $tabs;
    }

    /**
     * {@inheritdoc}
     */
    protected function createUserModelQuery()
    {
        return parent::createUserModelQuery()->withTrashed();
    }

    /**
     * {@inheritdoc}
     */
    protected function validateUserModel($user)
    {
        if (! $user instanceof $this->userModel) {
            return false;
        }

        // Perform the deleted_at check manually since the relevant migrations
        // might not have been run yet during the update to build 444.
        // @see https://github.com/octobercms/october/issues/3999
        if (array_key_exists('deleted_at', $user->getAttributes()) && $user->deleted_at !== null) {
            return false;
        }

        return $user;
    }

    /**
     * Returns an array of registered permissions belonging to a given role code
     *
     * @param  string  $role
     * @param  bool  $includeOrphans  Include any permissons that do not have a default role specified
     * @return array
     */
    public function listPermissionsForRole($role, $includeOrphans = true)
    {
        if ($this->permissionRoles === false) {
            $this->permissionRoles = [];

            foreach ($this->listPermissions() as $permission) {
                if ($permission->roles) {
                    foreach ((array) $permission->roles as $_role) {
                        $this->permissionRoles[$_role][$permission->code] = 1;
                    }
                } else {
                    $this->permissionRoles['*'][$permission->code] = 1;
                }
            }
        }

        $result = $this->permissionRoles[$role] ?? [];

        if ($includeOrphans) {
            $result += $this->permissionRoles['*'] ?? [];
        }

        return $result;
    }

    public function hasPermissionsForRole($role)
    {
        return (bool) $this->listPermissionsForRole($role, false);
    }
}
