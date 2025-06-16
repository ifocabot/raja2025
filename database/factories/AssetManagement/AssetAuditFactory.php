<?php

namespace Database\Factories\AssetManagement;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssetAudit>
 */
class AssetAuditFactory extends Factory
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
            'user_id' => \App\Models\Core\User::inRandomOrder()->first()->id,
            'field_changed' => $this->faker->randomElement(['condition', 'status', 'location_id']),
            'old_value' => 'lama',
            'new_value' => 'baru',
            'changed_at' => now(),
            'reason' => $this->faker->sentence()
        ];
    }

}
