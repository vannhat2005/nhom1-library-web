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
        Schema::create('borrow_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrow_request_id')->constrained('borrow_requests')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('book_id')->constrained('books')->restrictOnDelete();
            $table->dateTime('borrow_date')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->integer('status'); // 0: Chưa mượn, 1: Đang mượn, 2: Đã trả, 3: Quá hạn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_tickets');
    }
};
