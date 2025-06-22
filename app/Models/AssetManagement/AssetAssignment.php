<?php

namespace App\Models\AssetManagement;

use App\Models\Core\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class AssetAssignment extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'asset_id',
        'assigned_to',      // bisa user_id, karyawan_id, atau nama bebas
        'assigned_by',
        'assigned_at',
        'returned_at',
        'note'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['asset_id', 'assigned_to', 'assigned_by', 'assigned_at', 'returned_at'])
            ->logOnlyDirty()
            ->useLogName('assignment');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Aset telah {$eventName} ke {$this->assigned_to}";
    }

    // 🔗 Aset utama
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    // 🔗 Optional: relasi ke user/karyawan
    public function assignedUser()
    {
        return $this->belongsTo(related: User::class, foreignKey: 'assigned_to'); // jika gunakan user_id
    }
}
