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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('ownership')->nullable();
            $table->integer('members')->nullable();
            $table->bigInteger('power_consumption')->nullable();
            $table->string('elec_rate_type')->nullable();
            $table->bigInteger('day_rate')->nullable();
            $table->bigInteger('night_rate')->nullable();
            $table->string('installation_timeframe')->nullable();
            $table->text('location_address')->nullable();
            $table->string('total_area')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
