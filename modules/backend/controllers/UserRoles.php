<?php

namespace Backend\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Response;
use System\Classes\SettingsManager;
use View;

/**
 * Backend user groups controller
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class UserRoles extends Controller
{
    /**
     * @var array Extensions implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
        \Backend\Behaviors\RelationController::class,
    ];

    /**
     * @var array Permissions required to view this page.
     */
    public $requiredPermissions = ['backend.manage_users'];

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Winter.System', 'system', 'users');
        SettingsManager::setContext('Winter.System', 'administrators');

        /*
         * Only super users can access
         */
        $this->bindEvent('page.beforeDisplay', function () {
            if (! $this->user->isSuperUser()) {
                return Response::make(View::make('backend::access_denied'), 403);
            }
        });
    }
}
