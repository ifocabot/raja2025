<?php

namespace Database\Factories\AssetManagement;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssetManagement\AssetDetailIT>
 */
class AssetDetailITFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'asset_id' => \App\Models\AssetManagement\Asset::factory(),
            'brand' => $this->faker->company(),
            'model' => $this->faker->word(),
            'serial_number' => strtoupper(string: Str::random(10)),
            'os' => 'Windows 11',
            'cpu' => 'Intel i5',
            'ram' => '16GB',
            'storage' => '512GB SSD',
            'mac_address' => $this->faker->macAddress(),
            'ip_address' => $this->faker->ipv4(),
            'license_key' => strtoupper(Str::random(16)),
            'warranty_expiry_date' => now()->addYear()
        ];
    }

}
