<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('acounts')->insert([
            [
                'account_name' => 'Account 1',
                'client_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_name' => 'Account 2',
                'client_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_name' => 'Account 3',
                'client_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_name' => 'Account 4',
                'client_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_name' => 'Account 5',
                'client_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_name' => 'Account 6',
                'client_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
