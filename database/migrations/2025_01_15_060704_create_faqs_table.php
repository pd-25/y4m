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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('program_id'); // Foreign key for program
            $table->string('question'); // FAQ question
            $table->text('answer'); // FAQ answer
            $table->timestamps(); // Created at and updated at timestamps

            // Optional: Add a foreign key constraint (if there's a `programs` table)
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
