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
    public function definition()
    {
        return [
            'category_id'  => rand(1,10),
            'title'         => $this->faker->word(),
            'slug'          => $this->faker->slug(),
            'sku'           => 'SKU-'.rand(1000,9999),
            'price'         => rand(10,10000),
            'sub_title'     => $this->faker->text(25),
            'description'   => $this->faker->paragraph(),
            'created_at' => now(),
            // 'updated_at' => now(),
        ];
    }
}
