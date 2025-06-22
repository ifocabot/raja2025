<?php

namespace App\Models\AssetManagement;

use App\Models\Core\Location;
use Illuminate\Database\Eloquent\Model;


class AssetLifecycle extends Model
{
    protected $fillable = [
        'asset_id',
        'previous_status',
        'new_status',
        'previous_location_id',
        'new_location_id',
        'note',
        'changed_at',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function previousLocation()
    {
        return $this->belongsTo(Location::class, 'previous_location_id');
    }

    public function newLocation()
    {
        return $this->belongsTo(Location::class, 'new_location_id');
    }


}
