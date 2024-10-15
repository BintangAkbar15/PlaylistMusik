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
        Schema::create('playlist_lagu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->constrained('playlists','id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('lagu','id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_lagus');
    }
};
