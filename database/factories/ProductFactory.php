<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'size' => $this->faker->numberBetween(46, 60),
            'code' => $this->faker->unique()->randomNumber(6),
            'quantity' => $this->faker->randomNumber(2),
            'stock_id' => Stock::factory(),
        ];
    }
}
