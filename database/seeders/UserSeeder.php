<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User photos from storage
        $userPhotos = [
            '/storage/photos/1/users/user1.jpg',
            '/storage/photos/1/users/user2.jpg',
            '/storage/photos/1/users/user3.jpg',
            '/storage/photos/1/users/061aaf107c7e0608674f0c8cc597b71a.jpg',
            '/storage/photos/1/users/2cc83283fa069271e09da6de18a1f837.jpg',
            '/storage/photos/1/users/2e61da4a83ec6889b1e97bc5553f2d9a.jpg',
            '/storage/photos/1/users/311b5f02d402d84aef0781669e81c9de.jpg',
            '/storage/photos/1/users/5a1de433aac4fe620d532763add1de2c.jpg',
            '/storage/photos/1/users/62efb85ab9ffe40a37e951f831114173.jpg',
            '/storage/photos/1/users/6a6a7c98f3629350913a996ef6b7a33f.jpg',
            '/storage/photos/1/users/8c83499208e59be876592b43c1a50035.jpg',
        ];

        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'photo' => $userPhotos[0],
            'role' => 'admin',
            'status' => 'active',
        ]);

        // Create regular users
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'photo' => $userPhotos[($i + 1) % count($userPhotos)],
                'role' => 'user',
                'status' => 'active',
            ]);
        }
    }
}
