<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Permission;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        Product::factory(50)->create();
        Permission::factory(7)->create();

        Role::factory()->create([
            'name' => 'Admin',
            'pm_id' => Permission::factory(),
            'slug' => 'a',
        ]);
        Role::factory()->create([
            'name' => 'Moderator',
            'pm_id' => Permission::factory(),
            'slug' => 'm',
        ]);
        Role::factory()->create([
            'name' => 'User',
            'pm_id' => Permission::factory(),
            'slug' => 'u',
        ]);
        Role::factory()->create([
            'name' => 'Vendor',
            'pm_id' => Permission::factory(),
            'slug' => 'v',
        ]);
    }
}
