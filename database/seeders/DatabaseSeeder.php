<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Existing seeders
        $this->call(UsersTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(CouponSeeder::class);
        
        // New seeders - respecting foreign key constraints
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(PostCategorySeeder::class);
        $this->call(PostTagSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ShippingSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(WishlistSeeder::class);
        $this->call(ProductReviewSeeder::class);
    }
} 