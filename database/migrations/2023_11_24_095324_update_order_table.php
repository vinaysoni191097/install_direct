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
        Schema::table('orders', function (Blueprint $table) {
            $table->after('id', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
                $table->bigInteger('order_number')->nullable();
                $table->text('installation_address')->nullable();
                $table->text('billing_address')->nullable();
                $table->string('installation_timeframe')->nullable();
                $table->float('total_amount')->nullable();
                $table->float('payable_amount')->nullable();
                $table->integer('status')->default(0);
                $table->boolean('document_uploaded')->default(0);
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
