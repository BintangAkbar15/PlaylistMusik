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
        Schema::create('lagu', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('audio');
            $table->string('thumb');
            $table->string('slug',50);
            $table->string('dilihat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lagus');
    }
};
