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
        Schema::create('course_passenger', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('passenger_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('course_id')->on('courses')->references('id')->onDelete('cascade');
            $table->string('depart');
            $table->string('arriver');
            $table->datetime('departure_time');
            $table->enum('status',['pending','approved','refuser'])->default('pending');
            $table->decimal('price', 8, 2);
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
