<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\User;
use App\Models\Shipping;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $shippings = Shipping::all();
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            Order::create([
                'order_number' => 'ORD-' . strtoupper($faker->unique()->bothify('??###??')),
                'user_id' => $users->random()->id,
                'sub_total' => $faker->randomFloat(2, 50, 500),
                'shipping_id' => $shippings->random()->id,
                'coupon' => $faker->optional(0.3)->randomFloat(2, 5, 50),
                'total_amount' => $faker->randomFloat(2, 50, 550),
                'quantity' => $faker->numberBetween(1, 5),
                'payment_method' => $faker->randomElement(['cod', 'paypal']),
                'payment_status' => $faker->randomElement(['paid', 'unpaid']),
                'status' => $faker->randomElement(['new', 'process', 'delivered', 'cancel']),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'phone' => $faker->phoneNumber,
                'country' => $faker->country,
                'post_code' => $faker->postcode,
                'address1' => $faker->streetAddress,
                'address2' => $faker->optional()->secondaryAddress,
            ]);
        }
    }
}
