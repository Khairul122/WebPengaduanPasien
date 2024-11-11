# Sistem Pengaduan Pasien

Sistem ini adalah aplikasi berbasis web yang dirancang untuk mengelola pengaduan dari pasien. Proyek ini dibangun dengan PHP dan menggunakan database MySQL untuk menyimpan data pengaduan.

## Struktur Proyek

Berikut adalah struktur direktori dan deskripsi singkat untuk masing-masing file dan direktori:

- `admin/` - Direktori untuk antarmuka admin yang mengelola data pengaduan.
- `config.php` - File konfigurasi untuk menghubungkan ke database.
- `db_pengaduanpasien.sql` - Berkas SQL untuk membuat tabel dan struktur database yang diperlukan oleh aplikasi.
- `index.php` - Halaman utama untuk mengakses sistem pengaduan.
- `login.php` - Halaman untuk login ke sistem.
- `logout.php` - Skrip untuk keluar dari sistem.

## Persyaratan Sistem

- **PHP** - Versi 7.4 atau lebih tinggi
- **MySQL** - Untuk menyimpan data pengaduan pasien
- **Web Server** - Apache atau Nginx disarankan

## Cara Menginstal

1. **Clone atau unduh** proyek ini ke direktori server Anda.
2. **Buat database** baru di MySQL, lalu impor `db_pengaduanpasien.sql` untuk menyiapkan tabel yang diperlukan.
3. **Konfigurasi Database**: Buka `config.php` dan sesuaikan pengaturan database sesuai dengan kredensial database Anda.
4. **Jalankan Aplikasi**: Akses `index.php` melalui browser untuk membuka aplikasi.

## Penggunaan

- Akses halaman utama melalui `index.php`.
- Admin dapat mengakses halaman pengelolaan melalui direktori `admin/` untuk mengelola pengaduan.

