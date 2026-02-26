<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $borrowRequests = [
            ['user_id' => 2, 'book_id' => 1, 'status' => 0, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'book_id' => 2, 'status' => 1, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'book_id' => 3, 'status' => 2, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'book_id' => 4, 'status' => 0, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 6, 'book_id' => 5, 'status' => 1, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 7, 'book_id' => 6, 'status' => 0, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 8, 'book_id' => 7, 'status' => 1, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 9, 'book_id' => 8, 'status' => 2, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 10, 'book_id' => 9, 'status' => 0, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 11, 'book_id' => 10, 'status' => 1, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 12, 'book_id' => 11, 'status' => 0, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 13, 'book_id' => 12, 'status' => 1, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 14, 'book_id' => 13, 'status' => 2, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 15, 'book_id' => 14, 'status' => 0, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'book_id' => 15, 'status' => 1, 'request_date' => now(), 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('borrow_requests')->insert($borrowRequests);
    }
}
