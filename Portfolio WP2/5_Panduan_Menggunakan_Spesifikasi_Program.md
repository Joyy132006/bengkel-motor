# PANDUAN TUGAS 5: Menggunakan Spesifikasi Program

Berikut adalah ekstraksi instruksi langkah-langkah kerja untuk Tugas 5 dari file PDF asli.

## Halaman 1

Unit Kompetensi   Kode Unit   :   J. 620100.009.02 
 Judul Unit   :  Menggunakan Spesifikasi Program 
 
Berikut rancangan dari project yang saya buat: 
1. Rancangan Sequence Diagram 
Sequence diagram merupakan diagram yang menggambarkan alur interaksi antar objek 
dalam suatu sistem secara berurutan berdasarkan waktu.  Berikut sequence diagram dari 
project yang saya buat: 
-Sequence diagram login 
 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 2

-Sequence diagram paket 
 
 
 
 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 3

-Sequence diagram customer 
 
 
 
 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 4

-Sequence diagram transaksi 
 
 
 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 5

2. Rancangan Entity Relathionship Diagram (ERD) 
ERD (Entity Relationship Diagram) adalah diagram yang menggambarkan hubungan antar 
entitas dalam basis data beserta atribut dan relasinya. Berikut ERD dari project yang saya buat: 
 
 
 
 
 


----------------------------------------

## Halaman 6

3. Rancangan Logical Record Structure (LRS) 
LRS (Logical Record Structure) adalah struktur logis data yang mendefinisikan bagaimana 
data diatur dan diakses dalam sistem informasi. Berikut LRS dari project yang saya buat: 
 
4. Use Case Diagram 
Use Case Diagram adalah diagram yang menggambarkan interaksi antara aktor dan sistem 
dalam menyelesaikan suatu tugas atau fungsi tertentu.  Berikut use case diagram dari 
project yang saya buat: 
-Use Case Admin dan Super Admin 
 
 
 
 
 
 
 
 
 
 
 
class LRS Moon Trav el
Admin
«column»
*PK id_admin: INT
 nama_admin: VARCHAR(50)
 email_admin: VARCHAR(50)
 hp_admin: INT
 id_customer: INT
 id_transaksi: INT
«PK»
+ PK_admin(INT)
transaksi
«column»
*PK id_transaksi: INT
 FK id_admin: INT
 FK id_customer: INT
 FK id_paket: INT
 tgl_awal_sewa: DATETIME
 tgl_selesai_sewa: DATETIME
 jml_orang: INT
 total_bayar: ENUM
«FK»
+ FK_transaksi_admiin(INT)
+ FK_transaksi_customer(INT)
+ FK_transaksi_paket_wisata(INT)
«index»
+ IXFK_transaksi_admin(INT)
+ IXFK_transaksi_customer(INT)
+ IXFK_transaksi_paket_wisata(INT)
«PK»
+ PK_transaksi(INT)
customer
«column»
*PK id_customer: INT
 nama_customer: VARCHAR(50)
 hp_customer: VARCHAR(13)
 email_customer: VARCHAR(50)
 id_transaksi: INT
«PK»
+ PK_customer(INT)
paket_wisata
«column»
*PK id_paket: INT
 FK id_destinasi: INT
 nama_paket: VARCHAR(15)
 harga_paket: DOUBLE
 keterangan_paket: TEXT
«FK»
+ FK_paket_wisata_destinasi(INT)
«index»
+ IXFK_paket_wisata_destinasi(INT)
+ IXFK_paket_wisata_destinasi_02(INT)
«PK»
+ PK_paket_wisata(INT)
destinasi
«column»
*PK id_destinasi: INT
 nama_destinasi: VARCHAR(50)
 id_paket: INT
«PK»
+ PK_kategori(INT)
1..
1..*
1..* 1
1..* 1..
0..*1


----------------------------------------

## Halaman 7

5. Activity Diagram 
Activity Diagram  merupakan d iagram yang menggambarkan alur aktivitas atau proses 
dalam sistem, termasuk keputusan dan kondisi yang terjadi. Berikut activity diagram dari 
project yang saya buat: 
-Activity Diagram Login 
 
-Activity Diagram Super Admin Mengelola Admin 
 


----------------------------------------

## Halaman 8

-Activity Diagram Super Admin Mengelola Customer 
 
-Activity Diagram Super Admin Mengelola Data Transaksi 
 
 
 


----------------------------------------

## Halaman 9

- Activity Diagram Super Admin Mengelola Data Destinasi 
 
- Activity Diagram Super Admin Mengelola Data Paket Wisata 
 
 


----------------------------------------
