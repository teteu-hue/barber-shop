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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('id_appointment');
            $table->date('appointment_date');
            $table->enum('status', ['pendente', 'confirmado', 'concluido', 'cancelado']);
            $table->text('observations')->nullable();
            $table->timestamps();
        });

        /**
         * Relationships
         */
        Schema::table('appointments', function (Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id_service')->on('services')->onDelete('cascade');

            $table->unsignedBigInteger('available_time_id');
            $table->foreign('available_time_id')->references('id_available_time')->on('available_times')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
