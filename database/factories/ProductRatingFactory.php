<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductRating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProductRatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductRating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'product_id' => Product::all()->random()->id,
            'rating' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'title' => $this->faker->word(),
        ];
    }
}
