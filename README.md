# Raja2025 ERP

**Raja2025** adalah sistem ERP internal berbasis Laravel 12 + Livewire yang dirancang untuk pengelolaan aset, modul master, dan otentikasi RBAC.

## ✅ Fitur Aktif

### Master Data
- **Kategori Aset**: CRUD via Livewire (`AssetCategoryManager`)
- **Tipe Aset**: CRUD via Livewire (`AssetTypeManager`)
- **Vendor**: CRUD via Livewire (`VendorManager`)
- **Lokasi**: CRUD via Livewire (`LocationManager`)

### Teknologi
- Laravel 12 (dengan auto-booting via `bootstrap/app.php`)
- Laravel Breeze (auth + session layout)
- Livewire v3 (komponen Livewire full-stack)
- Spatie Permission (RBAC roles & permissions)
- TailwindCSS (dari Breeze)

## 📂 Struktur Proyek (utama)
```
app/
└── Livewire/
    └── Master/
        ├── AssetManagement/
        │   ├── AssetCategoryManager.php
        │   └── AssetTypeManager.php
        └── Core/
            ├── VendorManager.php
            └── LocationManager.php

resources/views/
├── components/layouts/app.blade.php
└── pages/
    └── master/
        ├── asset-categories/index.blade.php
        ├── asset-types/index.blade.php
        ├── vendors/index.blade.php
        └── locations/index.blade.php
```

## ⚙️ Instalasi
```bash
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## 👤 Login Default
Email: `admin@example.com` (jika disiapkan di seeder)  
Password: `password`