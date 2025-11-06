<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\User;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        
        // Create parent categories with photos
        $categories = [
            [
                'title' => 'Men\'s Fashion',
                'slug' => 'mens-fashion',
                'photo' => '/storage/photos/1/Category/mini-banner1.jpg',
                'subcategories' => ['Shirts', 'Pants', 'Shoes', 'Accessories']
            ],
            [
                'title' => 'Women\'s Fashion',
                'slug' => 'womens-fashion',
                'photo' => '/storage/photos/1/Category/mini-banner2.jpg',
                'subcategories' => ['Dresses', 'Tops', 'Bottoms', 'Bags']
            ],
            [
                'title' => 'Sports & Outdoor',
                'slug' => 'sports-outdoor',
                'photo' => '/storage/photos/1/Category/mini-banner3.jpg',
                'subcategories' => ['Athletic Wear', 'Footwear', 'Equipment', 'Outdoor Gear']
            ],
        ];

        foreach ($categories as $cat) {
            $parent = Category::create([
                'title' => $cat['title'],
                'slug' => $cat['slug'],
                'summary' => 'Explore our collection of ' . $cat['title'],
                'photo' => $cat['photo'],
                'is_parent' => 1,
                'parent_id' => null,
                'added_by' => $admin->id,
                'status' => 'active',
            ]);

            // Create subcategories
            foreach ($cat['subcategories'] as $subcat) {
                Category::create([
                    'title' => $subcat,
                    'slug' => strtolower(str_replace([' ', '\''], ['-', ''], $subcat)),
                    'summary' => 'Browse our ' . $subcat . ' collection',
                    'photo' => null,
                    'is_parent' => 0,
                    'parent_id' => $parent->id,
                    'added_by' => $admin->id,
                    'status' => 'active',
                ]);
            }
        }
    }
}
