<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 10, 200);
        $quantity = $this->faker->numberBetween(1, 3);
        return [
            'product_id' => null,
            'cart_id' => null,
            'user_id' => null,
            'price' => $price,
            'quantity' => $quantity,
            'amount' => $price * $quantity,
        ];
    }
}
