<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [91=>'india',61=>'australia',44=>'england',27=>'south africa',971=>'U.A.E',1=>'U.S.A'];
        foreach ($countries as $key=>$count)
        {
            Country::insert([
                'name'=>$count,
                'country_code'=>$key
            ]);
        }
    }
}
