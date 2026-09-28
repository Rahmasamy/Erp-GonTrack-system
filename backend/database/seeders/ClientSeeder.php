<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('clinets')->insert([
            [
                'client_name' => 'Client One',
                'email' => 'client1@example.com',
                'adress' => '123 Main St, City',
                'phone' => '123-456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Client Two',
                'email' => 'client2@example.com',
                'adress' => '456 Maple Ave, Town',
                'phone' => '234-567-8901',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Client Three',
                'email' => 'client3@example.com',
                'adress' => '789 Oak St, Village',
                'phone' => '345-678-9012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Client Four',
                'email' => 'client4@example.com',
                'adress' => '101 Pine Rd, Hamlet',
                'phone' => '456-789-0123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Client Five',
                'email' => 'client5@example.com',
                'adress' => '202 Cedar Blvd, District',
                'phone' => '567-890-1234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Client Six',
                'email' => 'client6@example.com',
                'adress' => '303 Birch Ln, Region',
                'phone' => '678-901-2345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
