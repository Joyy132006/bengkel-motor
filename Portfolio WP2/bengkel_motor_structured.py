# ==============================================================================
# PROGRAM KASIR & BOOKING BENGKEL MOTOR (BENGKELPRO)
# Mengimplementasikan Pemrograman Terstruktur (J.620100.017.02)
# Oleh: Nugraha Jody Prasetya (NIM: 17240181) | Kelas: 17.4A.04
# ==============================================================================

# 2. Tampilan import os (Membersihkan layar & interaksi OS)
import os
# 3. Tampilan import sys (Menghentikan eksekusi program)
import sys
# 9. Tampilan library pandas (Manipulasi & cetak tabel data)
import pandas as pd

# 11. Tampilan Array (List kosong untuk menyimpan data transaksi)
kode_layanan = []
jumlah_motor = []
nama_layanan = []
harga_layanan = []
total_harga = []

# 4. Tampilan Class (OOP - Object Oriented Programming)
class TimMekanik:
    # Special method __init__ untuk inisialisasi objek
    def __init__(data, id_mekanik, nama, keahlian):
        data.id_mekanik = id_mekanik
        data.nama = nama
        data.keahlian = keahlian
    
    # Method untuk menampilkan data mekanik
    def tampil_info(data):
        print(f"ID Mekanik : {data.id_mekanik}")
        print(f"Nama       : {data.nama}")
        print(f"Keahlian   : {data.keahlian}")

# 5. Tampilan Function (Fungsi untuk cetak header info bengkel)
def info_bengkel():
    # 1. Tampilan Perintah Print
    print("=" * 67)
    print(" " * 20 + "BENGKEL MOTOR KASIR BENGKELPRO" + " " * 17)
    print(" " * 15 + "JL. RAYA BENGKEL NO. 101, JAKARTA SELATAN" + " " * 11)
    print("=" * 67)

# Fungsi untuk melihat profil pembuat aplikasi (Author)
def lihat_author():
    os.system('cls' if os.name == 'nt' else 'clear')
    info_bengkel()
    print("\n" + " " * 21 + "--- PROFIL PEMBUAT (AUTHOR) ---")
    print("-" * 67)
    print("Nama Mahasiswa  : Nugraha Jody Prasetya")
    print("NIM             : 17240181")
    print("Kelas           : 17.4A.04")
    print("Mata Kuliah     : Web Programming II (WP2)")
    print("Deskripsi       : Portofolio Tugas 1 Pemrograman Terstruktur")
    print("-" * 67)
    print("=" * 67)
    input("\nTekan Enter untuk kembali ke menu utama...")

# Fungsi untuk melihat daftar tim mekanik (Implementasi OOP)
def lihat_mekanik():
    os.system('cls' if os.name == 'nt' else 'clear')
    info_bengkel()
    print("\n--- TIM MEKANIK AKTIF (OOP CLASS) ---")
    
    # Membuat objek instance dari class TimMekanik
    mekanik1 = TimMekanik("MK-01", "Budi Santoso", "Spesialis CVT & Transmisi")
    mekanik2 = TimMekanik("MK-02", "Joko Susilo", "Spesialis Overhaul & Mesin")
    mekanik3 = TimMekanik("MK-03", "Rian Hidayat", "Spesialis Kelistrikan & Injeksi")
    
    # Pemanggilan method list objek
    mekanik1.tampil_info()
    print("-" * 35)
    mekanik2.tampil_info()
    print("-" * 35)
    mekanik3.tampil_info()
    print("=" * 67)
    
    input("\nTekan Enter untuk kembali ke menu utama...")

# Fungsi utama untuk melakukan input transaksi booking servis
def transaksi():
    os.system('cls' if os.name == 'nt' else 'clear')
    info_bengkel()
    
    print("DAFTAR JASA SERVIS MOTOR YANG TERSEDIA:")
    print("-" * 65)
    print("Kode Layanan | Jenis Servis              | Harga Jasa")
    print("-" * 65)
    print("     S       | Servis Ringan + CVT       | Rp. 80,000")
    print("     O       | Ganti Oli Mesin & Gardan  | Rp. 50,000")
    print("     B       | Servis Besar (Overhaul)   | Rp. 250,000")
    print("     R       | Ganti Kampas Rem Depan/Blk| Rp. 35,000")
    print("=" * 67)

    # 6. Tampilan Variable (Menyimpan jumlah data inputan)
    try:
        jumdat = int(input("Masukkan Jumlah Layanan yang Akan Di-booking: "))
    except ValueError:
        print("Input harus berupa angka!")
        input("\nTekan Enter untuk kembali...")
        return

    # Reset list data sebelum transaksi baru dimulai
    kode_layanan.clear()
    nama_layanan.clear()
    harga_layanan.clear()
    jumlah_motor.clear()
    total_harga.clear()

    # 7. Tampilan perulangan (looping) menggunakan While
    i = 0
    while i < jumdat:
        print("-" * 65)
        print("Data ke-", i + 1)
        
        kode = input("Masukkan Kode Layanan [S/O/B/R] : ").upper()
        
        # 8. Tampilan Percabangan (if-elif-else) untuk menentukan layanan
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
            
        try:
            qty = int(input("Jumlah Motor Yang Diservis       : "))
        except ValueError:
            qty = 0

        # Menyimpan data input ke dalam array/list
        kode_layanan.append(kode)
        nama_layanan.append(jenis)
        harga_layanan.append(harga)
        jumlah_motor.append(qty)
        
        # 10. Tampilan Operator Aritmatika (Perkalian * untuk subtotal)
        subtotal = harga * qty
        total_harga.append(subtotal)
        
        # Operator Aritmatika Penjumlahan (i = i + 1) untuk increment loop
        i = i + 1

    # Membersihkan layar untuk struk cetak
    os.system('cls' if os.name == 'nt' else 'clear')
    info_bengkel()
    
    # 9. Tampilan library pandas (Membuat DataFrame untuk tabel struk kasir)
    data_tabel = {
        'Kode': kode_layanan,
        'Nama Layanan': nama_layanan,
        'Harga Satuan': harga_layanan,
        'Jumlah (Qty)': jumlah_motor,
        'Subtotal': total_harga
    }
    df = pd.DataFrame(data_tabel)
    
    print("\nSTRUK RINGKASAN BOOKING SERVIS BENGKELPRO")
    print("-" * 67)
    print(df.to_string(index=False))
    print("-" * 67)
    
    # Operator Aritmatika Penjumlahan (Menghitung total keseluruhan)
    total_pembelian = sum(total_harga)
    print(f"Total Biaya Servis  : Rp. {total_pembelian:,.2f}")
    
    # Operator Aritmatika Pengurangan (Menghitung kembalian uang)
    try:
        jumlah_bayar = float(input("Jumlah Uang Bayar   : Rp. "))
        total_kembalian = jumlah_bayar - total_pembelian
        
        if total_kembalian >= 0:
            print(f"Total Kembalian     : Rp. {total_kembalian:,.2f}")
        else:
            print(f"Uang Anda Kurang    : Rp. {abs(total_kembalian):,.2f}")
    except ValueError:
        print("Input pembayaran tidak valid!")
        
    print("=" * 67)
    input("\nTekan Enter untuk kembali ke menu utama...")

# Loop menu utama aplikasi kasir bengkel
def menu_utama():
    # 12. Tampilan Komentar (Komentar penjelas perulangan while utama)
    # Perulangan ini akan terus berjalan sampai pengguna memilih menu 4 (Keluar)
    while True:
        os.system('cls' if os.name == 'nt' else 'clear')
        info_bengkel()
        print("MENU UTAMA KASIR BENGKELPRO:")
        print("1. Transaksi Servis Baru")
        print("2. Lihat Profil Pembuat (Author)")
        print("3. Lihat Tim Mekanik (OOP)")
        print("4. Keluar Aplikasi")
        print("-" * 35)
        
        pilihan = input("Masukkan pilihan anda [1/2/3/4]: ")
        
        if pilihan == "1":
            transaksi()
        elif pilihan == "2":
            lihat_author()
        elif pilihan == "3":
            lihat_mekanik()
        elif pilihan == "4":
            print("\nTerima kasih! Semoga motor pelanggan Anda awet selalu.")
            sys.exit()
        else:
            print("\nPilihan salah! Silakan coba lagi.")
            input("Tekan Enter untuk melanjutkan...")

# Entry point program
if __name__ == '__main__':
    menu_utama()
