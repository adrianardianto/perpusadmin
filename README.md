# 📚 Sistem Informasi Perpustakaan (PerpusAdmin)

Aplikasi manajemen perpustakaan berbasis web yang modern dan responsif, dibangun dengan **Laravel 12** dan **Tailwind CSS 4**. Aplikasi ini dirancang untuk mempermudah pengelolaan sirkulasi buku, pendataan anggota, dan pemantauan inventaris perpustakaan.

![Laravel Badge](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel)
![Tailwind CSS Badge](https://img.shields.io/badge/Tailwind_CSS-4.0-38B2AC?style=for-the-badge&logo=tailwind-css)
![PHP Badge](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php)

## 🚀 Fitur Utama

-   **📊 Dashboard Interaktif**: Ringkasan statistik real-time (Total Buku, Kategori, Anggota, Peminjaman).
-   **📚 Manajemen Inventaris**:
    -   Pengelolaan Data Buku
    -   Manajemen Kategori Buku
    -   Pemantauan Kondisi Buku
-   **👥 Manajemen Anggota**: Pendataan dan pengelolaan anggota perpustakaan.
-   **🔄 Sirkulasi**:
    -   Pencatatan Peminjaman Buku
    -   Proses Pengembalian Buku
-   **🌐 REST API**: Endpoint siap pakai untuk integrasi data buku (`/api/books`).

## 🛠️ Teknologi

-   **Framework**: [Laravel 12](https://laravel.com)
-   **Styling**: [Tailwind CSS 4](https://tailwindcss.com)
-   **Frontend**: Blade Templates & Vite
-   **Database**: MySQL / SQLite
-   **Bahasa**: PHP >= 8.2

## ⚙️ Persyaratan Sistem

Sebelum memulai, pastikan sistem Anda memiliki:

-   **PHP** >= 8.2
-   **Composer** (Manajer dependensi PHP)
-   **Node.js & NPM** (Untuk kompilasi aset frontend)

## 📥 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda:

1.  **Clone Repositori**

    ```bash
    git clone https://github.com/adrianardianto/perpusadmin.git
    cd perpusadmin
    ```

2.  **Instal Dependensi**
    Jalankan perintah berikut untuk menginstal dependensi backend dan frontend:

    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Environment**
    Salin file konfigurasi contoh dan generate application key:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    _Buka file `.env` lalu sesuaikan konfigurasi database (`DB_DATABASE`, `DB_USERNAME`, dll) sesuai lingkungan Anda._

4.  **Migrasi Database**
    Buat tabel-tabel database yang diperlukan:

    ```bash
    php artisan migrate
    ```

    _(Opsional) Jika tersedia data dummy, Anda bisa menjalankannya:_

    ```bash
    php artisan db:seed
    ```

5.  **Jalankan Aplikasi**
    Gunakan perintah berikut untuk menjalankan server Laravel dan Vite secara bersamaan:

    ```bash
    composer run dev
    ```

    _Atau jika ingin menjalankannya secara terpisah di terminal yang berbeda:_

    ```bash
    php artisan serve
    npm run dev
    ```

6.  **Selesai!**
    Buka browser dan akses aplikasi di: [http://localhost:8000](http://localhost:8000)

## 📄 Lisensi

Project ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

---

_Dibuat untuk keperluan manajemen perpustakaan yang efisien._
