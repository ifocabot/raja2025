<?php

namespace Database\Factories\AssetManagement;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AssetManagement\AssetCategory;
use App\Models\AssetManagement\FunctionalGroup;

/**
 * @extends Factory<\App\Models\AssetManagement\AssetType>
 */
class AssetTypeFactory extends Factory
{
    public function definition(): array
    {
        $category = AssetCategory::inRandomOrder()->first() ?? AssetCategory::factory()->create();
        $functionalGroup = FunctionalGroup::inRandomOrder()->first() ?? FunctionalGroup::factory()->create();

        return [
            'name' => ucfirst($this->faker->words(2, true)), // Contoh: "Power Unit"
            'category_id' => $category->id,
            'functional_group_id' => $functionalGroup->id,
        ];
    }
}
