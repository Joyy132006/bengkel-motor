# PANDUAN TUGAS 6: Mengimplementasikan Pemrograman Berorientasi Objek

Berikut adalah ekstraksi instruksi langkah-langkah kerja untuk Tugas 6 dari file PDF asli.

## Halaman 1

Unit Kompetensi  
 Kode Unit   :  J. 620100.018.02 
 Judul Unit   :  Mengimplementasikan Pemrograman Berorientasi 
Objek 
 
Berikut tampilan dari ciri-ciri OOP pada project yang saya buat: 
1. Model  
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
-Model bertanggung jawab untuk menangani logika bisnis aplikasi, mengelola interaksi 
dengan database, dan memberikan data kepada controller dan view. Model sering kali 
digunakan untuk berinteraksi dengan data, baik itu mengambil, menyimpan, memperbarui, 
atau menghapus data dalam database. 
-Letak model terdapat di di dalam folder app/Models 
 
2. View  
-Di Laravel, View adalah bagian dari arsitektur MVC (Model-View-Controller) yang 
bertanggung jawab untuk menampilkan antarmuka pengguna (UI) atau tampilan (UI). 
View mengatur bagaimana data yang dikirimkan dari controller disajikan kepada 
pengguna dalam bentuk HTML, CSS, dan JavaScript. 
-Letak view terdapat di dalam folder resources/views 
 
 
 
 
 
 


----------------------------------------

## Halaman 2

-View Index (index.blade.php) 
 
-View Create (create.blade.php) 
 
 
 
 
 
 
 
 
3. Pembuatan TransaksiCo 
4.  
5.  
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 3

-View Edit  (edit.blade.php) 
 
-View detail (detail.blade.php) 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 4

6. Controller (TransaksiController) 
 
-Controller adalah bagian dari arsitektur MVC (Model-View-Controller) yang bertanggung 
jawab untuk menangani logika aplikasi, menerima input dari pengguna, memprosesnya, dan 
kemudian mengirimkan hasilnya ke View untuk ditampilkan. Controller juga menghubungkan 
antara Model dan View, dengan mengatur alur data yang akan diteruskan ke tampilan. 
-Letak controller terdapat di dalam folder app/Http/Controllers. 
-Laravel, sebagai framework PHP yang berbasis pada konsep Object-Oriented Programming 
(OOP), menerapkan prinsip-prinsip OOP dalam struktur MVC-nya. 
 
7. Encapsulation  
-Pada model 
 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 5

-Encapsulation adalah prinsip utama dalam Object-Oriented Programming (OOP)  yang 
mengacu pada pembungkusan data (atribut) dan perilaku (metode) dalam satu kesatuan 
objek. 
-Atribut yang dilindungi: Dengan menggunakan properti $fillable, kita menentukan atribut 
mana yang dapat diakses secara massal. Ini membantu untuk melindungi data agar tidak 
bisa diubah sembarangan melalui input pengguna. 
-Atribut yang disembunyikan : Dengan menggunakan $hidden, kita menyembunyikan 
informasi sensitif seperti password dari output JSON atau array ketika objek model 
dikembalikan. 
-Penggunaan $casts di Laravel adalah contoh encapsulation karena Laravel secara 
otomatis mengonversi tipe data dari database ke format yang sesuai, menyembunyikan 
logika konversi dari pengguna dan memungkinkan interaksi dengan data yang sudah 
terformat dengan benar. 
8. Inheritance 
Inheritance (pewarisan) adalah konsep di Object-Oriented Programming (OOP)  yang 
memungkinkan suatu kelas untuk mewarisi properti dan metode dari kelas lain. Di Laravel, 
banyak komponen seperti Model, Controller, dan Middleware yang menggunakan 
inheritance untuk mempermudah dalam mengorganisasi dan mengelola kode. 
-Pada model: 
 
Di sini, Kategori mewarisi berbagai metode dari kelas Model, seperti kemampuan untuk 
mengambil data dari database tanpa perlu menulis query SQL secara manual. 


----------------------------------------

## Halaman 6

-Pada Controller 
 
Di sini, KategoriController mewarisi kemampuan dasar dari kelas Controller untuk menangani 
HTTP request dan mengembalikan response. 
9. Abstraction 
Abstraction dalam Laravel dapat dilihat pada beberapa bagian di mana detail implementasi 
disembunyikan dari pengguna, dan hanya antarmuka yang relevan yang diberikan untuk 
berinteraksi dengan sistem.  Berikut adalah beberapa contoh penerapan abstraction dalam 
project Laravel ini: 
-Pada Routing dan Controller 
 
Di sini, kita hanya tahu bahwa request ke URL login akan diproses oleh method index pada 
LoginController. Implementasi bagaimana request diproses dan dikirimkan ke controller 
dikelola oleh Laravel. 
-Pada Migration 
Migrations di Laravel memungkinkan untuk memodifikasi struktur database menggunakan 
PHP, bukan SQL langsung. Ini mengabstraksi proses pembuatan atau perubahan tabel database 
tanpa harus menulis query SQL secara langsung. 


----------------------------------------

## Halaman 7

 
Di sini hanya mendeklarasikan apa yang ingin dibuat atau ubah di database, dan Laravel 
mengurus detail implementasi SQL di balik layar. 
 
 
 
 
 
 
 


----------------------------------------
