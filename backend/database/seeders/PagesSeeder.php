<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pages')->insert([
            [
                'page_name' => 'Home',
                'account_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'About Us',
                'account_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Services',
                'account_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Contact Us',
                'account_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Testimonials',
                'account_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page_name' => 'Blog',
                'account_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
