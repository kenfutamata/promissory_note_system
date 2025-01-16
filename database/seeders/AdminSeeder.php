<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // admin (edp) account
        User::create([
            'user_id' => 'EDP0001',
            'first_name' => 'EDP Admin',
            'middle_name' => '',
            'last_name' => '',
            'program' => '',
            'year_section' => '',
            'department' => '',
            'email' => 'edp_admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'role' => 'admin',
            'profile_picture' => '',
        ]);

        // accounting account
        User::create([
            'user_id' => 'ACC0001',
            'first_name' => 'Accounting Admin',
            'middle_name' => '',
            'last_name' => '',
            'program' => '',
            'year_section' => '',
            'department' => '',
            'email' => 'accounting_admin@gmail.com',
            'password' => Hash::make('account1234'),
            'role' => 'accounting',
            'profile_picture' => '',
        ]);

        // cads account
        User::create([
            'user_id' => 'CAD0001',
            'first_name' => 'CADS Admin',
            'middle_name' => '',
            'last_name' => '',
            'program' => '',
            'year_section' => '',
            'department' => '',
            'email' => 'cads_admin@gmail.com',
            'password' => Hash::make('cads1234'),
            'role' => 'cads',
            'profile_picture' => '',
        ]);

        //student account
        User::create([
            'user_id' => 'STU0001',
            'first_name' => 'Example',
            'middle_name' => '',
            'last_name' => '',
            'program' => '',
            'year_section' => '',
            'department' => '',
            'email' => 'jcdiocampo23@gmail.com',
            'password' => Hash::make('student1234'),
            'role' => 'student',
            'profile_picture' => '',
        ]);

        //Dean

        User::create([
            'user_id' => 'DCCS001',
            'first_name' => 'Kezekiah',
            'middle_name' => 'Ruben',
            'last_name' => 'Yatong',
            'program' => '',
            'year_section' => '',
            'department' => '',
            'email' => 'kezekiahY@gmail.com',
            'password' => Hash::make('dean1234'),
            'role' => 'Dean',
            'profile_picture' => '',
        ]);

    }
}
