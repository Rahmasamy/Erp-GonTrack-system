<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyExpensiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('daily_expensives')->insert([
                'expenses_date' => now()->subDays(rand(1, 30)), // Random date in the last 30 days
                'daily_expense' => rand(100, 1000) / 10, // Random expense between 10.0 to 100.0
                'client_id' => rand(1, 6), // Assuming you have 10 clients
                'acount_id' => rand(1, 6), // Assuming you have 10 accounts
                'page_id' => rand(1, 6), // Assuming you have 10 pages
                'campgian_id' => rand(1, 6), // Assuming you have 10 campgians
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
