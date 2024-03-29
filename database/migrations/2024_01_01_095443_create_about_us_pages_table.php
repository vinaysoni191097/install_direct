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
        Schema::create('about_us_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_headline')->nullable();
            $table->text('side_content')->nullable();
            $table->integer('featured_image_id')->nullable();
            $table->string('main_content_title')->nullable();
            $table->string('main_content_tagline')->nullable();
            $table->text('main_content_section_one')->nullable();
            $table->text('main_content_section_two')->nullable();
            $table->text('main_content_section_three')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_pages');
    }
};
