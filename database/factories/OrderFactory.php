<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => 'ORD-' . strtoupper($this->faker->unique()->bothify('??###??')),
            'user_id' => null,
            'sub_total' => $this->faker->randomFloat(2, 50, 500),
            'shipping_id' => null,
            'coupon' => $this->faker->optional(0.3)->randomFloat(2, 5, 50),
            'total_amount' => $this->faker->randomFloat(2, 50, 550),
            'quantity' => $this->faker->numberBetween(1, 5),
            'payment_method' => $this->faker->randomElement(['cod', 'paypal']),
            'payment_status' => $this->faker->randomElement(['paid', 'unpaid']),
            'status' => $this->faker->randomElement(['new', 'process', 'delivered', 'cancel']),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'country' => $this->faker->country,
            'post_code' => $this->faker->postcode,
            'address1' => $this->faker->streetAddress,
            'address2' => $this->faker->optional()->secondaryAddress,
        ];
    }
}
