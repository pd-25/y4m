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
        Schema::table('product_reviews', function (Blueprint $table) {
            // Drop the existing foreign key on user_id
            $table->dropForeign(['user_id']);

            // Re-add the foreign key with onDelete('cascade')
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_reviews', function (Blueprint $table) {
            // Drop the foreign key with cascade
            $table->dropForeign(['user_id']);

            // Re-add the foreign key without cascade
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
};
