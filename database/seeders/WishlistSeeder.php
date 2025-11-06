<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wishlist;
use App\Models\Product;
use App\User;
use Faker\Factory as Faker;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $users = User::where('role', 'user')->get();
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            $product = $products->random();
            $quantity = $faker->numberBetween(1, 3);
            $price = $product->price;
            
            Wishlist::create([
                'product_id' => $product->id,
                'cart_id' => null,
                'user_id' => $users->random()->id,
                'price' => $price,
                'quantity' => $quantity,
                'amount' => $price * $quantity,
            ]);
        }
    }
}
