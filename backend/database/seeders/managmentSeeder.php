<?php

namespace Database\Seeders;

use App\Models\Managment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class managmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Loop to create 10 records
        for ($i = 1; $i <= 10; $i++) {
            Managment::create([
                'managment_amount' => rand(100, 1000),
                'managment_name' => ["profile", "account"][array_rand(["profile", "account"])],
                'invoice_number' => 200000 + $i,
                "clinet_id" => rand(1,6)
            ]);
        }
    }
}
