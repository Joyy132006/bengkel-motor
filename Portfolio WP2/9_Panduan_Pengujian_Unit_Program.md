# PANDUAN TUGAS 9: Melaksanakan Pengujian Unit Program

Berikut adalah ekstraksi instruksi langkah-langkah kerja untuk Tugas 9 dari file PDF asli.

## Halaman 1

Unit Kompetensi   Kode Unit   :   J.62010.033.02 
 Judul Unit   :  Melaksanakan Pengujian Unit Program 
 
Berikut pengujian unit program pada halaman login 
No Skenario  
pengujian 
Test case Hasil yang  
diharapkan 
Hasil  
pengujian 
Kesimpulan 
1 Email U ser dan  
Password tidak  
diisi kemudian  
klik tombol login 
-Email User:(kosong)  
-Password:(kosong) 
Sistem akan 
menolak, pada input 
field Email dan  
input field password 
menampilkan “This 
field is required”. 
Sesuai  
harapan 
Valid 
2 Email User tidak 
menggunakan 
format email  
dan  Password 
tidak  diisi 
kemudian  klik 
tombol login 
-Email User: adil 
-Password:(kosong) 
Sistem akan 
menolak, pada input 
field Email 
menampilkan 
“Please enter a valid 
email address.”. Dan 
pada Password 
menampilkan “This 
field is required”. 
Sesuai  
harapan 
Valid 
3 Mengetikkan  
semua kondisi  
salah, baik pada 
Email U ser atau  
Password  
-Email User: 
adil@gmail.com  
-Password:P@55wor 
Sistem akan 
menolak, pada input 
field Email dan input 
field Password 
kosong, dengan 
menampilkan pesan  
“Login Gagal”. 
Sesuai  
harapan 
Valid 
4 Mengetikkan 
salah satu 
kondisi salah 
pada  Email User 
atau  Password 
kemudian klik 
tombol login 
-Email User: 
admin@gmail.com  
-Password:Paswor 
Sistem akan 
menolak, pada input 
field Email dan input 
field Password 
kosong, dengan 
menampilkan pesan  
“Login Gagal”. 
Sesuai  
harapan 
Valid 
5 Mengetikkan  
Email U ser dan  
Password 
dengan data yang 
benar dan status 
kondisi  
-Email User: 
admin@gmail.com  
-Password: 
P@55word 
Sistem menerima 
akses login dan 
kemudian langsung 
menampilkan 
halaman 
utama (home). 
Sesuai  
harapan 
Valid 
 

----------------------------------------

## Halaman 2

 
Gambar 1. Pengujian Pada Nomor 1 
 
 
Gambar 2. Pengujian Pada Nomor 2 


----------------------------------------

## Halaman 3

 
Gambar 3. Pengujian Pada Nomor 3 
 
 
Gambar 4. Pengujian Pada Nomor 4 


----------------------------------------

## Halaman 4

 
Gambar 5. Pengujian Pada Nomor 5 
 
Berikut pengujian unit program pada saat akan menambahkan transaksi 
No Skenario  
pengujian 
Test case Hasil yang  
diharapkan 
Hasil  
pengujian 
Kesimpulan 
1 ID Customer 
tidak dipilih, 
Tanggal Awal 
dan Tanggal 
Akhir tidak 
diinput, Produk 
(Paket Wisata) 
tidak diinput. 
-ID Customer: 
(kosong)  
-Tanggal Awal: 
(kosong) 
-Tanggal Akhir: 
(kosong) 
-Produk (Paket 
Wisata): (kososng) 
-Sistem tidak akan 
menambahkan 
transaksi. 
-Pada field ID 
Customer 
menampilkan “The 
anggota id field is 
required.”,  
-Pada field tanggal 
awal menampilkan 
“The tanggal awal 
field is required.” 
-Pada field tanggal 
akhir “The tanggal 
akhir field is 
required.” 
Sesuai  
harapan 
Valid 
2 Menginput  
ID Customer, 
Tanggal Awal, 
Tanggal Akhir, 
dan menginput 
produk (paket 
wisata), serta 
jumlah orang  
dengan data yang 
sesuai 
-ID Customer: 
gebby@gmail.com 
-Tanggal Awal: 
1/12/2025 
-Tanggal Akhir: 
1/15/2025 
-Paket Wisata: 
Bandung 2 
-Jumlah Orang: 
3 
 
Sistem 
menambahkan 
transaksi, muncul 
pop-up “Transaksi 
Berhasil disimpan”, 
dan data transaksi 
berhasil muncul. 
Sesuai  
harapan 
Valid 
 


----------------------------------------

## Halaman 5

 
 
 
Gambar 6. Pengujian Penambahan Transaksi Pada Nomor 1 
 
Gambar 7. Pengujian Penambahan Transaksi Pada Nomor 2 
 


----------------------------------------

## Halaman 6

 
Gambar 8. Pengujian Penambahan Transaksi Pada Nomor 2 
Berikut pengujian unit program pada halaman admin 
No Skenario  
pengujian 
Test case Hasil yang  
diharapkan 
Hasil  
pengujian 
Kesimpulan 
1 Menginput foto, 
memilih hak 
akses, memilih 
status, 
menginput nama, 
email, hp dan 
password. 
-Foto: diinput 
-Hak akses:  
super admin 
-Status: nonAktif 
-Nama: Dani 
-Email: 
dani@gmail.com 
-HP: 089520323545 
-Password: 
P@55word 
Sistem akan 
menyimpan data dan 
menampilkan pop-up 
“Data Berhasil 
Disimpan” 
Sesuai  
harapan 
Valid 
2 Mengubah salah 
satu data admin, 
yaitu mengubah 
status menjadi 
Aktif 
Status: Aktif Sistem akan 
memperbarui data 
admin dan 
menampilkan pop-up 
“Data Berhasil 
Diperbarui” 
Sesuai  
harapan 
Valid 
3 Menghapus data 
admin  
Hapus data  Sistem akan 
mengonfirmasi 
penghapusan dengan 
menampilkan pop-up 
“Konfirmasi Hapus 
Data?”, jika 
pengguna klik “Ya, 
dihapus”, maka 
sistem menghapus 
data admin dan 
menampilkan pop-up 
“Data Berhasil 
Dihapus”. 
Sesuai  
harapan 
Valid 
 


----------------------------------------

## Halaman 7

 
Gambar 9. Pengujian Halaman Admin Pada Nomor 1 
 
 
Gambar 10. Pengujian Halaman Admin Pada Nomor 2 
 


----------------------------------------

## Halaman 8

 
Gambar 11. Pengujian Halaman Admin Pada Nomor 3 
 
Gambar 12. Pengujian Halaman Admin Pada Nomor 3 
 


----------------------------------------
