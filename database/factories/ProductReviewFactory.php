<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductReview>
 */
class ProductReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'product_id' => null,
            'rate' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->optional(0.8)->paragraph(2),
            'status' => 'active',
        ];
    }
}
