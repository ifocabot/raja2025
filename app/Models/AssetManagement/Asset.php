<?php

namespace App\Models\AssetManagement;

use App\Models\Core\Location;
use App\Models\Core\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\AssetManagement\AssetCategory;
use App\Models\AssetManagement\AssetType;
use App\Models\AssetManagement\AssetDetailIT;
use App\Models\AssetManagement\AssetDetailNonIT;
use App\Models\AssetManagement\AssetAssignment;

class Asset extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'code',
        'name',
        'category',
        'asset_category_id',
        'asset_type_id',
        'vendor_id',
        'location_id',
        'purchase_date',
        'status',
    ];

    // ✅ Konfigurasi logging
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name', 'code', 'category', 'status', 'vendor_id', 'location_id', 'purchase_date'
            ])
            ->logOnlyDirty()
            ->useLogName('asset');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Aset {$this->name} telah {$eventName}";
    }

    // 🔗 Relasi lainnya tetap seperti sebelumnya...
    public function category() { return $this->belongsTo(AssetCategory::class, 'asset_category_id'); }
    public function type() { return $this->belongsTo(AssetType::class, 'asset_type_id'); }
    public function vendor() { return $this->belongsTo(Vendor::class); }
    public function location() { return $this->belongsTo(Location::class); }
    public function itDetail() { return $this->hasOne(AssetDetailIT::class); }
    public function nonItDetail() { return $this->hasOne(AssetDetailNonIT::class); }
    public function assignments() { return $this->hasMany(AssetAssignment::class); }
    public function maintenances() { return $this->hasMany(AssetMaintenance::class); }
    public function auditSchedules() { return $this->hasMany(AssetAuditSchedule::class); }
    public function audits() { return $this->hasMany(AssetAudit::class); }
}

