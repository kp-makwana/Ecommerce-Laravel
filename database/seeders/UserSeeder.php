<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'role'=>'admin',
            'f_name'=>'Ecommerce',
            'l_name'=>'Admin',
            'dob'=>'2021-06-18',
            'country_code'=>'+91',
            'contact_no'=>'9876543210',
            'gender'=>'male',
            'email'=>'ecommerce@admin.com',
            'username'=>'ecommerce@admin.com',
            'password'=>Hash::make('password'),
            'description'=>'this is admin'
        ],[
            'role'=>'user',
            'f_name'=>'Ecommerce',
            'l_name'=>'user',
            'dob'=>'2021-06-18',
            'country_code'=>'+91',
            'contact_no'=>'9876543211',
            'gender'=>'female',
            'email'=>'ecommerce@user.com',
            'username'=>'ecommerce@user.com',
            'password'=>Hash::make('password'),
            'description'=>'this is user'
        ]]);


    }
}
