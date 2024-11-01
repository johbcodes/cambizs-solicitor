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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('details');
            $table->unsignedBigInteger('practice_area_id');
            $table->unsignedBigInteger('solicitor_id');
            $table->unsignedBigInteger('client_id');
            $table->enum('status', ['pending', 'active', 'cancelled', 'completed']);
            $table->timestamps();

            $table->foreign('practice_area_id')->references('id')->on('practice_areas')->onDelete('cascade');
            $table->foreign('solicitor_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
