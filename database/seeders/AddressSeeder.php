<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++){
            Address::insert([
                'user_id'=>$i,
                'address'=>'Ahmedabad',
                'city_id'=>1,
                'state_id'=>1,
                'country_id'=>1,
                'zipcode'=>'380038'
            ]);
        }
    }
}
