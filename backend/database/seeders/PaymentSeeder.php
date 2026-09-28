<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Payment::create([
                'payment_method' => 'Method ' . $i,
                'amount' => rand(100, 1000), // random amount for demonstration
                'page_id' => rand(1, 6), // assume you have existing Page IDs from 1 to 10
                'account_id' => rand(1, 6), // assume existing Account IDs
                'campgian' => rand(1, 6), // assume existing Campaign IDs
                'clients_id' => rand(1, 6), // assume existing Client IDs
                'manag_id' => rand(1, 10), // assume existing Manager IDs
                'ads_id' => rand(1, 10), // assume existing Ad IDs
                'service_id' => rand(1, 10), // assume existing Service IDs
                'admins_id' => rand(1, 2), // assume existing Admin IDs
            ]);
        }
    }
}
