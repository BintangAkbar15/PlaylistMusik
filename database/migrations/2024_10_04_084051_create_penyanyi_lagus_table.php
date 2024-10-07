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
        Schema::create('penyanyi_lagu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyanyi_id')->constrained('penyanyi','id')->onDelete('cascade');
            $table->foreignId('lagu_id')->constrained('lagu','id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyanyi_lagus');
    }
};
