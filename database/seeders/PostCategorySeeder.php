<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostCategory;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Fashion Trends', 'slug' => 'fashion-trends'],
            ['title' => 'Style Guide', 'slug' => 'style-guide'],
            ['title' => 'Shopping Tips', 'slug' => 'shopping-tips'],
            ['title' => 'New Arrivals', 'slug' => 'new-arrivals'],
            ['title' => 'Seasonal Collection', 'slug' => 'seasonal-collection'],
        ];

        foreach ($categories as $category) {
            PostCategory::create([
                'title' => $category['title'],
                'slug' => $category['slug'],
                'status' => 'active',
            ]);
        }
    }
}