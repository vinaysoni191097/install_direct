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
        Schema::create('battery_inverter_compatibilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('battery_id')->nullable();
            $table->foreign('battery_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('inverter_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battery_inverter_compatibilities');
    }
};
