# PANDUAN TUGAS 8: Menerapkan Akses Basis Data

Berikut adalah ekstraksi instruksi langkah-langkah kerja untuk Tugas 8 dari file PDF asli.

## Halaman 1

Unit Kompetensi   Kode Unit   :   J. 620100.021.02 
 Judul Unit   :  Menerapkan Akses Basis Data 
 
Berikut penerapan akses basis data pada projek laravel: 
 
1. Melakukan konfigurasi database  di file .env dengan meng ubah DB_DATABASE dari 
default laravel menjadi moontravel (sesuai nama database yang dipakai).  Konfigurasi 
database di .env dilakukan untuk meningkatkan keamanan, fleksibilitas, dan kemudahan 
pengelolaan dengan memisahkan kredensial sensitif dari kode aplikasi. 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 2

2. Membuat migration  tabel user  dengan perintah : php artisan make:migration  
create_user_table. 
 
3. Mengatur dan mengisi blueprint untuk mendefinisikan struktur tabel. 
 
4. Menjalankan migration dengan perintah php artisan migrate. 
 
 


----------------------------------------

## Halaman 3

5. Untuk mengecek apakah projek sudah terhubung deng an database yang benar , buka 
phpMyAdmin. 
 
Terlihat bahwa projek sudah terhubung dengan database yang benar, dengan penambahan 
beberapa tabel yang sudah dibuat dalam projek. 
6. Membuat Seeders. Seeders dalam Laravel digunakan untuk mengisi database dengan data 
awal dengan tujuan  mempermudah pembuatan data ini secara otomatis. Pada saat ingin  
menjalankan seeders maka harus menyiapkan Model terlebih dulu. 
-Membuat model User dengan perintah php artisan:make model User 
 
-Ubah script model: 
 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 4

- Setetelah model berhasil dibuat, kemudian mengisi seeders di file DatabaseSeeder.php 
pada direktori database/seeders:  
 
7. Setelah itu, menjalankan seeder dengan perintah php artisan migrate:fresh –seed 
 
8. Untuk mengecek apakah data seeder sudah berhasil ditambahkan, cek di phpMyAdmin 
 


----------------------------------------
