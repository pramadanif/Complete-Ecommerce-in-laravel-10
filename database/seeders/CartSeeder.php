<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\User;
use Faker\Factory as Faker;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $orders = Order::all();
        $users = User::where('role', 'user')->get();
        $faker = Faker::create();

        for ($i = 0; $i < 40; $i++) {
            $product = $products->random();
            $quantity = $faker->numberBetween(1, 5);
            $price = $product->price;
            
            Cart::create([
                'product_id' => $product->id,
                'order_id' => $orders->random()->id,
                'user_id' => $users->random()->id,
                'price' => $price,
                'status' => $faker->randomElement(['new', 'progress', 'delivered', 'cancel']),
                'quantity' => $quantity,
                'amount' => $price * $quantity,
            ]);
        }
    }
}
