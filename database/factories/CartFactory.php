<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 10, 200);
        $quantity = $this->faker->numberBetween(1, 5);
        return [
            'product_id' => null,
            'order_id' => null,
            'user_id' => null,
            'price' => $price,
            'status' => $this->faker->randomElement(['new', 'progress', 'delivered', 'cancel']),
            'quantity' => $quantity,
            'amount' => $price * $quantity,
        ];
    }
}
