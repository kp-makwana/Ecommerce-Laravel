<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = ['metro','non_metro'];
        foreach ($type as $count)
        {
            DB::table('city_types')->insert([
                'name'=>$count,
            ]);
        }
    }
}
