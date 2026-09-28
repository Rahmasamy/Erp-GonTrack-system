<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('employees')->insert([
            [
                'name' => 'John Doe',
                'mobile_phone' => '123-456-7890',
                'address' => '123 Main Street, Cairo',
                'position' => 'Manager',
                'date-of-birth' => '1980-01-15',
            ],
            [
                'name' => 'Jane Smith',
                'mobile_phone' => '234-567-8901',
                'address' => '456 Elm Street, Alexandria',
                'position' => 'Developer',
                'date-of-birth' => '1992-04-20',
            ],
            [
                'name' => 'Ahmed Ali',
                'mobile_phone' => '345-678-9012',
                'address' => '789 Oak Street, Giza',
                'position' => 'Designer',
                'date-of-birth' => '1985-07-30',
            ],
            [
                'name' => 'Sara Hassan',
                'mobile_phone' => '456-789-0123',
                'address' => '101 Pine Avenue, Mansoura',
                'position' => 'HR',
                'date-of-birth' => '1990-11-25',
            ],
            [
                'name' => 'Mohamed Salah',
                'mobile_phone' => '567-890-1234',
                'address' => '202 Cedar Boulevard, Luxor',
                'position' => 'Marketing',
                'date-of-birth' => '1994-02-10',
            ],
            [
                'name' => 'Laila Khaled',
                'mobile_phone' => '678-901-2345',
                'address' => '303 Birch Drive, Aswan',
                'position' => 'Accountant',
                'date-of-birth' => '1988-08-14',
            ],
            [
                'name' => 'Khaled Mansour',
                'mobile_phone' => '789-012-3456',
                'address' => '404 Walnut Lane, Hurghada',
                'position' => 'Sales',
                'date-of-birth' => '1982-12-05',
            ],
            [
                'name' => 'Nora Samy',
                'mobile_phone' => '890-123-4567',
                'address' => '505 Maple Terrace, Sharm El-Sheikh',
                'position' => 'Engineer',
                'date-of-birth' => '1991-05-19',
            ],
            [
                'name' => 'Omar Ezz',
                'mobile_phone' => '901-234-5678',
                'address' => '606 Spruce Road, Tanta',
                'position' => 'Consultant',
                'date-of-birth' => '1984-09-29',
            ],
            [
                'name' => 'Fatma Adel',
                'mobile_phone' => '012-345-6789',
                'address' => '707 Willow Street, Port Said',
                'position' => 'Analyst',
                'date-of-birth' => '1993-06-15',
            ]
        ]
            );
    }
}
