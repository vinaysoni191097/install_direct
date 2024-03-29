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
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->dropColumn('product_varaition_id');
            $table->after('order_id', function (Blueprint $table) {
                $table->string('product_name')->nullable();
                $table->float('price')->nullable();
                $table->string('Kwh')->nullable();
                $table->string('warranty')->nullable();
                $table->string('product_image')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            //
        });
    }
};
