<?php

namespace Database\Factories\AssetManagement;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssetDetailNonIT>
 */
class AssetDetailNonITFactory extends Factory
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
            'material' => $this->faker->word(),
            'dimension' => '100x50x40 cm',
            'voltage' => '220V',
            'power_usage' => '150W',
            'location_installed' => $this->faker->city(),
            'maintenance_cycle' => '6 bulan',
            'warranty_expiry_date' => now()->addMonths(12),
            'notes' => $this->faker->sentence(),
        ];
    }
}
