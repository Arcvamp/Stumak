<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Permission;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' =>fake()->randomElement(['Admin', 'Moderator', 'User', 'Vendor']),
            // 'pm_id' => Permission::factory(),
            // 'slug' =>rand(2, 10)
        ];
    }
}
