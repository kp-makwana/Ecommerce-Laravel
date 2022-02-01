<?php

namespace Database\Seeders;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::insert([[
            'product_id' => 10,
            'offer_name' => 'Flat Discount',
            'offer_price' => 1000,
            'percentage' => 10,
            'status' => 'active',
            'flat_discount' => 500,
            'description' => '13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box',
            'start_date' => Carbon::create('2022', '01', '01'),
            'end_date' => Carbon::create('2022', '12', '31')
        ], [
            'product_id' => 10,
            'offer_name' => 'Flat Discount',
            'offer_price' => 1000,
            'percentage' => 25,
            'status' => 'active',
            'flat_discount' => 1500,
            'description' => '13+2MP Rear camera with AI Portrait, AI scene recognition, HDR, Pro mode | 5MP front facing camera 16.58 centimeters (6.53-inch) HD+ multi-touch capacitive touchscreen with 1600 x 720 pixels resolution, 268 ppi pixel density, 20:9 aspect ratio Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB| Dual SIM with dual standby (4G+4G) Android v10 operating system with 2.3GHz Mediatek Helio G35 octa core processor 5000mAH lithium-polymer battery with 10W wired charger in-box',
            'start_date' => Carbon::create('2022', '01', '01'),
            'end_date' => Carbon::create('2022', '12', '31')
        ]
        ]);
    }
}
