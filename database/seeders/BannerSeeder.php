<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'title' => 'Summer Collection 2024',
                'slug' => 'summer-collection-2024',
                'description' => 'Discover the latest trends in summer fashion. Up to 50% off on selected items.',
                'photo' => '/storage/photos/1/Banner/banner-01.jpg',
            ],
            [
                'title' => 'New Arrivals',
                'slug' => 'new-arrivals',
                'description' => 'Check out our newest products and be the first to own them.',
                'photo' => '/storage/photos/1/Banner/banner-02.jpg',
            ],
            [
                'title' => 'Winter Sale',
                'slug' => 'winter-sale',
                'description' => 'Stay warm with our winter collection. Special discounts available.',
                'photo' => '/storage/photos/1/Banner/banner-03.jpg',
            ],
            [
                'title' => 'Best Sellers',
                'slug' => 'best-sellers',
                'description' => 'Shop our most popular items loved by customers worldwide.',
                'photo' => '/storage/photos/1/Banner/banner-04.jpg',
            ],
            [
                'title' => 'Flash Sale',
                'slug' => 'flash-sale',
                'description' => 'Limited time offer! Grab your favorites before they are gone.',
                'photo' => '/storage/photos/1/Banner/banner-05.jpg',
            ],
            [
                'title' => 'Premium Collection',
                'slug' => 'premium-collection',
                'description' => 'Luxury fashion at its finest. Explore our premium range.',
                'photo' => '/storage/photos/1/Banner/banner-06.jpg',
            ],
            [
                'title' => 'Casual Wear',
                'slug' => 'casual-wear',
                'description' => 'Comfortable and stylish everyday wear for everyone.',
                'photo' => '/storage/photos/1/Banner/banner-07.jpg',
            ],
            [
                'title' => 'Accessories Collection',
                'slug' => 'accessories-collection',
                'description' => 'Complete your look with our stunning accessories.',
                'photo' => '/storage/photos/1/Banner/banner-08.jpg',
            ],
            [
                'title' => 'Clearance Sale',
                'slug' => 'clearance-sale',
                'description' => 'Final markdowns! Up to 70% off on clearance items.',
                'photo' => '/storage/photos/1/Banner/banner-09.jpg',
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create([
                'title' => $banner['title'],
                'slug' => $banner['slug'],
                'description' => $banner['description'],
                'photo' => $banner['photo'],
                'status' => 'active',
            ]);
        }
    }
}