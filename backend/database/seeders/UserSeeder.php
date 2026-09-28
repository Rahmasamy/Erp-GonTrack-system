<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $superAdminRole = Role::firstOrCreate(['name' => 'super admin']);
        $hr = Role::firstOrCreate(['name' => 'hr']);


       User::create([
            'name' => 'Mr Ahmed',
            'email' => 'Trainerahmedhamdy@gmail.com',
            'password' => bcrypt(value: 'ahmed123admin123'),
        ]);

        User::create([
            'name' => 'Mr Sherif',
            'email' => 'ontrack354@gmail.com',
            'password' => bcrypt(value: 'ontracksherief1234'),
        ]);
        User::create([
            'name' => 'Omnia',
            'email' => 'ontrack211@gmail.com',
            'password' => bcrypt(value: 'omnia12345admin12'),
        ]);
        User::create([
            'name' => 'Habiba',
            'email' => 'habebashaban867@gmail.com',
            'password' => bcrypt(value: 'hr123habeba4512'),
        ]);



        $hrUser = User::where('email', 'habebashaban867@gmail.com')->first();
        if ($hrUser) {
            $hrUser->assignRole(roles: $hr);
        }


        $adminUser = User::where('email', 'Trainerahmedhamdy@gmail.com')->first();
        if ($adminUser) {

            $adminUser->assignRole($superAdminRole);
        }
        $adminUser = User::where('email', 'ontrack354@gmail.com')->first();
        if ($adminUser) {
            $adminUser->assignRole($superAdminRole);
        }
        $adminUser = User::where('email', 'ontrack211@gmail.com')->first();
        if ($adminUser) {
            $adminUser->assignRole($adminRole);
        }

    }
}
