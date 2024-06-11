<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'category_cat_id' => rand(8,9),
            'type_product_id' => rand(1,2),
            'cod_prod' => rand(1000, 9995),
            'sku_id' => 'K-'.rand(100,10000),
            'name' => fake()->name,
            'price_brl' => fake()->numberBetween(100, 1563),
            'price_usd' => fake()->numberBetween(100, 1563),
            'weight' => fake()->numberBetween(100, 1563),
            'stock' => fake()->numberBetween(100, 10000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
