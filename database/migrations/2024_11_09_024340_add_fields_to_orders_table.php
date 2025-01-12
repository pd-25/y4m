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
            $table->string("payment_mode");
            $table->string("payment_ref_no")->nullable();
            $table->string("order_number");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // $table->string('password')->nullable();
            $table->dropIfExists("payment_mode");
            $table->dropIfExists("payment_ref_no");
            $table->dropIfExists("order_number");
        });
    }
};
