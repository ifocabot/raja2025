<?php

namespace App\Models\AssetManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class AssetMaintenance extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'asset_id',
        'performed_at',
        'performed_by',
        'note',
        'next_due_date',
        'status',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->useLogName('maintenance');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
