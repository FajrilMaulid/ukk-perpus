##  Konsep Dari Web Yang Saya Buat

Website yang saya buat ini merupaka sebuah perpustakaan digital yang memiliki penampilan yang minimalis.

## Fitur Yang Tersedia

-   Halaman Awal (Landing Page)
    -   Halaman Beranda
    -   Buku
    -   Genre Buku (Kategori)
-   Authentication
    -   Register
    -   Login
-   Multi User
    -   Admin
        -   Pengguna yang dapat dikelola 
        -   Buku yang dapat dikelola
        -   Kategori buku yang dapat dikelola
        -   Melihat semua data
        -   Generate Laporan (EXCEL, PDF)
    -   Petugas
        -   Buku yang dapat dikelola
        -   Kategori buku yang dapat dikelola
        -   Melihat semua data
        -   Generate Laporan (EXCEL, PDF)
    -   Peminjam
        -   Mencari Buku
        -   Memberikan Rating dan Ulasan Buku
        -   Melihat peminjaman buku sendiri
        -   Register (membuat akun sebagai peminjam)
    -   all (semua bisa mengakses)
        -   Mengulas buku di halaman awal
        -   Login
        -   Logout
-   Pencarian Halaman Awal
    -   Buku
    -   Kategori

## Akun Default Untuk Pengujian

-   Admin
    -   Email : admin@gmail.com
    -   Password : admin123
-   Petugas
    -   Email : petugas@gmail.com
    -   Password : petugas123
-   Peminjam
    -   Email : peminjam@gmail.com
    -   Password : peminjam123

## ERD & Relasi antar tabel

![ERD](https://github.com/FajrilMaulid/ukk-perpus/blob/main/ERD-Web-perpus.png)

![RAT](https://github.com/FajrilMaulid/ukk-perpus/blob/main/Relasi%20Antar%20tabel.png)

Tabel Failed_Jobs, Personal_access_tokens, Password_reset_tokens, migrations diabaikan saja karena itu bawaan dari Laravel.

## UML Diagram Use Case

![UML](https://github.com/FajrilMaulid/ukk-perpus/blob/main/uml-ukk-perpus.png)

## Teknologi Yang Digunakan

-   <a href="https://laravel.com/">Laravel 10</a>
-   <a href="https://getbootstrap.com/">Boostrap 5</a>

## Persyaratan Untuk Melakukan Instalasi

-   PHP 8.1.0 & Web Server (Apache)
-   Database (MariaDB)
-   Web Browser (Chrome, atau firefox)

## Instalasi 

1. Clone Repositori

```bash
git clone https://github.com/FajrilMaulid/ukk-perpus.git
composer install
cp .env.example .env
```

2. Konfigurasi Database pada file `.env`

```conf
APP_DEBUG=true
DB_DATABASE=database-anda
DB_USERNAME=nama-pengguna-anda
DB_PASSWORD=kata-sandi-anda
```

3. Melakukan Migrasi dan menyambungkan storage

```bash
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
```

4. Mulai Situs Web

```bash
php artisan serve
```

<p>ukk perpus dibuat oleh Fajril Maulid</p>



