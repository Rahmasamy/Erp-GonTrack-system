<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table( 'expenses')->insert(
            [

                [
                    'netSalary' => 1500.00,
                    'kpis' => 85,
                    'overtime_byhour' => 10,
                    'numberofdays' => 22,
                    'salary_per_day' => 70,
                    'absence_per_hour' => 2,
                    'insurance' => 100,
                    'salary_deduction' => 50,
                    'emp_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'netSalary' => 1700.00,
                    'kpis' => 90,
                    'overtime_byhour' => 5,
                    'numberofdays' => 20,
                    'salary_per_day' => 80,
                    'absence_per_hour' => 1,
                    'insurance' => 120,
                    'salary_deduction' => 40,
                    'emp_id' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'netSalary' => 1800.00,
                    'kpis' => 75,
                    'overtime_byhour' => 8,
                    'numberofdays' => 23,
                    'salary_per_day' => 75,
                    'absence_per_hour' => 3,
                    'insurance' => 110,
                    'salary_deduction' => 60,
                    'emp_id' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'netSalary' => 1600.00,
                    'kpis' => 80,
                    'overtime_byhour' => 6,
                    'numberofdays' => 21,
                    'salary_per_day' => 78,
                    'absence_per_hour' => 2,
                    'insurance' => 105,
                    'salary_deduction' => 55,
                    'emp_id' => 4,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'netSalary' => 1400.00,
                    'kpis' => 88,
                    'overtime_byhour' => 12,
                    'numberofdays' => 22,
                    'salary_per_day' => 65,
                    'absence_per_hour' => 4,
                    'insurance' => 95,
                    'salary_deduction' => 70,
                    'emp_id' => 5,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'netSalary' => 1550.00,
                    'kpis' => 92,
                    'overtime_byhour' => 15,
                    'numberofdays' => 20,
                    'salary_per_day' => 77,
                    'absence_per_hour' => 2,
                    'insurance' => 115,
                    'salary_deduction' => 65,
                    'emp_id' => 6,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],






            ]
            );
    }
}
