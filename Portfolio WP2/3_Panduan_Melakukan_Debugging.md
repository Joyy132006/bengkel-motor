# PANDUAN TUGAS PORTOFOLIO 3: MELAKUKAN DEBUGGING

* **Kode Unit**: J.620100.025.02
* **Judul Unit**: Melakukan Debugging
* **Sumber File**: `3_Unjuk_Kerja Melakukan Debugging.pdf`

Laporan ini memandu langkah-langkah melakukan proses debugging pada aplikasi berbasis Laravel.

---

## 1. Metode Debugging di Laravel (`dd` vs `ddd`)

Untuk memeriksa isi data/variabel di Laravel, kita dapat menggunakan fungsi pembantu (*helper functions*) bawaan:

### A. Fungsi `dd($request)` (Dump and Die)
Fungsi ini akan mencetak isi data dari variabel `$request` ke layar dan **langsung menghentikan** seluruh eksekusi program setelah perintah tersebut dipicu.

* **Contoh Kodingan di Controller:**
  ```php
  public function store(Request $request)
  {
      dd($request->all()); // Menghentikan program & menampilkan isi input
      
      // Kodingan di bawah ini tidak akan pernah dieksekusi
      Booking::create($request->all());
  }
  ```

### B. Fungsi `ddd($request)` (Dump, Die, and Debug)
Fungsi ini (memanfaatkan debugger Ignition/Flare bawaan Laravel) akan menampilkan halaman debug interaktif yang lebih lengkap, memuat informasi stack trace, database query, request, cookies, dan environment program secara mendalam.

* **Contoh Kodingan di Controller:**
  ```php
  public function store(Request $request)
  {
      ddd($request); // Membuka halaman debug Flare/Ignition interaktif
  }
  ```

* **Rekomendasi Best Practice**: Setelah proses debugging selesai dan data dipastikan sesuai dengan yang diharapkan, pastikan untuk **menghapus** atau **menonaktifkan (menjadi komentar)** perintah `dd()` atau `ddd()` tersebut sebelum aplikasi dideploy atau dijalankan secara normal.

---

## 2. Studi Kasus Debugging (Contoh Kasus Eror)

### Masalah:
Ketika user mencoba menyimpan data kategori baru, data tersebut **tidak dapat tersimpan** ke database dan halaman web terus tertahan di halaman form pembuatan (`create`) tanpa ada pesan eror yang jelas.

### Investigasi:
Setelah dilakukan debugging dengan memeriksa file controller terkait, ditemukan kesalahan penulisan (*typo*) nama field input pada proses validasi atau penyimpanan:
* **Kesalahan**: Nama field ditulis `nama_kategori_destinasi` di database/model.
* **Kenyataan**: Di file HTML/View inputan dikirim dengan nama `nama_kategori`.
* **Dampak**: Karena nama field tidak cocok, proses validasi Laravel menolak data tersebut secara diam-diam dan mengembalikan user kembali ke halaman form (`back()`) tanpa menyimpan data.

### Solusi Perbaikan:
Menyelaraskan nama field di file Controller agar sesuai dengan skema database dan inputan form View:

* **Sebelum Perbaikan (Eror):**
  ```php
  $validatedData = $request->validate([
      'nama_kategori_destinasi' => 'required', // Typo tidak cocok dengan form
  ]);
  ```

* **Setelah Perbaikan (Sukses):**
  ```php
  $validatedData = $request->validate([
      'nama_kategori' => 'required', // Disamakan menjadi nama_kategori
  ]);
  Kategori::create($validatedData);
  return redirect('/kategori');
  ```

Setelah disesuaikan, data berhasil disimpan ke database dan user diarahkan kembali ke halaman index yang menampilkan daftar kategori terbaru.
