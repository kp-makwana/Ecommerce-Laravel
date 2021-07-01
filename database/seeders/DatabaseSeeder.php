<?php

namespace Database\Seeders;

use App\Models\CityType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([UserSeeder::class]);
        $this->call([CountrySeeder::class]);
        $this->call([StateSeeder::class]);
        $this->call([CitySeeder::class]);
        $this->call([AddressSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([BrandSeeder::class]);
        $this->call([ProductTypeSeeder::class]);
        $this->call([ProductSeeder::class]);

    }
}
