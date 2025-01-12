<?php

namespace Cms\Helpers;

use Config;
use Route;
use Url;

/**
 * CMS Helper
 *
 * @see \Cms\Facades\Cms
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class Cms
{
    protected static $actionExists;

    /**
     * Returns a URL in context of the Frontend
     */
    public function url($path = null)
    {
        $routeAction = 'Cms\Classes\CmsController@run';

        if (self::$actionExists === null) {
            self::$actionExists = Route::getRoutes()->getByAction($routeAction) !== null;
        }

        if (substr($path, 0, 1) == '/') {
            $path = substr($path, 1);
        }

        if (self::$actionExists) {
            return Url::action($routeAction, ['slug' => $path]);
        }

        return Url::to($path);
    }

    public static function safeModeEnabled()
    {
        $safeMode = Config::get('cms.enableSafeMode', null);
        if ($safeMode === null) {
            $safeMode = ! Config::get('app.debug', false);
        }

        return $safeMode;
    }
}
