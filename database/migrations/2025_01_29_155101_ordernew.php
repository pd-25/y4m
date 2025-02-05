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
        Schema::create('ordernew', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 100)->nullable();
            $table->integer('product_id');
            $table->string('product_size', 100)->nullable();
            $table->string('product_color', 100)->nullable();
            $table->decimal('product_price', 10, 2)->nullable();
            $table->integer('product_qty')->nullable();
            $table->enum('status', ['pending', 'payment_success', 'payment_failure']);
            $table->longText('paypal_success_log')->nullable();
            $table->longText('paypal_failure_log')->nullable();
            $table->timestamps();  // this creates `created_at` and `updated_at` columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordernew');
    }
};
