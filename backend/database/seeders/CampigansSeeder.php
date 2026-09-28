<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampigansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('campgians')->insert([
            [
                'campagian_name' => 'Campaign Alpha',
                'camp_date' => '2024-11-01',
                'acount_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campagian_name' => 'Campaign Beta',
                'camp_date' => '2024-11-05',
                'acount_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campagian_name' => 'Campaign Gamma',
                'camp_date' => '2024-11-10',
                'acount_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campagian_name' => 'Campaign Delta',
                'camp_date' => '2024-11-15',
                'acount_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campagian_name' => 'Campaign Epsilon',
                'camp_date' => '2024-11-20',
                'acount_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campagian_name' => 'Campaign Zeta',
                'camp_date' => '2024-11-25',
                'acount_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
