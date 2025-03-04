<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_driver');
            $table->unsignedBigInteger('trajet_id');
            $table->foreign('id_driver')->references('id')->on('driveers')->onDelete('cascade'); 
            $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('cascade');
            $table->enum('statut',['allez','retour'])->default('allez');
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
