✅ Step-by-Step Pengembangan Sistem Asset Management
📌 PHASE 1 — Setup & Perancangan
Buat ERD & Skema Database

Buat Migration Laravel

Buat Seeder (kategori, tipe, lokasi, vendor, dummy asset)

Setup Laravel project & konfigurasi auth (Jetstream/Breeze)

Setup struktur folder & modul

📌 PHASE 2 — Modul Master Data
CRUD Asset Categories

CRUD Asset Types

CRUD Vendors

CRUD Locations

CRUD Users / integrasi user internal

📌 PHASE 3 — Modul Aset Utama
CRUD Assets (form + listing)

Form dinamis berdasarkan kategori (IT/Non-IT)

Input detail it_asset_details & nonit_asset_details

Upload foto/file lampiran aset (opsional)

📌 PHASE 4 — Modul Penugasan & Pergerakan
CRUD Asset Assignments

Auto-assign dari form aset

Tracking histori assignment per aset

CRUD Asset Lifecycles

Update status + lokasi → simpan lifecycle

📌 PHASE 5 — Maintenance
CRUD Asset Maintenances

Tambahkan next_due_date maintenance

Reminder logic untuk maintenance rutin

📌 PHASE 6 — Audit
CRUD Asset Audit Schedules

Form checklist audit fisik

Update status jika tidak cocok

CRUD Asset Audits (log perubahan manual)

📌 PHASE 7 — Disposal
Tombol Disposal Aset (ubah status, is_active)

Isi disposal_date

Optional: Workflow approval (GA/Manager)

📌 PHASE 8 — Fitur Pendukung
Generate & cetak QR Code

Scan QR → tampilkan detail aset

Import bulk aset dari Excel

Export aset ke Excel/PDF

Reminder otomatis (scheduler Laravel)

Filter & pencarian canggih (by lokasi, user, SN, status)

📌 PHASE 9 — Role & Akses
Setup role: Admin, GA, IT, Auditor, Viewer

Proteksi modul berdasarkan peran

Middleware & policy Laravel

📌 PHASE 10 — Finalisasi & Pelaporan
Dashboard ringkas: total aset, status, lokasi

Laporan aset aktif, idle, disposal, overdue maintenance

UAT testing & bug fixing

Deploy ke production
