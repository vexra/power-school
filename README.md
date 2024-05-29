# Panduan Konfigurasi Proyek PowerSchool

Ini adalah panduan konfigurasi proyek PowerSchool menggunakan PHP native, MySQL, HTML, CSS, dan JavaScript.

## Langkah 1: Kebutuhan Prasyarat

Pastikan komputer Anda sudah terinstall:

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/) atau [MariaDB](https://mariadb.org/)
- [Composer](https://getcomposer.org/)

## Langkah 2: Unduh Proyek

1. Clone proyek dari repositori GitHub:

   ```bash
   git clone https://github.com/vexra/power-school.git
   ```

   Atau unduh zip file dari [repositori](https://github.com/vexra/power-school) dan ekstrak ke direktori proyek Anda.

## Langkah 3: Konfigurasi Lingkungan

1. Salin file `.env.example` di dalam direktori proyek dan ubah namanya menjadi `.env.local`. File ini akan digunakan untuk menyimpan informasi sensitif seperti host database, nama database, username, dan password.

2. Buka file `.env.local` dan isi detail-detail konfigurasi sesuai dengan lingkungan pengembangan Anda. Pastikan untuk mengisi nilai-nilai berikut dengan informasi yang benar:

   ```plaintext
   DB_HOST=localhost
   DB_NAME=nama_database
   DB_USERNAME=username_database
   DB_PASSWORD=password_database
   ```

3. Instal paket yang diperlukan melalui Composer:

   ```bash
   composer install
   ```

## Langkah 4: Buat Database dan Tabel

1. Jalankan script `create_tables.php` untuk membuat tabel-tabel yang diperlukan dan menanamkan data ke dalamnya:

   ```bash
   php private/create_tables.php
   ```

## Langkah 5: Jalankan Proyek

1. Pastikan server web lokal Anda sudah berjalan.
2. Buka browser dan masukkan URL proyek (misalnya, `http://localhost/power-school/`).
3. Anda akan diarahkan ke halaman login.
4. Masukkan kredensial pengguna yang telah ditambahkan ke dalam database.

## Kontribusi

Silakan berkontribusi dengan membuat pull request ke [repositori GitHub](https://github.com/vexra/power-school).

## Lisensi

Proyek ini dilisensikan di bawah lisensi [MIT](https://opensource.org/licenses/MIT).

---

© 2024 - PowerSchool oleh [Vex corporation](https://github.com/vexra)
