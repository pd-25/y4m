<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('product_reviews', function (Blueprint $table) {
            // Add a 'status' column with a default value of 'pending'
            $table->string('status')->default('pending')->after('note');

            // Update the foreign key to cascade on delete
            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('product_reviews', function (Blueprint $table) {
            // Drop the 'status' column
            $table->dropColumn('status');

            // Revert the foreign key constraint to not cascade on delete
            $table->dropForeign(['product_id']);
            $table->foreign('product_id')
                  ->references('id')->on('products');
        });
    }
};