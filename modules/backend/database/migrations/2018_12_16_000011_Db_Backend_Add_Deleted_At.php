<?php

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

class DbBackendAddDeletedAt extends Migration
{
    public function up()
    {
        if (! Schema::hasColumn('backend_users', 'deleted_at')) {
            Schema::table('backend_users', function (Blueprint $table) {
                $table->timestamp('deleted_at')->nullable()->after('updated_at');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('backend_users', 'deleted_at')) {
            Schema::table('backend_users', function (Blueprint $table) {
                $table->dropColumn('deleted_at');
            });
        }
    }
}
