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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("slug", 250)->unique();
            $table->string("name", 250);
            $table->longText("description");
            $table->decimal("price", 10, 2)->nullable()->comment("price will be taken from variant, if not have varient will take it"); 
            $table->unsignedBigInteger('category_id');
            $table->string('type', 50);
            $table->boolean("status")->default(1);
            $table->integer('quantity_in_stock');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
