# 📋 Dokumentasi: Menu Setting Deadline SPMB di Filament

## 🎯 Fitur yang Ditambahkan

Anda sekarang dapat mengatur waktu countdown SPMB langsung dari panel Filament dengan interface yang user-friendly.

## 📍 Lokasi Menu

**Path di Filament:** `Pengaturan → Deadline SPMB`

Atau dari halaman utama Settings Website, klik tombol **"⏱️ Atur Deadline SPMB"** di bagian header.

## 🔧 Fitur Utama

### 1. **Halaman Pengaturan Deadline SPMB**
   - Lokasi: `app/Filament/Resources/SiteSettingResource/Pages/ManageSPMBDeadline.php`
   - Fitur:
     - Date Time Picker untuk memilih tanggal dan jam
     - Preview tampilan countdown seperti di halaman depan
     - Informasi sisa waktu hingga deadline
     - Tombol simpan dengan notifikasi sukses

### 2. **Integrasi Database**
   - Setting disimpan di tabel `site_settings` dengan key: `spmb_deadline`
   - Format: `Y-m-d H:i:s` (ISO 8601)
   - Auto-update menggunakan `updateOrCreate()`

### 3. **Integrasi di Halaman Depan**
   - Countdown otomatis muncul di halaman home (`resources/views/pages/home.blade.php`)
   - Mengambil nilai dari database
   - Menampilkan format: "Batas Akhir: [Tanggal], [Jam] WIB"
   - Countdown real-time menggunakan AlpineJS

## 📁 File yang Dibuat/Dimodifikasi

### File Baru:
1. **`app/Filament/Resources/SiteSettingResource/Pages/ManageSPMBDeadline.php`**
   - Page class untuk manage deadline SPMB

2. **`resources/views/filament/resources/site-setting-resource/pages/manage-spmb-deadline.blade.php`**
   - Template halaman pengaturan

3. **`resources/views/filament/resources/site-setting-resource/pages/spmb-info.blade.php`**
   - Template info box untuk countdown details

### File Dimodifikasi:
1. **`app/Filament/Resources/SiteSettingResource.php`**
   - Tambah route: `'manage-spmb' => Pages\ManageSPMBDeadline::route('/spmb-deadline')`

2. **`app/Filament/Resources/SiteSettingResource/Pages/ListSiteSettings.php`**
   - Tambah header action button untuk akses cepat ke setting SPMB

## 🚀 Cara Menggunakan

### Langkah 1: Akses Menu
```
Login ke Filament Admin Panel
→ Buka menu Pengaturan (Settings)
→ Klik tombol "⏱️ Atur Deadline SPMB" (warna hijau)
```

### Langkah 2: Atur Tanggal dan Waktu
```
1. Klik field "Waktu Berakhir Pendaftaran SPMB"
2. Pilih tanggal yang diinginkan
3. Pilih jam (contoh: 23:59 untuk akhir hari)
4. Perhatikan preview tampilan di bawah
5. Klik tombol "Simpan Pengaturan"
```

### Langkah 3: Verifikasi
```
Halaman depan (Home) akan otomatis menampilkan countdown baru
Countdown akan update real-time setiap detik
```

## 📊 Contoh Data

```php
// Data yang disimpan di database
DB::table('site_settings')->insert([
    'key' => 'spmb_deadline',
    'value' => '2026-12-31 23:59:00',  // 31 Desember 2026 pukul 23:59 WIB
    'created_at' => now(),
    'updated_at' => now(),
]);

// Ditampilkan di halaman home sebagai:
// Batas Akhir: Kamis, 31 Desember 2026, 23:59 WIB
```

## 🔄 Alur Data

```
Filament Admin Panel
    ↓
ManageSPMBDeadline Page (Input form)
    ↓
Save to site_settings table (key: 'spmb_deadline')
    ↓
Route web.php (Fetch dari database)
    ↓
Pass ke view 'pages.home' sebagai variable $deadline
    ↓
Countdown AlpineJS (Real-time update di frontend)
    ↓
Tampil di halaman depan: "SPMB Akan Berakhir Pada: [Countdown]"
```

## 💡 Tips & Trik

### Atur Deadline di Akhir Hari
```
Jam yang disarankan: 23:59 (pukul 11 malam)
Contoh: 2026-12-31 23:59
```

### Timezone
- Semua waktu menggunakan **WIB (Waktu Indonesia Barat)**
- Pastikan timezone server sudah benar di `config/app.php`

### Jika Countdown Sudah Lewat
- Jika deadline < waktu sekarang, countdown tidak akan menampilkan angka negatif
- Tapi ada logika di halaman home untuk menangani kasus ini

## 🐛 Troubleshooting

### Countdown tidak update di halaman depan
**Solusi:**
1. Clear cache: `php artisan cache:clear`
2. Pastikan database sudah di-migrate: `php artisan migrate`
3. Cek apakah setting sudah tersimpan di database

### Form tidak muncul
**Solusi:**
1. Pastikan file `ManageSPMBDeadline.php` sudah dalam folder yang benar
2. Clear cache Filament: `php artisan filament:cache-components`
3. Reload browser (Ctrl+Shift+R / Cmd+Shift+R)

### Tanggal tidak tersimpan
**Solusi:**
1. Pastikan format datetime benar (Y-m-d H:i)
2. Cek permission database
3. Lihat error log di `storage/logs/laravel.log`

## 📚 File Referensi

- **Model:** `app/Models/SiteSetting.php`
- **Migration:** `database/migrations/2025_11_24_202625_create_site_settings_table.php`
- **Home View:** `resources/views/pages/home.blade.php` (baris ~84-90)
- **Web Route:** `routes/web.php` (baris ~54-62)

## 🎨 Customization

### Ubah Label/Deskripsi
Edit file: `app/Filament/Resources/SiteSettingResource/Pages/ManageSPMBDeadline.php`
```php
Forms\Components\Heading::make('Pengaturan Waktu Countdown SPMB')
    ->description('Atur kapan pendaftaran SPMB akan berakhir...')
```

### Ubah Format Tampilan di Home
Edit file: `resources/views/pages/home.blade.php` (baris 90)
```php
{{ \Carbon\Carbon::parse($deadline)->translatedFormat('d F Y, H:i') }} WIB
```

---

**Versi:** 1.0  
**Dibuat:** 27 April 2026  
**Status:** ✅ Ready to Use
