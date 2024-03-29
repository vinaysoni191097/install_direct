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
        Schema::table('enquiries', function (Blueprint $table) {
            $table->bigInteger('consumption_kwh_value')->after('power_consumption')->nullable();
            $table->bigInteger('consumption_amount_value')->after('power_consumption')->nullable();
        $table->string('power_consumption')->change()->nullable();
            $table->text('rooftop_cordinates')->after('longitude')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiries', function (Blueprint $table) {
            //
        });
    }
};
