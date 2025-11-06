<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Nike', 'Adidas', 'Samsung', 'Apple', 'Sony', 'LG', 'Zara', 'H&M'];
        
        foreach ($brands as $brand) {
            Brand::create([
                'title' => $brand,
                'slug' => strtolower($brand),
                'status' => 'active',
            ]);
        }
    }
}
