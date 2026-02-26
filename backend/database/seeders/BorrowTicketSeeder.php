<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $borrowTickets = [
            // BorrowRequest ID = 2 (user_id=3, book_id=2) -> CHỜ NHẬN
            [
                'borrow_request_id' => 2,
                'user_id' => 3,
                'book_id' => 2,
                'borrow_date' => null,
                'due_date' => null,
                'status' => 0, // 0 = chờ nhận
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // BorrowRequest ID = 5 (user_id=6, book_id=5) -> ĐANG MƯỢN
            [
                'borrow_request_id' => 5,
                'user_id' => 6,
                'book_id' => 5,
                'borrow_date' => now()->subDays(2),
                'due_date' => now()->addDays(12),
                'status' => 1, // 1 = đang mượn
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // BorrowRequest ID = 7 (user_id=8, book_id=7) -> ĐÃ TRẢ
            [
                'borrow_request_id' => 7,
                'user_id' => 8,
                'book_id' => 7,
                'borrow_date' => now()->subDays(20),
                'due_date' => now()->subDays(6),
                'status' => 2, // 2 = đã trả
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // BorrowRequest ID = 10 (user_id=11, book_id=10) -> QUÁ HẠN
            [
                'borrow_request_id' => 10,
                'user_id' => 11,
                'book_id' => 10,
                'borrow_date' => now()->subDays(25),
                'due_date' => now()->subDays(11),
                'status' => 3, // 3 = quá hạn
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // BorrowRequest ID = 12 (user_id=13, book_id=12) -> ĐANG MƯỢN
            [
                'borrow_request_id' => 12,
                'user_id' => 13,
                'book_id' => 12,
                'borrow_date' => now()->subDays(5),
                'due_date' => now()->addDays(9),
                'status' => 1, // 1 = đang mượn
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // BorrowRequest ID = 15 (user_id=2, book_id=15) -> CHỜ NHẬN
            [
                'borrow_request_id' => 15,
                'user_id' => 2,
                'book_id' => 15,
                'borrow_date' => null,
                'due_date' => null,
                'status' => 0, // 0 = chờ nhận
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('borrow_tickets')->insert($borrowTickets);
    }
}
