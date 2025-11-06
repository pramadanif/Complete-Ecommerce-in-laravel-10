<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->words(2, true);
        return [
            'title' => ucfirst($title),
            'slug' => Str::slug($title),
            'summary' => $this->faker->sentence(10),
            'photo' => 'https://via.placeholder.com/400x300',
            'is_parent' => 1,
            'parent_id' => null,
            'added_by' => null,
            'status' => 'active',
        ];
    }
}
