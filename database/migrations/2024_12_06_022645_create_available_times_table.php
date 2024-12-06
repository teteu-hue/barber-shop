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
        Schema::create('available_times', function (Blueprint $table) {
            $table->id('id_available_time');
            $table->date('available_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['available', 'booked', 'unavailable'])->default('available');
            $table->timestamps();
        });

        /**
         * Relations
         */
        Schema::table('available_times', function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('available_times');
    }
};
