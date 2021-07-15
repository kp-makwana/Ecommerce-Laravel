<?php

namespace Database\Seeders;

use App\Models\CityType;
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
            CityType::insert([
                'name'=>$count,
            ]);
        }
    }
}
