<?php

namespace Database\Factories\AssetManagement;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssetAssignment>
 */
class AssetAssignmentFactory extends Factory
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
            'assigned_to' => \App\Models\Core\User::inRandomOrder()->first()->id,
            'assigned_date' => $this->faker->date(),
            'returned_date' => null
        ];
    }

}
