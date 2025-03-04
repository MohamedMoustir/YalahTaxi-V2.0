<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('detailestrajets', function (Blueprint $table) {
            $table->renameColumn('id_trajet', 'trajet_id');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('detailestrajets', function (Blueprint $table) {
            $table->renameColumn('trajet_id', 'id_trajet');
        });
    }
};
