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
        Schema::create('solicitor_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cost');
            $table->unsignedBigInteger('solicitor_id');
            $table->unsignedBigInteger('practice_area_id');
            $table->timestamps();
            $table->foreign('solicitor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('practice_area_id')->references('id')->on('practice_areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitor_services');
    }
};
