<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('reports')->insert([
            [
                'account_id' => 1,
                'campaign_id' => 1, 
                'commissions' => '100.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_id' => 2,
                'campaign_id' => 2, 
                'commissions' => '200.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_id' => 3,
                'campaign_id' => 3, 
                'commissions' => '300.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_id' => 4,
                'campaign_id' => 4, 
                'commissions' => '400.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_id' => 5,
                'campaign_id' => 5, 
                'commissions' => '500.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
