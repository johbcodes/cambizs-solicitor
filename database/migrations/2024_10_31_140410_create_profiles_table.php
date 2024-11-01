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
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('background_image')->nullable();
            $table->string('video_link')->nullable();
            $table->string('location')->nullable();
            $table->float('rating')->default(0);
            $table->float('no_of_activities')->default(0);
            $table->text('bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
