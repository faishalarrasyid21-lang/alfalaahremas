# 📁 PANDUAN SETUP GOOGLE DRIVE UNTUK KEGIATAN REMAS

## 🎯 **Fitur Google Drive Integration**

Website REMAS sekarang memiliki fitur link ke Google Drive untuk setiap kegiatan. Ketika pengunjung mengklik tombol "Lihat Foto Kegiatan", mereka akan langsung dibawa ke folder Google Drive yang berisi semua foto kegiatan tersebut.

## 📋 **Cara Setup Google Drive Links:**

### **1. Buat Folder Google Drive**
```
1. Buka Google Drive (drive.google.com)
2. Buat folder untuk setiap kegiatan
3. Upload semua foto kegiatan ke folder tersebut
4. Atur permission folder menjadi "Anyone with the link can view"
```

### **2. Dapatkan Link Sharing**
```
1. Klik kanan pada folder
2. Pilih "Share" / "Bagikan"
3. Klik "Copy link" / "Salin link"
4. Format link: https://drive.google.com/drive/folders/[FOLDER_ID]
```

### **3. Update Database**
```sql
-- Contoh update link Google Drive untuk kegiatan
UPDATE kegiatans SET google_drive_link = 'https://drive.google.com/drive/folders/1ABC123xyz' WHERE id = 1;
```

### **4. Via Laravel Admin (Future)**
```
Bisa ditambahkan form admin untuk input Google Drive link:
- Login admin
- Edit kegiatan  
- Input Google Drive Link
- Save
```

## 🎨 **UI Features:**

### **Halaman Kegiatan (index):**
- ✅ Tombol "Lihat Foto Kegiatan" dengan icon Google Drive
- ✅ Opens in new tab
- ✅ Fallback message jika link belum tersedia

### **Halaman Detail Kegiatan (show):**  
- ✅ Tombol besar "Lihat Foto Kegiatan"
- ✅ Share buttons untuk sosial media
- ✅ WhatsApp integration untuk daftar kegiatan

## 📊 **Sample Data:**
Database sudah berisi 8 kegiatan dengan sample Google Drive links:
1. Kajian Rutin Malam Jumat
2. Bakti Sosial Ramadhan  
3. Pelatihan Kepemimpinan Pemuda
4. Qurban Bersama 1446 H
5. Seminar Ekonomi Syariah
6. Kelas Tahsin Al-Quran
7. Outbound Keluarga Muslim
8. Buka Puasa Bersama Yatim

## 🔧 **Technical Details:**

### **Database Schema:**
```sql
ALTER TABLE kegiatans ADD COLUMN google_drive_link VARCHAR(255) NULLABLE;
```

### **Model Update:**
```php
// app/Models/Kegiatan.php
protected $fillable = [
    'judul', 'deskripsi', 'gambar', 'google_drive_link', 
    'tanggal', 'waktu', 'lokasi', 'is_active'
];
```

### **Blade Templates:**
- Updated: resources/views/kegiatan/index.blade.php
- Updated: resources/views/kegiatan/show.blade.php

## 🚀 **Ready to Deploy!**

Website dengan fitur Google Drive integration sudah siap untuk production. File deployment ada di folder `deploy/` dan siap diupload ke hosting.

## 📱 **Mobile Responsive:**
Semua tombol dan fitur Google Drive sudah responsive dan mobile-friendly dengan Bootstrap 5.

---
**REMAS AL-FALAAH** - Website dengan integrasi Google Drive untuk dokumentasi kegiatan 🕌✨