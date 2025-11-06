<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::where('is_parent', 1)->get();
        $brands = Brand::all();
        $faker = Faker::create();

        // Realistic product names for fashion/clothing e-commerce
        $productNames = [
            'Classic Cotton T-Shirt',
            'Slim Fit Denim Jeans',
            'Leather Crossbody Bag',
            'Casual Sneakers',
            'Wool Blend Sweater',
            'Floral Summer Dress',
            'Oxford Button-Down Shirt',
            'High-Waist Trousers',
            'Leather Ankle Boots',
            'Quilted Jacket',
            'Striped Polo Shirt',
            'Chino Shorts',
            'Canvas Backpack',
            'Running Shoes',
            'Knit Cardigan',
            'Maxi Skirt',
            'Hooded Sweatshirt',
            'Cargo Pants',
            'Suede Loafers',
            'Bomber Jacket',
            'V-Neck Blouse',
            'Pleated Midi Skirt',
            'Tote Bag',
            'Athletic Joggers',
            'Cashmere Scarf',
            'Denim Jacket',
            'Printed Midi Dress',
            'Chelsea Boots',
            'Puffer Vest',
            'Linen Shirt',
        ];

        // Get all product photos from storage
        $photoFiles = [
            '/storage/photos/1/Products/0122b-wsd000t.jpg',
            '/storage/photos/1/Products/01bc5-mpd006b.jpg',
            '/storage/photos/1/Products/01f42-pwt004b.jpg',
            '/storage/photos/1/Products/02090-pms003a.jpg',
            '/storage/photos/1/Products/032f0-image3xxl-1-.jpg',
            '/storage/photos/1/Products/0455e-c1.jpg',
            '/storage/photos/1/Products/04776-pms000a.jpg',
            '/storage/photos/1/Products/04ec4-pmtk001t.jpg',
            '/storage/photos/1/Products/07e30-mtk006b.jpg',
            '/storage/photos/1/Products/086c2-a1.jpg',
            '/storage/photos/1/Products/08ec9-n3.jpg',
            '/storage/photos/1/Products/093a2-4_2.jpg',
            '/storage/photos/1/Products/09a16-mpd000t_6.jpg',
            '/storage/photos/1/Products/0a402-image4xxl-3-.jpg',
            '/storage/photos/1/Products/0bc05-pwt000a.jpg',
            '/storage/photos/1/Products/0c2d2-wbk012c-royal-blue.jpg',
            '/storage/photos/1/Products/0c88d-mtk009a.jpg',
            '/storage/photos/1/Products/0dfc6-mtk000b.jpg',
            '/storage/photos/1/Products/10551-pmtk006a.jpg',
            '/storage/photos/1/Products/11f4f-image1xxl.jpg',
            '/storage/photos/1/Products/127dd-image2xxl-1-.jpg',
            '/storage/photos/1/Products/18b18-wbk003b.jpg',
            '/storage/photos/1/Products/1a69c-image3xxl-4-.jpg',
            '/storage/photos/1/Products/1d3f9-mtk009b.jpg',
            '/storage/photos/1/Products/1d60f-2.jpg',
            '/storage/photos/1/Products/1ddb2-9.jpg',
            '/storage/photos/1/Products/1f9e4-v3.jpg',
            '/storage/photos/1/Products/21951-image4xxl.jpg',
            '/storage/photos/1/Products/2282b-wsd008t.jpg',
            '/storage/photos/1/Products/22b80-image1xxl-2-.jpg',
        ];

        for ($i = 0; $i < 30; $i++) {
            $category = $categories->random();
            $subCategories = Category::where('parent_id', $category->id)->get();
            $title = $productNames[$i];
            
            Product::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'summary' => $faker->sentence(15),
                'description' => $faker->paragraph(5),
                'photo' => $photoFiles[$i],
                'stock' => $faker->numberBetween(10, 100),
                'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
                'condition' => $faker->randomElement(['default', 'new', 'hot']),
                'status' => 'active',
                'price' => $faker->randomFloat(2, 10, 500),
                'discount' => $faker->randomFloat(2, 0, 20),
                'is_featured' => $faker->boolean(30),
                'cat_id' => $category->id,
                'child_cat_id' => $subCategories->isNotEmpty() ? $subCategories->random()->id : null,
                'brand_id' => $brands->random()->id,
            ]);
        }
    }
}
