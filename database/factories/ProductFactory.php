<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->unique()->words(3, true);
        return [
            'title' => ucfirst($title),
            'slug' => Str::slug($title),
            'summary' => $this->faker->sentence(15),
            'description' => $this->faker->paragraph(5),
            'photo' => 'https://via.placeholder.com/600x400',
            'stock' => $this->faker->numberBetween(10, 100),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'condition' => $this->faker->randomElement(['default', 'new', 'hot']),
            'status' => 'active',
            'price' => $this->faker->randomFloat(2, 10, 500),
            'discount' => $this->faker->randomFloat(2, 0, 20),
            'is_featured' => $this->faker->boolean(30),
            'cat_id' => null,
            'child_cat_id' => null,
            'brand_id' => null,
        ];
    }
}
