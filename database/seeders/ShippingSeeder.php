<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shipping;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shippings = [
            ['type' => 'Standard Shipping', 'price' => 5.00],
            ['type' => 'Express Shipping', 'price' => 15.00],
            ['type' => 'Same Day Delivery', 'price' => 25.00],
        ];

        foreach ($shippings as $shipping) {
            Shipping::create([
                'type' => $shipping['type'],
                'price' => $shipping['price'],
                'status' => 'active',
            ]);
        }
    }
}
