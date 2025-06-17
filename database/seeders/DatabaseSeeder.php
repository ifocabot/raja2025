<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ✅ 1. Setup fixed roles and permissions
        $this->call(RolePermissionSeeder::class);

        // ✅ 2. Seed data master via factory
        \App\Models\AssetManagement\AssetCategory::factory(2)->create();
        \App\Models\AssetManagement\AssetType::factory(5)->create();
        \App\Models\Core\Vendor::factory(5)->create();
        \App\Models\Core\Location::factory(3)->create();

        // ✅ 3. Seed users with roles (assigned automatically in UserFactory)
        \App\Models\Core\User::factory(10)->create();

        // ✅ 4. Generate assets with random associations
        \App\Models\AssetManagement\Asset::factory(20)->create();
    }
}
