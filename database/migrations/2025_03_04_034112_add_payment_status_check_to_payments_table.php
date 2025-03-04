<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('payments', function (Blueprint $table) {
        DB::statement('ALTER TABLE payments ADD CONSTRAINT payments_payment_status_check CHECK (payment_status IN (\'pending\', \'approved\', \'declined\'))');
    });
}

public function down()
{
    Schema::table('payments', function (Blueprint $table) {
        DB::statement('ALTER TABLE payments DROP CONSTRAINT payments_payment_status_check');
    });
}

};
