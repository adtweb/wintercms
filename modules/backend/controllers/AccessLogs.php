<?php

namespace Backend\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use System\Classes\SettingsManager;

/**
 * Access Logs controller
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class AccessLogs extends Controller
{
    /**
     * @var array Extensions implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\ListController::class,
    ];

    /**
     * @var array Permissions required to view this page.
     */
    public $requiredPermissions = ['system.access_logs'];

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Winter.System', 'system', 'settings');
        SettingsManager::setContext('Winter.Backend', 'access_logs');
    }

    public function index_onRefresh()
    {
        return $this->listRefresh();
    }
}
