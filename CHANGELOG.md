# 📦 CHANGELOG — Raja2025 ERP

Semua perubahan besar yang tercatat dalam proyek ini.

---

## [v0.1.0] - 2025-06-18
### Added
- Inisialisasi proyek Laravel 12 dengan Breeze dan Livewire
- Setup RBAC menggunakan Spatie Laravel Permission
- Seeder awal untuk roles dan permissions
- Komponen Livewire:
  - AssetCategoryManager
  - AssetTypeManager
  - VendorManager
  - LocationManager
- Blade view untuk masing-masing modul (mengikuti struktur pages/master)
- Layout berbasis slot `<x-layouts.app>` dipindah ke `components/layouts/app.blade.php`

### Changed
- Struktur folder `resources/views` disesuaikan ke standar modular (pages/master)
- Model `AssetCategory` diberi `$fillable = ['name']` untuk menghindari mass assignment error
- Layout Blade dari `@extends` diganti ke `<x-layouts.app>` agar konsisten dengan komponen

### Fixed
- Perbaikan error mass assignment di `AssetCategory`
- Validasi form Livewire untuk field `name`
- Route modular di-include secara eksplisit via RouteServiceProvider

---