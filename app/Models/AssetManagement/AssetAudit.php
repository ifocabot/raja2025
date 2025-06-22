<?php

namespace App\Models\AssetManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class AssetAudit extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'asset_id',
        'audited_by',
        'audited_at',
        'status',
        'note',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->useLogName('audit');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
