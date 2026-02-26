<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'Nguyễn Nhật Ánh',
                'biography' => 'Nhà văn nổi tiếng với các tác phẩm dành cho tuổi mới lớn.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nam Cao',
                'biography' => 'Nhà văn hiện thực phê phán, tiêu biểu văn học Việt Nam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tô Hoài',
                'biography' => 'Nhà văn với nhiều tác phẩm thiếu nhi và hiện thực.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vũ Trọng Phụng',
                'biography' => 'Nhà văn hiện thực trào phúng, nổi tiếng với Số đỏ.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Xuân Diệu',
                'biography' => 'Nhà thơ lớn của phong trào Thơ mới.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hồ Chí Minh',
                'biography' => 'Tác giả nhiều tác phẩm chính luận và thơ.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyễn Du',
                'biography' => 'Đại thi hào, tác giả Truyện Kiều.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thạch Lam',
                'biography' => 'Nhà văn, nhà báo với truyện ngắn đặc sắc.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nguyễn Huy Thiệp',
                'biography' => 'Nhà văn đương đại với nhiều truyện ngắn nổi bật.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bảo Ninh',
                'biography' => 'Nhà văn, tác giả Nỗi buồn chiến tranh.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('authors')->insert($authors);
    }
}
