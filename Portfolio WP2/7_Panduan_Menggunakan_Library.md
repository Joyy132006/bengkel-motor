# PANDUAN TUGAS 7: Menggunakan Library atau Komponen Pre-Existing

Berikut adalah ekstraksi instruksi langkah-langkah kerja untuk Tugas 7 dari file PDF asli.

## Halaman 1

Unit Kompetensi  
 Kode Unit   :  J. 620100.019.002 
 Judul Unit   :  Menggunakan Library atau Komponen Pre 
Existing 
 
1. Penggunaan Library Hash 
 
 
 
-Hash di Laravel atau use Illuminate\Support\Facades\Hash; adalah library bawaan yang 
digunakan untuk melakukan hashing atau enkripsi data, terutama password, guna 
meningkatkan keamanan dalam penyimpanan data sensitif. Fungsi utamanya mencakup 
pembuatan hash menggunakan metode Hash::make() dan verifikasi hash dengan Hash::check() 


----------------------------------------

## Halaman 2

untuk memastikan kesesuaian password yang diinput dengan data yang tersimpan di database.  
-Saat seorang pengguna mendaftar atau mengubah password, nilai password  
yang diberikan diacak menjadi sebuah hash sebelum disimpan dalam database. Saat pengguna 
mencoba untuk login, password yang diberikan akan diacak menjadi hash dan dibandingkan  
dengan hash yang tersimpan dalam database. Jika kedua hash cocok, pengguna dianggap telah 
memasukkan password yang benar.  
-Laravel secara default menggunakan algoritma bcrypt, yang sudah aman dan terenkripsi 
dengan baik, sehingga cocok digunakan dalam proses autentikasi pengguna. 
Penjelasan penggunaan library Hash pada project: 
- use Illuminate\Support\Facades\Hash; → Mengimpor library Hash. 
- Hash::make() → Meng-hash password sebelum disimpan ke database 
 
2. Penggunaan Libray Image Helper 
-Di UserController: 
 
 


----------------------------------------

## Halaman 3

 
-Di App\Helpers\ImageHelper.php: 
 
Library ImageHelper yang digunakan di project ini adalah sebuah helper kustom yang dibuat 
sendiri dalam proyek Laravel untuk mempermudah pengolahan gambar, seperti mengunggah 
dan meresize gambar secara otomatis. 
Penjelasan penggunaan libray ImageHelper: 
-ImageHelper adalah helper khusus yang dibuat di dalam folder App\Helpers. 
-Method uploadAndResize pada ImageHelper digunakan untuk mengunggah dan meresize 
gambar. 
-Controller store() di UserController memanggil ImageHelper::uploadAndResize untuk 
memproses gambar dengan lebih rapi. 


----------------------------------------

## Halaman 4

3. Penggunaan Library Request atau use Illuminate\Http\Request; 
 
 
 
 
 
 
 
 
 
 
 
 
 
Library request digunakan untuk menangani data yang dikirimkan melalui HTTP request, baik 
itu dari formulir (form), URL parameters, header, atau file upload. Request menyediakan 
berbagai metode untuk mempermudah pengelolaan dan validasi data yang diterima dari 
pengguna atau klien.  
 
Illuminate\Http\Request adalah library di Laravel yang mempermudah untuk menangani 
HTTP request, seperti mengambil data dari form, mengakses parameter URL, memvalidasi 


----------------------------------------

## Halaman 5

data, mengelola file upload, menangani session dan cookies, serta berbagai operasi terkait 
request lainnya. 
 

----------------------------------------
