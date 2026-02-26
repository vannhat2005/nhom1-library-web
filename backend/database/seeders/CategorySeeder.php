<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Tiểu thuyết',
                'description' => 'Các tác phẩm tiểu thuyết và truyện dài.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Truyện ngắn',
                'description' => 'Tuyển tập truyện ngắn.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thiếu nhi',
                'description' => 'Sách dành cho thiếu nhi và tuổi học trò.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thơ',
                'description' => 'Thơ ca Việt Nam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lịch sử',
                'description' => 'Tác phẩm lịch sử, hồi ký, chính luận.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('categories')->insert($categories);
    }
}
