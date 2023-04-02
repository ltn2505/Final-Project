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
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0945395895',
                'role' => 'Admin',
                'manager'=>'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff1',
                'email' => 'Staff1@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 1',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0123456789',
                'role' => 'Staff',
                'manager'=>'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff2',
                'email' => 'Staff2@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 2',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0223456789',
                'role' => 'Staff',
                'manager'=>'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff3',
                'email' => 'Staff3@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 3',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0233456789',
                'role' => 'Staff',
                'manager'=>'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff4',
                'email' => 'Staff4@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 4',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0243456789',
                'role' => 'Staff',
                'manager'=>'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Staff5',
                'email' => 'Staff5@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Staff 5',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0253456789',
                'role' => 'Staff',
                'manager'=>'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Collaborator1',
                'email' => 'Collaborator1@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Collaborator 1',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0273456789',
                'role' => 'Collaborator',
                'manager'=>'Staff1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Collaborator2',
                'email' => 'Collaborator2@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Collaborator 2',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0283456789',
                'role' => 'Collaborator',
                'manager'=>'Staff2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Collaborator3',
                'email' => 'Collaborator3@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Collaborator 3',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0263456789',
                'role' => 'Collaborator',
                'manager'=>'Staff3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Collaborator4',
                'email' => 'Collaborator4@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Collaborator 4',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0293456789',
                'role' => 'Collaborator',
                'manager'=>'Staff4',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Collaborator5',
                'email' => 'Collaborator5@gmail.com',
                'password' => bcrypt('12345678'),
                'full_name' => 'Collaborator 5',
                'gender' => 'Male',
                'dob'=>date('Y-m-d'),
                'phone_number'=>'0313456789',
                'role' => 'Collaborator',
                'manager'=>'Staff5',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
