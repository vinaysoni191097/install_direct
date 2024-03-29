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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('banner_headline')->nullable();
            $table->string('banner_tagline')->nullable();
            $table->unsignedBigInteger('banner_image_id')->nullable();
            $table->foreign('banner_image_id')->references('id')->on('media')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('center_banner_image_id')->nullable();
            $table->foreign('center_banner_image_id')->references('id')->on('media')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('center_banner_headline')->nullable();
            $table->text('center_banner_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
