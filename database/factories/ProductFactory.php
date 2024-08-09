<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>fake()->company(),
            'category_id' =>Category::factory(),
            'image' =>fake()->imageUrl(),
            'price' =>rand(100, 1000),
            'contact' =>fake()->phoneNumber(),
            'email' =>fake()->safeEmail()
        ];
    }
}
