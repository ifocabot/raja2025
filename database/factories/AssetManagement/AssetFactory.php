<?php

namespace Database\Factories\AssetManagement;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = \App\Models\AssetManagement\AssetCategory::inRandomOrder()->first();
        return [
            'name' => $this->faker->word(),
            'category_id' => $category->id,
            'type_id' => \App\Models\AssetManagement\AssetType::where('category_id', $category->id)->inRandomOrder()->first()->id,
            'vendor_id' => \App\Models\Core\Vendor::inRandomOrder()->first()->id,
            'location_id' => \App\Models\Core\Location::inRandomOrder()->first()->id,
            'owner_id' => \App\Models\Core\User::inRandomOrder()->first()->id,
            'purchase_date' => $this->faker->date(),
            'price' => $this->faker->randomFloat(2, 500, 10000),
            'condition' => $this->faker->randomElement(['baik', 'rusak', 'perlu perbaikan']),
            'status' => $this->faker->randomElement(['aktif', 'non-aktif']),
            'tag_number' => strtoupper(Str::random(8)),
            'disposal_date' => null,
            'is_active' => true,
            'notes' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
