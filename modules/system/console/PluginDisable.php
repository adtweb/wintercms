<?php

namespace System\Console;

use System\Classes\PluginManager;
use Winter\Storm\Console\Command;

/**
 * Console command to disable a plugin.
 *
 * @author Lucas Zamora
 */
class PluginDisable extends Command
{
    use Traits\HasPluginArgument;

    /**
     * @var string|null The default command name for lazy loading.
     */
    protected static $defaultName = 'plugin:disable';

    /**
     * @var string The name and signature of this command.
     */
    protected $signature = 'plugin:disable
        {plugin : The plugin to disable. <info>(eg: Winter.Blog)</info>}';

    /**
     * @var string The console command description.
     */
    protected $description = 'Disable an existing plugin.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $pluginName = $this->getPluginIdentifier();
        $pluginManager = PluginManager::instance();

        // Disable this plugin
        $pluginManager->disablePlugin($pluginName);

        $this->output->writeln(sprintf('<info>%s:</info> disabled.', $pluginName));
    }
}
