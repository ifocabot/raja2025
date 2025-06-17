<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Master\Core\{LocationManager, VendorManager};

Route::prefix('master/core')->middleware('auth')->group(function () {
    Route::get('locations', LocationManager::class)->name('master.core.locations');
    Route::get('vendors', VendorManager::class)->name('master.core.vendors');
});
