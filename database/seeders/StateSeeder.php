<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = ['Gujarat','Maharashtra','Rajasthan','Chennai'];

        foreach ($state as $count)
        {
            DB::table('states')->insert([
                'name'=>$count,
                'country_id'=>1,
            ]);
        }
    }
}
