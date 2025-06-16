<?php

namespace Database\Factories\AssetManagement;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssetMaintenance>
 */
class AssetMaintenanceFactory extends Factory
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
            'maintenance_date' => now()->subDays(rand(10, 100)),
            'performed_by' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'next_due_date' => now()->addMonths(6)
        ];
    }

}
