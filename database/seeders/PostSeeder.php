<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $admin = User::where('role', 'admin')->first();
        $categories = PostCategory::all();
        $tags = PostTag::all();

        $posts = [
            [
                'title' => '10 Must-Have Fashion Items for This Season',
                'photo' => '/storage/photos/1/Blog/blog1.jpg',
                'summary' => 'Discover the essential fashion pieces you need in your wardrobe this season.',
            ],
            [
                'title' => 'How to Style Your Casual Wear',
                'photo' => '/storage/photos/1/Blog/blog2.jpg',
                'summary' => 'Learn the art of styling casual outfits for any occasion.',
            ],
            [
                'title' => 'The Ultimate Guide to Accessorizing',
                'photo' => '/storage/photos/1/Blog/blog3.jpg',
                'summary' => 'Complete your look with the perfect accessories. Here\'s how.',
            ],
            [
                'title' => 'Sustainable Fashion: What You Need to Know',
                'photo' => '/storage/photos/1/Blog/blog-single1.jpg',
                'summary' => 'Explore the world of sustainable and eco-friendly fashion choices.',
            ],
            [
                'title' => 'Winter Fashion Trends 2024',
                'photo' => '/storage/photos/1/Blog/61+GUTSPxaL._SY450_.jpg',
                'summary' => 'Stay warm and stylish with these winter fashion trends.',
            ],
        ];

        foreach ($posts as $post) {
            Post::create([
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'summary' => $post['summary'],
                'description' => $faker->paragraphs(5, true),
                'photo' => $post['photo'],
                'quote' => $faker->sentence(10),
                'tags' => $tags->random()->slug,
                'post_cat_id' => $categories->random()->id,
                'post_tag_id' => $tags->random()->id,
                'added_by' => $admin->id,
                'status' => 'active',
            ]);
        }
    }
}