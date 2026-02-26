<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'password' => Hash::make('123456'),
                'full_name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'role' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'librarian',
                'password' => Hash::make('123456'),
                'full_name' => 'Librarian User',
                'email' => 'librarian@gmail.com',
                'role' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user1',
                'password' => Hash::make('123456'),
                'full_name' => 'Nguyễn Văn A',
                'email' => 'user1@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user2',
                'password' => Hash::make('123456'),
                'full_name' => 'Trần Thị B',
                'email' => 'user2@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user3',
                'password' => Hash::make('123456'),
                'full_name' => 'Lê Văn C',
                'email' => 'user3@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user4',
                'password' => Hash::make('123456'),
                'full_name' => 'Phạm Thị D',
                'email' => 'user4@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user5',
                'password' => Hash::make('123456'),
                'full_name' => 'Hoàng Văn E',
                'email' => 'user5@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user6',
                'password' => Hash::make('123456'),
                'full_name' => 'Vũ Thị F',
                'email' => 'user6@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user7',
                'password' => Hash::make('123456'),
                'full_name' => 'Đặng Văn G',
                'email' => 'user7@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user8',
                'password' => Hash::make('123456'),
                'full_name' => 'Bùi Thị H',
                'email' => 'user8@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user9',
                'password' => Hash::make('123456'),
                'full_name' => 'Đỗ Văn I',
                'email' => 'user9@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user10',
                'password' => Hash::make('123456'),
                'full_name' => 'Ngô Thị K',
                'email' => 'user10@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user11',
                'password' => Hash::make('123456'),
                'full_name' => 'Lý Văn L',
                'email' => 'user11@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user12',
                'password' => Hash::make('123456'),
                'full_name' => 'Trịnh Thị M',
                'email' => 'user12@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user13',
                'password' => Hash::make('123456'),
                'full_name' => 'Phan Văn N',
                'email' => 'user13@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user14',
                'password' => Hash::make('123456'),
                'full_name' => 'Mai Thị O',
                'email' => 'user14@gmail.com',
                'role' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
