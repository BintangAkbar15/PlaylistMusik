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
        Schema::create('lagu_genres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lagu_id')->constrained('lagu','id')->onDelete('cascade');
            $table->foreignId('genre_id')->constrained('genres','id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lagu_genres');
    }
};