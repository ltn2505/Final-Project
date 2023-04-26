<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateSampleRecords extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Le Thanh Nhan',
                'gender' => 'Male',
                'dob' => date('Y-m-d'),
                'phone_number' => '0945395895',
                'role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff1',
                'email' => 'Staff1@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 1',
                'gender' => 'Male',
                'dob' => date('Y-m-d'),
                'phone_number' => '0123456789',
                'role' => 'Staff',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff2',
                'email' => 'Staff2@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 2',
                'gender' => 'Male',
                'dob' => date('Y-m-d'),
                'phone_number' => '0223456789',
                'role' => 'Staff',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff3',
                'email' => 'Staff3@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 3',
                'gender' => 'Male',
                'dob' => date('Y-m-d'),
                'phone_number' => '0233456789',
                'role' => 'Staff',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff4',
                'email' => 'Staff4@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 4',
                'gender' => 'Male',
                'dob' => date('Y-m-d'),
                'phone_number' => '0243456789',
                'role' => 'Staff',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff5',
                'email' => 'Staff5@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 5',
                'gender' => 'Male',
                'dob' => date('Y-m-d'),
                'phone_number' => '0253456789',
                'role' => 'Staff',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
