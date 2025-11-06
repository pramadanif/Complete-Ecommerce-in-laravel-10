<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostTag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['title' => 'Fashion', 'slug' => 'fashion'],
            ['title' => 'Style', 'slug' => 'style'],
            ['title' => 'Trends', 'slug' => 'trends'],
            ['title' => 'Shopping', 'slug' => 'shopping'],
            ['title' => 'Lifestyle', 'slug' => 'lifestyle'],
            ['title' => 'Accessories', 'slug' => 'accessories'],
            ['title' => 'Clothing', 'slug' => 'clothing'],
        ];

        foreach ($tags as $tag) {
            PostTag::create([
                'title' => $tag['title'],
                'slug' => $tag['slug'],
                'status' => 'active',
            ]);
        }
    }
}