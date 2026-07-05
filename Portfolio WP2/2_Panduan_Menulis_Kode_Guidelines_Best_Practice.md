# PANDUAN TUGAS PORTOFOLIO 2: MENULIS KODE DENGAN PRINSIP SESUAI GUIDELINES & BEST PRACTICE

* **Kode Unit**: J.620100.017.02
* **Judul Unit**: Menulis Kode Dengan Prinsip Sesuai Guidelines dan Best Practice
* **Sumber File**: `2_Unjuk_Kerja Menulis Kode Dengan Prinsip Sesuai Guide Lines dan Best Practice.pdf`

Laporan ini memandu langkah-langkah instalasi Laravel, pembuatan database, skema migrasi, model relasi, controller resource, routes, dan views CRUD.

---

## Langkah 1: Membuka Dokumentasi Laravel
Akses situs resmi Laravel di https://laravel.com/, pilih **Documentation**, dan pilih versi Laravel yang diinginkan (contoh: Laravel 10.x).

## Langkah 2: Memeriksa Cara Instalasi
Scroll halaman dokumentasi ke bawah hingga menemukan sub-bab **"Creating a Laravel Project"** untuk melihat perintah composer yang dibutuhkan.

## Langkah 3: Mengecek Composer
Buka Command Prompt (CMD) di laptop Anda, jalankan perintah untuk mengecek versi composer yang terinstal:
```bash
composer -V
```

## Langkah 4: Mengecek Versi PHP
Jalankan perintah berikut di CMD untuk memastikan versi PHP kompatibel dengan versi Laravel yang dipilih (PHP >= 8.1 untuk Laravel 10):
```bash
php -v
```

## Langkah 5: Membuat Folder Projek
Buat sebuah folder utama untuk menyimpan projek Laravel Anda di dalam komputer (contoh: di dalam folder `C:\laravel10\`, buat folder kelas/kelompok Anda, misal: `124A35`).

## Langkah 6: Menginstal Laravel Baru
Arahkan CMD ke dalam folder kelas tersebut, kemudian jalankan perintah instalasi projek Laravel baru (contoh nama projek: `mrLaravel10`):
```bash
composer create-project laravel/laravel mrLaravel10
```
Tunggu hingga proses unduhan selesai dan muncul konfirmasi *"Application key set successfully"*.

## Langkah 7: Mengubah Nama Folder Projek
Setelah selesai terinstal, ubah nama folder projek tersebut sesuai dengan tema projek yang akan Anda buat (contoh: dari `mrLaravel10` diubah namanya menjadi `Moontravel`).

## Langkah 8: Menjalankan Server Lokal (Artisan Serve)
Arahkan CMD ke dalam folder projek yang sudah diubah namanya tersebut, lalu ketik perintah untuk menjalankan server pengembangan lokal:
```bash
php artisan serve
```
Program akan berjalan dan menampilkan informasi: *Server running on [http://127.0.0.1:8000]*.

## Langkah 9: Akses Aplikasi di Browser
Buka browser (Chrome/Edge), lalu akses alamat:
```url
http://localhost:8000/
```
Pastikan halaman welcome default Laravel berhasil ditampilkan secara utuh.

## Langkah 10: Membuat Database di phpMyAdmin
Buka browser, masuk ke phpMyAdmin (`http://localhost/phpmyadmin/`), lalu buat database baru dengan nama projek Anda (contoh: `moontravel`).

## Langkah 11: Konfigurasi File `.env`
Buka projek menggunakan editor VS Code, buka file `.env` di root projek, lalu ubah baris koneksi database menjadi:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=moontravel    # Sesuaikan dengan nama database Anda
DB_USERNAME=root
DB_PASSWORD=
```

## Langkah 12: Membuat File Migration
Jalankan perintah berikut di terminal VS Code untuk membuat file migrasi tabel baru (contoh tabel: `anggota`):
```bash
php artisan make:migration create_anggota_table
```

## Langkah 13: Menyusun Blueprint Tabel Migration
Buka file migration baru yang terletak di folder `database/migrations/xxxx_create_anggota_table.php`, lalu lengkapi isi method `up()` seperti berikut:
```php
Schema::create('anggota', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->date('tgl_lahir');
    $table->enum('gander', ['L', 'P']);
    $table->string('alamat');
    $table->string('kode_pos', 5);
    $table->timestamps();
    
    // Relasi foreign key ke tabel users
    $table->foreign('user_id')->references('id')->on('users');
});
```

## Langkah 14: Mengeksekusi Migration
Jalankan perintah berikut di terminal untuk membuat tabel tersebut secara fisik di database MySQL:
```bash
php artisan migrate
```

## Langkah 15: Membuat Model Anggota
Buat file model bernama `Anggota` dengan perintah artisan:
```bash
php artisan make:model Anggota
```
Buka file `app/Models/Anggota.php` dan tambahkan properti fillable/guarded serta fungsi relasi data `user()`:
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    public $timestamps = true;
    protected $table = "anggota";
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
```

## Langkah 16: Membuat Resource Controller
Jalankan perintah artisan untuk membuat controller bertipe resource:
```bash
php artisan make:controller AnggotaController --resource
```

## Langkah 17: Mendaftarkan Rute di `routes/web.php`
Buka file rute `routes/web.php` dan daftarkan rute resource untuk controller baru tersebut:
```php
use App\Http\Controllers\AnggotaController;

Route::resource('anggota', AnggotaController::class);
```

## Langkah 18: Membuat View CRUD
Buat file HTML template Blade di folder `resources/views/backend/v_anggota/`:
1.  **`index.blade.php`**: Berisi tabel data anggota dan tombol aksi Detail, Ubah, Hapus.
2.  **`create.blade.php`**: Form tambah data anggota baru, lengkap dengan input dropdown ID User, Nama, Gender, Tanggal Lahir, Alamat, Kode Pos, serta tombol Simpan.
3.  **`edit.blade.php`**: Form untuk mengedit data anggota yang sudah tersimpan sebelumnya.
