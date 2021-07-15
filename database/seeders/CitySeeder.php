<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = 'non_metro';

        $city = ['Ahmedabad','Bhavanagar','Surat','Rajkot','Baroda'];
        foreach ($city as $count)
        {
            $type = $city == 'Ahmedabad' ? 'metro':'non_metro';
            City::insert([
                'name'=>$count,
                'state_id'=>1,
                'city_type'=>$type,
            ]);
        }
    }
}
