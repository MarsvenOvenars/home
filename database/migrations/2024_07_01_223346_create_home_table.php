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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('location_id')->index();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('style_id')->index();
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade');
            $table->unsignedBigInteger('styleinterior_id')->index();
            $table->foreign('styleinterior_id')->references('id')->on('styleinteriors')->onDelete('cascade');
            $table->unsignedBigInteger('year_id')->index();
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            $table->unsignedBigInteger('color_id')->index();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->string('title');
            $table->text('body');
            $table->string('image')->nullable();
            $table->double('price')->default(0);
            $table->boolean('credit')->default(0);
            $table->boolean('exchange')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
