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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->unique();
            $table->foreignId('author_id')->constrained('authors')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('image', 100)->nullable();
            $table->string('publisher', 100)->nullable();
            $table->integer('publication_year')->nullable();
            $table->integer('quantity');
            $table->integer('available');
            $table->integer('status')->default(1); // 1. Hoạt động 2. Ngừng hoạt động
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
