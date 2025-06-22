<?php

namespace App\Models\AssetManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetAuditSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'scheduled_at',
        'scheduled_by',
        'note',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
