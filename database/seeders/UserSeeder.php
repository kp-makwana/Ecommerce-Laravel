<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::insert([[
            'role' => 'admin',
            'f_name' => 'Ecommerce',
            'l_name' => 'Admin',
            'dob' => '2021-06-18',
            'country_code' => '+91',
            'contact_no' => '9876543210',
            'gender' => 'male',
            'email' => 'ecommerce@admin.com',
            'username' => 'admin',
            'password' => Hash::make('Admin@123'),
            'description' => 'this is admin'
        ], [
            'role' => 'user',
            'f_name' => 'Ecommerce',
            'l_name' => 'user',
            'dob' => '2021-06-18',
            'country_code' => '+91',
            'contact_no' => '9876543211',
            'gender' => 'female',
            'email' => 'ecommerce@user.com',
            'username' => 'user',
            'password' => Hash::make('password'),
            'description' => 'this is user'
        ], [
            'role' => 'user',
            'f_name' => 'Ecommerce',
            'l_name' => 'user1',
            'dob' => '1999-07-11',
            'country_code' => '+91',
            'contact_no' => '6456456450',
            'gender' => 'female',
            'email' => 'ecommerce1@user.com',
            'username' => 'ecommerce1@user.com',
            'password' => Hash::make('password'),
            'description' => 'this is user'
        ]]);


    }
}
