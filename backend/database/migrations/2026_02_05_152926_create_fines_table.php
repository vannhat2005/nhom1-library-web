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
        Schema::create('fines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrow_ticket_id')->constrained('borrow_tickets')->cascadeOnDelete();
            $table->string('fine_type', 50);
            $table->integer('amount');
            $table->integer('status'); // 0. Chưa nộp, 1. Đã nộp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};
