<?php

namespace Winter\ReplaceNotInstalled;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Winter Sample Plugin',
            'description' => 'Sample plugin used by unit tests.',
            'author' => 'Alexey Bobkov, Samuel Georges',
            'replaces' => [
                'Winter.NotInstalled' => '>=1.0.3',
            ],
        ];
    }
}
