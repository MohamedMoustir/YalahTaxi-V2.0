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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driveer_id');
            $table->unsignedBigInteger('course_passenger_id');
            $table->enum('statuts', ['libre', 'réservé'])->default('libre');
            $table->timestamps();
            $table->foreign('driveer_id')->references('id')->on('driveers')->onDelete('cascade');
            $table->foreign('course_passenger_id')->references('id')->on('course_passenger')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
