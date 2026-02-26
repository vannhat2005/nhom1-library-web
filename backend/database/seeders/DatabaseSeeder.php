<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('books')->truncate();
        DB::table('authors')->truncate();
        DB::table('categories')->truncate();
        DB::table('borrow_requests')->truncate();
        DB::table('borrow_tickets')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call([

            UserSeeder::class,
            AuthorSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            BorrowRequestSeeder::class,
            BorrowTicketSeeder::class,
        ]);
    }
}
