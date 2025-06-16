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
        \App\Models\AssetManagement\AssetCategory::factory(2)->create();
        \App\Models\AssetManagement\AssetType::factory(5)->create();
        \App\Models\Core\User::factory(10)->create();
        \App\Models\Core\Vendor::factory(5)->create();
        \App\Models\Core\Location::factory(3)->create();
        \App\Models\AssetManagement\Asset::factory(20)->create();
    }
}
