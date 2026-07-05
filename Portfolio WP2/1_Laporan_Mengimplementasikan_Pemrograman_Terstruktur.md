# LAPORAN PORTOFOLIO TUGAS 1

## Identitas Mahasiswa
* **Nama**: Nugraha Jody Prasetya
* **NIM**: 17240181
* **Kelas**: 17.4A.04

---

## Unit Kompetensi: Mengimplementasikan Pemrograman Terstruktur
* **Kode Unit**: J.620100.017.02
* **Studi Kasus**: Aplikasi Kasir & Booking Bengkel Motor (**BengkelPro**)

Berikut adalah isi laporan portofolio Tugas 1 yang telah disesuaikan sepenuhnya dari tema makanan sebelumnya menjadi **Tema Bengkel Motor**. Kamu bisa menyalin (copy) isi teks laporan di bawah ini langsung ke file **Word (DOCX)** milikmu:

---

### 1. Tampilan Perintah Print
Fungsi `print` pada Python digunakan untuk menampilkan output teks ke konsol/layar terminal.

**Kodingan Program:**
```python
def info_bengkel():
    print("=" * 67)
    print(" " * 20 + "BENGKEL MOTOR KASIR BENGKELPRO" + " " * 17)
    print(" " * 15 + "JL. RAYA BENGKEL NO. 101, JAKARTA SELATAN" + " " * 11)
    print("=" * 67)
```
**Penjelasan:**
Menampilkan header struk dan nama bengkel menggunakan perintah `print` dengan formatting spasi dan perkalian karakter string (`* 67`) untuk menggambar garis pembatas secara otomatis.

---

### 2. Tampilan import os
Modul `os` digunakan untuk berinteraksi dengan sistem operasi tempat program dijalankan.

**Kodingan Program:**
```python
import os

# Digunakan untuk membersihkan layar konsol (Clear Screen)
os.system('cls' if os.name == 'nt' else 'clear')
```
**Penjelasan:**
`import os` digunakan untuk memanggil fungsi pembersih layar (`cls` pada Windows atau `clear` pada Linux/macOS) sehingga tampilan antarmuka kasir konsol lebih bersih, rapi, dan interaktif.

---

### 3. Tampilan import sys
Modul `sys` menyediakan akses ke variabel dan fungsi yang berinteraksi erat dengan interpreter Python.

**Kodingan Program:**
```python
import sys

# Digunakan untuk keluar dari eksekusi aplikasi
sys.exit()
```
**Penjelasan:**
`sys.exit()` dirancang untuk langsung menghentikan jalannya aplikasi Python secara bersih saat pengguna memilih menu "Keluar".

---

### 4. Tampilan Class (OOP)
Pemrograman Berorientasi Objek (OOP) mengelompokkan data dan aksi ke dalam sebuah rancangan cetak biru (*class*).

**Kodingan Program:**
```python
class TimMekanik:
    def __init__(data, id_mekanik, nama, keahlian):
        data.id_mekanik = id_mekanik
        data.nama = nama
        data.keahlian = keahlian
    
    def tampil_info(data):
        print(f"ID Mekanik : {data.id_mekanik}")
        print(f"Nama       : {data.nama}")
        print(f"Keahlian   : {data.keahlian}")

# Pembuatan Objek (Instansiasi)
mekanik1 = TimMekanik("MK-01", "Budi Santoso", "Spesialis CVT & Transmisi")
```
**Penjelasan:**
Class `TimMekanik` digunakan sebagai cetak biru untuk mengelola data mekanik bengkel. Atribut dideklarasikan di dalam method spesial constructor `__init__` menggunakan parameter referensi `data` (sebagai pengganti `self`), dan objek dipanggil dengan memicu method `tampil_info()`.

---

### 5. Tampilan Function
Fungsi (`def`) adalah blok kode terorganisir yang digunakan untuk melakukan satu tindakan terkait dan dapat digunakan kembali (*reusable*).

**Kodingan Program:**
```python
def info_bengkel():
    print("=" * 67)
    print(" " * 20 + "BENGKEL MOTOR KASIR BENGKELPRO" + " " * 17)
    print("=" * 67)
```
**Penjelasan:**
Dibuat fungsi dengan nama `info_bengkel()` yang diawali dengan kata kunci `def`. Fungsi ini akan mencetak header informasi bengkel setiap kali dipanggil, mengurangi duplikasi penulisan kode print berulang.

---

### 6. Tampilan Variable
Variabel adalah nama kontainer penyimpanan yang merujuk pada nilai di memori komputer.

**Kodingan Program:**
```python
# Variabel penyimpan data inputan jumlah layanan booking
jumdat = int(input("Masukkan Jumlah Layanan yang Akan Di-booking: "))
```
**Penjelasan:**
Variabel `jumdat` menyimpan data bertipe integer yang dimasukkan oleh kasir untuk menentukan seberapa banyak perulangan input data layanan servis yang akan dijalankan.

---

### 7. Tampilan Perulangan (Looping)
Perulangan digunakan untuk menjalankan satu atau beberapa instruksi secara berulang selama kondisi terpenuhi.

**Kodingan Program:**
```python
# Perulangan menggunakan While
i = 0
while i < jumdat:
    print("-" * 65)
    print("Data ke-", i + 1)
    # proses input ...
    i = i + 1
```
**Penjelasan:**
Perulangan `while` digunakan untuk mengulangi proses input data transaksi jasa servis sebanyak jumlah data (`jumdat`) yang telah dimasukkan oleh user sebelumnya. Variabel `i` bertindak sebagai pencatat indeks perulangan (*counter*).

---

### 8. Tampilan Percabangan
Percabangan mengevaluasi kondisi logis bernilai `True` atau `False` untuk menentukan blok kode mana yang akan dieksekusi.

**Kodingan Program:**
```python
if kode == "S" or kode == "s":
    jenis = "Servis Ringan + CVT"
    harga = float(80000)
elif kode == "O" or kode == "o":
    jenis = "Ganti Oli Mesin & Gardan"
    harga = float(50000)
elif kode == "B" or kode == "b":
    jenis = "Servis Besar (Overhaul)"
    harga = float(250000)
elif kode == "R" or kode == "r":
    jenis = "Ganti Kampas Rem"
    harga = float(35000)
else:
    jenis = "Layanan Tidak Diketahui"
    harga = float(0)
```
**Penjelasan:**
Percabangan `if-elif-else` digunakan untuk mencocokkan kode input jasa servis (`S`, `O`, `B`, `R`) demi menentukan nama layanan (`jenis`) dan nominal biayanya (`harga`). Blok `else` menangani kasus ketika user memasukkan kode yang salah.

---

### 9. Tampilan Library Pandas
Library `pandas` adalah pustaka analisis data Python yang sangat populer untuk memanipulasi data dalam struktur tabel (DataFrame).

**Kodingan Program:**
```python
import pandas as pd

data_tabel = {
    'Kode': kode_layanan,
    'Nama Layanan': nama_layanan,
    'Harga Satuan': harga_layanan,
    'Jumlah (Qty)': jumlah_motor,
    'Subtotal': total_harga
}
df = pd.DataFrame(data_tabel)
print(df.to_string(index=False))
```
**Penjelasan:**
Pandas diimpor sebagai alias `pd`. Data transaksi yang disimpan dalam kumpulan list/array digabungkan menjadi sebuah objek `DataFrame`, lalu dicetak ke konsol tanpa indeks baris (`index=False`) sehingga membentuk tabel transaksi struk kasir yang sangat rapi.

---

### 10. Tampilan Operator Aritmatika
Operator aritmatika digunakan untuk melakukan operasi matematika seperti penjumlahan, pengurangan, dan perkalian.

**Kodingan Program:**
```python
# 1. Perkalian (*) untuk menghitung Subtotal
subtotal = harga * qty

# 2. Penjumlahan (+) untuk increment pencatat indeks
i = i + 1

# 3. Pengurangan (-) untuk menghitung uang kembalian
total_kembalian = jumlah_bayar - total_pembelian
```
**Penjelasan:**
* Operasi perkalian (`*`) digunakan untuk menghitung total biaya per jenis jasa servis.
* Operasi penjumlahan (`+`) digunakan untuk menaikkan nilai pencatat iterasi loop.
* Operasi pengurangan (`-`) digunakan untuk menghitung uang kembalian kasir dari pembayaran pelanggan.

---

### 11. Tampilan Array (List)
Array/List digunakan untuk menyimpan banyak nilai dalam satu variabel tunggal.

**Kodingan Program:**
```python
# Deklarasi Array/List kosong
kode_layanan = []
jumlah_motor = []
nama_layanan = []
harga_layanan = []
total_harga = []

# Menambahkan data ke dalam Array
kode_layanan.append(kode)
```
**Penjelasan:**
Program menggunakan beberapa variabel bertipe *List* (`[]`) untuk menampung rincian data transaksi secara dinamis selama perulangan input kasir berjalan. Data dimasukkan ke dalam list menggunakan fungsi bawaan `.append()`.

---

### 12. Tampilan Komentar
Komentar adalah baris kode yang diabaikan oleh interpreter Python dan berfungsi sebagai catatan dokumentasi untuk developer.

**Kodingan Program:**
```python
# Perulangan ini akan terus berjalan sampai pengguna memilih menu 4 (Keluar)
while True:
    # ...
```
**Penjelasan:**
Karakter pagar (`#`) menandakan baris komentar di dalam kode Python. Digunakan untuk menjelaskan fungsi atau alur algoritma di bawahnya kepada pembaca kode.
