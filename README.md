# MVC PHP Native - Daftar Rekomendasi Film Top Sepanjang Masa

Aplikasi CRUD berbasis PHP Native dengan pola arsitektur Model-View-Controller (MVC) untuk mengelola data katalog film populer. Proyek ini disusun untuk memenuhi Evaluasi Akhir (Penugasan Individu) praktikum Pengembangan Aplikasi Website.

## Kebutuhan Sistem
- PHP 8.0 atau lebih baru
- MySQL / MariaDB
- Web server lokal (XAMPP atau Laragon)
- Git

## Panduan Instalasi
1. Clone atau salin folder proyek ke direktori web server lokal (`C:/xampp/htdocs/mvc-film` atau `C:/laragon/www/mvc-film`).
2. Buka phpMyAdmin dan impor file skema `database/film.sql`.
3. Pastikan konfigurasi akun database pada `config/database.php` sudah sesuai dengan pengaturan lokal.
4. Jalankan aplikasi melalui browser pada alamat:
   `http://localhost/mvc-film/public/index.php`

## Struktur Folder MVC
- `app/models/` : Mengelola query dan operasi data ke tabel `film` dengan PDO prepared statement.
- `app/controllers/` : Mengatur alur request, validasi input form, dan pengiriman indikator status.
- `app/views/` : Menyajikan tampilan tabel daftar film, form tambah, form edit, dan pesan notifikasi.
- `config/` : Menyimpan class koneksi PDO database.
- `database/` : Menyimpan skrip SQL pembuatan database `db_film`, tabel `film`, dan seed data awal.
- `public/` : Entry point aplikasi (front controller) dan pengaturan routing sederhana.

## Fitur Aplikasi
- Menampilkan daftar rekomendasi film top sepanjang masa (Read)
- Menambahkan data film baru dengan minimal 6 atribut utama (Create)
- Mengubah data film yang sudah tersimpan (Update)
- Menghapus data film disertai konfirmasi aksi (Delete)
- Menampilkan indikator pesan berhasil atau gagal pada setiap operasi data

## Histori Git
Gunakan perintah `git log --oneline --graph --decorate` pada terminal untuk memeriksa riwayat commit bertahap dari awal pengembangan.