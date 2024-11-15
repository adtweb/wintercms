<?php

namespace System\Database\Seeds;

use Eloquent;
use Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguarded(function () {
            $this->call('System\Database\Seeds\SeedSetupMailLayouts');
        });
    }
}
