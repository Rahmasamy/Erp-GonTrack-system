<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('admins')->insert([
            [
                'admin_name' => 'Mr. Ahmed',
                'admin_email' => 'ahmed@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_name' => 'Mr. Tawfiea',
                'admin_email' => 'tawfiea@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
