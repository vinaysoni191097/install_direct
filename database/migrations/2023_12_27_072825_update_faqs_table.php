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
        Schema::table('faq', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('slug');
            $table->text('question')->after('slug')->nullable();
            $table->text('answer')->after('slug')->nullable();
        });
        Schema::dropIfExists('faq_data');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            //
        });
    }
};
