<?php

namespace App\Models\AssetManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FunctionalGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function assetTypes()
    {
        return $this->hasMany(AssetType::class);
    }
}
