<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductReview;
use App\Models\Product;
use App\User;
use Faker\Factory as Faker;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $users = User::where('role', 'user')->get();
        $faker = Faker::create();

        for ($i = 0; $i < 25; $i++) {
            ProductReview::create([
                'user_id' => $users->random()->id,
                'product_id' => $products->random()->id,
                'rate' => $faker->numberBetween(1, 5),
                'review' => $faker->optional(0.8)->paragraph(2),
                'status' => 'active',
            ]);
        }
    }
}
