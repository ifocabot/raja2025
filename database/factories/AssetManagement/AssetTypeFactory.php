<?php

namespace Database\Factories\AssetManagement;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssetType>
 */
class AssetTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category_id' => \App\Models\AssetManagement\AssetCategory::inRandomOrder()->first()->id,
            'functional_group' => $this->faker->word()
        ];
    }
}
