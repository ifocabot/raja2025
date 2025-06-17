<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Master\AssetManagement\{AssetCategoryManager, AssetTypeManager};

Route::prefix('master/assets')->middleware('auth')->group(function () {
    Route::get('categories', AssetCategoryManager::class)->name('master.assets.categories');
    Route::get('types', AssetTypeManager::class)->name('master.assets.types');
});
