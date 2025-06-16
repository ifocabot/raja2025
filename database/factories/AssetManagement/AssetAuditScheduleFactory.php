<?php

namespace Database\Factories\AssetManagement;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssetAuditSchedule>
 */
class AssetAuditScheduleFactory extends Factory
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
            'scheduled_date' => now()->addDays(30),
            'audit_method' => 'manual',
            'status_audit' => 'pending',
            'audit_notes' => null,
            'audited_by' => null,
            'audited_at' => null
        ];
    }

}
