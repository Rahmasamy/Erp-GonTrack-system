<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            ClientSeeder::class,
            AccountSeeder::class,
            CampigansSeeder::class,
            ReportsSeeder::class,
            AdminSeeder::class,
            PagesSeeder::class,
            serviceSeeder::class,
            managmentSeeder::class,
            addsSeeder::class,
            EmployeeSeeder::class,
            ExpensesSeeder::class,
            PaymentSeeder::class,
            DailyExpensiveSeeder::class,
            Roleseeder::class,
            UserSeeder::class

        ]);
    }
}
