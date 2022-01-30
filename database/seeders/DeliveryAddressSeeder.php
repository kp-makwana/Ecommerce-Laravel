<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;

class DeliveryAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryAddress::insert([[
            'user_id' => 2,
            'name' => 'Test user',
            'default_address' => '1',
            'mobile_number' => '9879879878',
            'zipcode' => 382350,
            'country_id' => 1,
            'locality' => 'Thakkarnagar',
            'address' => '1,xyz thakkarnagar ahemdabad-382350',
            'city_id' => 1,
            'state_id' => 1,
            'type' => 'work',
        ], [
            'user_id' => 2,
            'name' => 'Test user',
            'default_address' => 1,
            'mobile_number' => '1231231230',
            'zipcode' => 382350,
            'country_id' => 2,
            'locality' => 'talaja',
            'address' => '1,xyz talaja Bhavnagar-364135',
            'city_id' => 1,
            'state_id' => 1,
            'type' => 'home',
        ]]);
    }
}
