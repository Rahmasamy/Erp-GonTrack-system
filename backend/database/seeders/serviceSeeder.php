<?php

namespace Database\Seeders;

use App\Models\services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 10; $i++) {
        services::create([
                'service_amount' => rand(100, 1000),
                'services_name' => ["web", "mobile", "marketing", "ads"][array_rand(["web", "mobile", "marketing", "ads"])],
                'invoice_number' => 100000 + $i,
                "clinet_id" => rand(1,6)
            ]);
        }
    }
}
