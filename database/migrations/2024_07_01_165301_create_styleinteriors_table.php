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
        Schema::create('styleinteriors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('style_id')->index();
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('styleinteriors');
    }
};
