<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detailestrajets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trajet_id');
            $table->numericMorphs('order_id');
            $table->string('point_de_pause');
            $table->integer('distance');
            $table->string('price');
            $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
