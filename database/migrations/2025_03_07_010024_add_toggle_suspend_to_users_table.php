<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToggleSuspendToUsersTable extends Migration
{
    /**
     * Exécutez la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('toggle_suspend')->default(false);
        });
    }

    /**
     * Annulez la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('toggle_suspend');
        });
    }
}
