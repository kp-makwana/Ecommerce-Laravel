<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category = ['laptop', 'phone', 'pc', 'tablets'];
        foreach ($category as $data) {
            DB::table('categories')->insert([
                'name' => $data,
            ]);
        }
    }
}
