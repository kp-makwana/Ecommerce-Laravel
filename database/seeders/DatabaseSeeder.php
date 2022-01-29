<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\ProductImage;
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
        $this->call([ProductImageSeeder::class]);
        \App\Models\ProductRating::factory(10)->create();
        $this->call([OrderStatusSeeder::class]);
        $this->call([OrderSeeder::class]);
        $this->call([OrderDetailsSeeder::class]);
        $this->call([OfferSeeder::class]);
        $this->call([DeliveryAddressSeeder::class]);
    }
}
