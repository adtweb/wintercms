<?php

namespace System\Console;

use Illuminate\Console\Command;
use Str;
use Symfony\Component\Console\Input\InputOption;
use System\Classes\UpdateManager;

/**
 * Console command to perform a system update.
 *
 * This updates Winter CMS and all plugins, database and files. It uses the
 * Winter gateway to receive the files via a package manager, then saves
 * the latest build number to the system.
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class WinterUpdate extends Command
{
    /**
     * The console command name.
     */
    protected $name = 'winter:update';

    /**
     * The console command description.
     */
    protected $description = 'Updates Winter CMS and all plugins, database and files.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        // Register aliases for backwards compatibility with October
        $this->setAliases(['october:update']);
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->output->writeln('<info>Updating Winter...</info>');
        $manager = UpdateManager::instance()->setNotesOutput($this->output);
        $forceUpdate = $this->option('force');

        /*
         * Check for disabilities
         */
        $disableCore = $disablePlugins = $disableThemes = false;

        if ($this->option('plugins')) {
            $disableCore = true;
            $disableThemes = true;
        }

        if ($this->option('core')) {
            $disablePlugins = true;
            $disableThemes = true;
        }

        /*
         * Perform update
         */
        $updateList = $manager->requestUpdateList($forceUpdate);
        $updates = (int) array_get($updateList, 'update', 0);

        if ($updates == 0) {
            $this->output->writeln('<info>No new updates found</info>');

            return;
        }

        $this->output->writeln(sprintf('<info>Found %s new %s!</info>', $updates, Str::plural('update', $updates)));

        $coreHash = $disableCore ? null : array_get($updateList, 'core.hash');
        $coreBuild = array_get($updateList, 'core.build');

        if ($coreHash) {
            $this->output->writeln('<info>Downloading application files</info>');
            $manager->downloadCore($coreHash);
        }

        $plugins = $disablePlugins ? [] : array_get($updateList, 'plugins');
        foreach ($plugins as $code => $plugin) {
            $pluginName = array_get($plugin, 'name');
            $pluginHash = array_get($plugin, 'hash');

            $this->output->writeln(sprintf('<info>Downloading plugin: %s</info>', $pluginName));
            $manager->downloadPlugin($code, $pluginHash);
        }

        if ($coreHash) {
            $this->output->writeln('<info>Unpacking application files</info>');
            $manager->extractCore();
            $manager->setBuild($coreBuild, $coreHash);
        }

        foreach ($plugins as $code => $plugin) {
            $pluginName = array_get($plugin, 'name');
            $pluginHash = array_get($plugin, 'hash');

            $this->output->writeln(sprintf('<info>Unpacking plugin: %s</info>', $pluginName));
            $manager->extractPlugin($code, $pluginHash);
        }

        /*
         * Run migrations
         */
        $this->call('winter:up');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Force updates.'],
            ['core', null, InputOption::VALUE_NONE, 'Update core application files only.'],
            ['plugins', null, InputOption::VALUE_NONE, 'Update plugin files only.'],
        ];
    }
}
