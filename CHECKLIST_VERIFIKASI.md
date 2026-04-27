# ✅ CHECKLIST VERIFIKASI - Deadline SPMB Setup

## 🔍 Pre-Launch Verification

### File yang Dibuat
- [x] `app/Filament/Resources/SiteSettingResource/Pages/ManageSPMBDeadline.php`
  - ✓ PHP Syntax valid
  - ✓ Class extends Page
  - ✓ Form schema lengkap
  - ✓ Save logic ada

- [x] `resources/views/filament/resources/site-setting-resource/pages/manage-spmb-deadline.blade.php`
  - ✓ File created
  - ✓ Template structure ok

- [x] `resources/views/filament/resources/site-setting-resource/pages/spmb-info.blade.php`
  - ✓ File created
  - ✓ Info component ok

### File yang Dimodifikasi
- [x] `app/Filament/Resources/SiteSettingResource.php`
  - ✓ Route ditambahkan ke getPages()
  - ✓ Import Pages\ManageSPMBDeadline ada
  - ✓ PHP Syntax valid

- [x] `app/Filament/Resources/SiteSettingResource/Pages/ListSiteSettings.php`
  - ✓ Header action ditambahkan
  - ✓ Button styling ok (success/green)
  - ✓ Icon dan label benar

---

## 🧪 Testing Workflow

### Fase 1: Database & Routing
- [ ] Jalankan `php artisan migrate` (jika belum)
- [ ] Verifikasi tabel `site_settings` ada
- [ ] Check apakah file migration: `database/migrations/*_create_site_settings_table.php` ada

### Fase 2: Filament Menu Access
- [ ] Login ke Filament Admin Panel
- [ ] Buka: Pengaturan → Setting Website
- [ ] Tombol "⏱️ Atur Deadline SPMB" muncul (hijau)
- [ ] Klik tombol → Halaman baru terbuka
- [ ] URL: `/admin/site-settings/spmb-deadline`

### Fase 3: Form Functionality
- [ ] Field "Waktu Berakhir Pendaftaran SPMB" muncul
- [ ] DateTimePicker berfungsi (bisa klik & pilih)
- [ ] Field "Tampilan Countdown" menampilkan preview
- [ ] Info box menampilkan info countdown
- [ ] Tombol "Simpan Pengaturan" ada & muncul

### Fase 4: Save & Database
- [ ] Isi form dengan tanggal: 31 Dec 2026, Jam: 23:59
- [ ] Klik "Simpan Pengaturan"
- [ ] Notifikasi "Berhasil" muncul
- [ ] Cek database: `SELECT * FROM site_settings WHERE key='spmb_deadline'`
  - Value harus: `2026-12-31 23:59:00`

### Fase 5: Home Page Integration
- [ ] Buka halaman home: `/` (homepage)
- [ ] Scroll ke section countdown (sebelum "Kenapa Memilih As-Syams?")
- [ ] Countdown section muncul dengan data baru
- [ ] Tampil: "Batas Akhir: Kamis, 31 Desember 2026, 23:59 WIB"
- [ ] Countdown terus berjalan (numbers berubah setiap detik)

### Fase 6: Real-Time Update Test
- [ ] Buka halaman home di browser A
- [ ] Buka Filament di browser B
- [ ] Edit deadline di browser B ke tanggal berbeda (contoh: 28 Feb 2026, 17:00)
- [ ] Simpan di browser B
- [ ] Refresh browser A (halaman home)
- [ ] Countdown di browser A berubah ke data baru

### Fase 7: Edit Test
- [ ] Kembali ke Filament → Pengaturan → Setting Website
- [ ] Klik tombol "⏱️ Atur Deadline SPMB" lagi
- [ ] Form sudah terisi dengan nilai lama (Feb 28)
- [ ] Ubah ke tanggal baru (contoh: 15 March 2026)
- [ ] Simpan
- [ ] Home page update otomatis

---

## 🚨 Troubleshooting Checklist

### Jika Tombol Tidak Muncul
- [ ] File `ListSiteSettings.php` sudah di-edit benar?
- [ ] Clear cache: `php artisan cache:clear`
- [ ] Clear Filament cache: `php artisan filament:cache-components`
- [ ] Reload browser (hard refresh: Ctrl+Shift+R)

### Jika Halaman Tidak Terbuka
- [ ] File `ManageSPMBDeadline.php` ada di folder yang benar?
- [ ] Route di `SiteSettingResource.php` sudah ditambahkan?
- [ ] Check error log: `storage/logs/laravel.log`
- [ ] Cek apakah ada typo di class name atau namespace

### Jika Form Tidak Muncul
- [ ] File `manage-spmb-deadline.blade.php` ada?
- [ ] File `spmb-info.blade.php` ada?
- [ ] Folder path benar: `resources/views/filament/resources/site-setting-resource/pages/`

### Jika Data Tidak Tersimpan
- [ ] Database connection ok?
- [ ] Tabel `site_settings` ada dan punya kolom: `key`, `value`?
- [ ] Lihat console browser: ada error JS?
- [ ] Check error log Laravel

### Jika Home Page Tidak Update
- [ ] Refresh halaman (Ctrl+F5)?
- [ ] Check variable `$deadline` tersedia di home.blade.php?
- [ ] Kode countdown AlpineJS masih ada?
- [ ] Cek console browser: ada error JS?

---

## 🎯 Expected Results

### Sebelum Setup
```
Home page memiliki countdown section
Tapi deadline fixed/hardcoded di web.php:
$deadline = now()->endOfYear()->format('Y-m-d H:i:s');
```

### Sesudah Setup
```
Home page countdown section menggunakan data dari database
Bisa di-edit dari Filament Admin Panel
Perubahan langsung terlihat di halaman home
```

---

## 📋 Dokumentasi Pendukung

Sudah dibuat (file di root project):
- [x] `QUICK_START_SPMB.md` - Panduan cepat (60 detik)
- [x] `DOKUMENTASI_SPMB_DEADLINE.md` - Dokumentasi lengkap
- [x] `SUMMARY_PERUBAHAN.md` - Technical summary
- [x] `PREVIEW_MENU_SPMB.html` - Visual preview

---

## 🚀 Go Live Checklist

Sebelum production:
- [ ] Semua testing checklist sudah pass
- [ ] No error di `storage/logs/laravel.log`
- [ ] No error di browser console
- [ ] Database backup sudah dibuat
- [ ] Training/komunikasi ke admin sudah dilakukan

---

## 📝 Notes untuk Admin

Komunikasikan ke admin:
- ✅ Ada menu baru di Filament: "Pengaturan → Deadline SPMB"
- ✅ Atau klik tombol hijau di halaman "Setting Website"
- ✅ Tinggal pilih tanggal dan jam, kemudian simpan
- ✅ Countdown di halaman depan update otomatis
- ✅ Bisa diubah kapan saja (tidak perlu developer)

---

**Last Updated:** 27 April 2026  
**Status:** ✅ Ready for Testing
