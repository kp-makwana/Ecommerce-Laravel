<?php

namespace Database\Seeders;

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
        $countries = [91=>'India',61=>'Australia',44=>'England',27=>'South Africa',971=>'U.A.E',1=>'U.S.A'];
        foreach ($countries as $key=>$count)
        {
            DB::table('countries')->insert([
                'name'=>$count,
                'country_code'=>$key
            ]);
        }
    }
}
