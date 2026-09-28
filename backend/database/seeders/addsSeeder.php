<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Loop to create 10 records
        for ($i = 1; $i <= 10; $i++) {
            Ad::create([
                'ads_amount' => rand(100, 1000),
                "ads_name"=>"adds",
                'invoice_number' => 300000 + $i,
                "clinet_id" => rand(1,6)
            ]);
        }
    }
}
