<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Booking;
use App\Models\Mechanic; // <-- 1. IMPORT MODEL MEKANIK
use Illuminate\Support\Facades\Validator;

class WorkshopController extends Controller
{
    public function index()
    {
        $cariPlat = request()->input('cari');
        $query = Booking::with('mechanic')->latest();

        if ($cariPlat) {
            $query->where(function ($q) use ($cariPlat) {
                $q->where('nomer_plat', 'like', '%' . $cariPlat . '%')
                    ->orWhere('nama_pelanggan', 'like', '%' . $cariPlat . '%');
            });
        }

        $bookings  = $query->get();
        $mechanics = Mechanic::all();

        $statistik = [
            'total'   => Booking::count(),
            'antre'   => Booking::where('status_servis', 'Menunggu Antrean')->count(),
            'proses'  => Booking::where('status_servis', 'Sedang Dikerjakan')->count(),
            'selesai' => Booking::where('status_servis', 'Selesai')->count(),
        ];

        return view('dashboard', compact('bookings', 'mechanics', 'statistik', 'cariPlat'));
    }

    // 2. FUNGSI BARU: Untuk simpan data Mekanik (Montir)
    public function testSimpanMekanik(Request $request)
    {
        $mekanik = Mechanic::create([
            'nama_mekanik' => $request->input('nama', 'Agus Racing'),
            'keahlian'     => $request->input('ahli', 'Spesialis Mesin Bore Up'),
        ]);

        return response()->json([
            'pesan' => 'Mantap! Mekanik baru berhasil terdaftar.',
            'data'  => $mekanik
        ]);
    }

    public function testSimpan(Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'plat' => 'required|unique:bookings,nomer_plat',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'pesan' => 'Waduh, datanya ditolak satpam backend!',
                'error_detail' => $validator->errors()
            ], 422);
        }

        // 3. UPDATE: Sekarang menyertakan mechanic_id saat simpan booking
        $testData = Booking::create([
            'nama_pelanggan'  => $request->input('nama', 'Nugraha Jody'),
            'nomer_plat'      => $request->input('plat', 'B 4567 KXY'),
            'tipe_motor'      => $request->input('motor', 'Honda Spacy'),
            'tanggal_booking' => $request->input('tanggal', '2026-05-20'),
            'jam_booking'     => $request->input('jam', '14:00'),
            'mechanic_id'     => $request->input('mechanic_id'), // Menangkap ID Mekanik dari URL
        ]);

        return response()->json([
            'pesan' => 'Gokil! Data lolos sensor dan tersimpan!',
            'data' => $testData
        ]);
    }

    // 4. FUNGSI BARU: Untuk nampilin Booking lengkap dengan nama Mekaniknya
    public function testTampilRelasi()
    {
        // "with('mechanic')" adalah kunci sakti relasi (Eager Loading)
        $data = Booking::with('mechanic')->get();

        return response()->json([
            'pesan' => 'Berhasil mengambil data booking dan montirnya!',
            'total' => $data->count(),
            'data'  => $data
        ]);
    }

    public function testTampil(Request $request)
    {
        $cariPlat = $request->input('cari');
        $query = Booking::latest();

        if ($cariPlat) {
            $query->where('nomer_plat', 'like', '%' . $cariPlat . '%');
        }

        $semuaBookingan = $query->get();

        return response()->json([
            'pesan' => 'Berhasil mengambil data dari database!',
            'total_data' => $semuaBookingan->count(),
            'data_booking' => $semuaBookingan
        ]);
    }

    public function testUpdate(Request $request, $id)
    {
        $bookingan = Booking::find($id);

        if (!$bookingan) {
            return response()->json(['pesan' => 'Waduh, data booking tidak ditemukan!'], 404);
        }

        $statusBaru = $request->input('status', 'Sedang Dikerjakan');

        $bookingan->update([
            'status_servis' => $statusBaru
        ]);

        return response()->json([
            'pesan' => 'Mantap! Status servis berhasil diperbarui secara dinamis.',
            'data_terbaru' => $bookingan
        ]);
    }

    public function testHapus($id)
    {
        $bookingan = Booking::find($id);

        if (!$bookingan) {
            return response()->json(['pesan' => 'Waduh, data yang mau dihapus gak ketemu!'], 404);
        }

        $bookingan->delete();

        return response()->json([
            'pesan' => 'Sip! Data booking berhasil dihapus dari database.'
        ]);
    }

    public function ambilStatistik()
    {
        $totalBooking = Booking::count();
        $totalAntre = Booking::where('status_servis', 'Menunggu Antrean')->count();
        $totalProses = Booking::where('status_servis', 'Sedang Dikerjakan')->count();
        $totalSelesai = Booking::where('status_servis', 'Selesai')->count();

        return response()->json([
            'pesan' => 'Ini laporan ringkasan bengkel kamu hari ini, Bos!',
            'ringkasan' => [
                'total_semua_motor' => $totalBooking,
                'menunggu_antrean'  => $totalAntre,
                'sedang_dikerjakan' => $totalProses,
                'siap_diambil'      => $totalSelesai
            ]
        ]);
    }
    // Pastikan namanya cetakPDF, bukan cetakNota
    public function cetakPDF($id)
    {
        $booking = Booking::with('mechanic')->findOrFail($id);

        // Hanya cetak jika sudah LUNAS
        if ($booking->status_pembayaran !== 'Lunas') {
            abort(403, 'Nota hanya bisa dicetak setelah pembayaran dikonfirmasi (Lunas).');
        }

        $pdf = Pdf::loadView('nota_booking', compact('booking'));
        return $pdf->stream('Nota-' . $booking->nomer_plat . '.pdf');
    }

    // Konfirmasi pembayaran — hanya kasir/admin
    public function konfirmasiBayar(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Hanya bisa konfirmasi bayar jika servis sudah Selesai
        if ($booking->status_servis !== 'Selesai') {
            return back()->with('error', 'Motor belum selesai dikerjakan. Tidak bisa konfirmasi pembayaran.');
        }

        $booking->update([
            'status_pembayaran' => 'Lunas',
            'total_harga' => $request->input('total_harga', 0),
        ]);

        return back()->with('success', 'Pembayaran untuk ' . $booking->nama_pelanggan . ' sebesar Rp ' . number_format($booking->total_harga, 0, ',', '.') . ' berhasil dikonfirmasi!');
    }

    // Assign mekanik ke booking — hanya admin
    public function assignMekanik($id, Request $request)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['mechanic_id' => $request->mechanic_id ?: null]);

        $nama = $booking->nama_pelanggan;
        return back()->with('sukses', "Mekanik berhasil ditetapkan untuk booking {$nama}.");
    }

    // ===== FRONTEND METHODS =====

    public function simpanBooking(Request $request)
    {
        $request->validate([
            'nama_pelanggan'  => 'required|min:3',
            'nomer_plat'      => 'required',
            'tipe_motor'      => 'required',
            'tanggal_booking' => 'required|date',
            'jam_booking'     => 'required',
        ]);

        Booking::create([
            'nama_pelanggan'  => $request->nama_pelanggan,
            'nomer_plat'      => strtoupper($request->nomer_plat),
            'tipe_motor'      => $request->tipe_motor,
            'keluhan'         => $request->keluhan,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_booking'     => $request->jam_booking,
            'mechanic_id'     => $request->mechanic_id ?: null,
            'status_servis'   => 'Menunggu Antrean',
        ]);

        return redirect('/dashboard')->with('sukses', 'Booking baru berhasil ditambahkan! 🎉');
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status_servis' => $request->status]);

        return redirect('/dashboard' . ($request->input('cari') ? '?cari=' . $request->input('cari') : ''))
            ->with('sukses', 'Status booking berhasil diperbarui! ✅');
    }

    public function hapusBooking($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect('/dashboard')->with('sukses', 'Booking berhasil dihapus dari sistem.');
    }

    public function simpanMekanik(Request $request)
    {
        // ── KODE YANG DIPERBAIKI UNTUK SS LANGKAH 2B ──
        $request->validate([
            'nama_mekanik' => 'required|min:3', // <-- DIPERBAIKI: Disamakan dengan name input form
            'keahlian'     => 'required',
        ]);

        Mechanic::create([
            'nama_mekanik' => $request->nama_mekanik,
            'keahlian'     => $request->keahlian,
        ]);

        return redirect('/dashboard#mekanik')->with('sukses', 'Mekanik baru berhasil ditambahkan! 🔧');
    }

    public function updateMekanik(Request $request, $id)
    {
        $request->validate([
            'nama_mekanik' => 'required|min:3',
            'keahlian'     => 'required',
        ]);

        $m = Mechanic::findOrFail($id);
        $m->update([
            'nama_mekanik' => $request->nama_mekanik,
            'keahlian'     => $request->keahlian,
        ]);

        return redirect('/dashboard#mekanik')->with('sukses', 'Data mekanik berhasil diperbarui! 🔧');
    }

    public function hapusMekanik($id)
    {
        $m = Mechanic::findOrFail($id);
        Booking::where('mechanic_id', $id)->update(['mechanic_id' => null]);
        $m->delete();
        return redirect('/dashboard#mekanik')->with('sukses', 'Mekanik berhasil dihapus dari sistem.');
    }

    // ===== PUBLIC CUSTOMER METHODS =====

    /** Booking oleh customer */
    public function bookingCustomer(Request $request)
    {
        // Jika login sebagai customer, paksa nama_pelanggan mengikuti nama user akun
        if (auth()->check() && auth()->user()->role === 'customer') {
            $request->merge(['nama_pelanggan' => auth()->user()->name]);
        }

        $request->validate([
            'nama_pelanggan'  => 'required|min:3|max:100',
            'nomer_plat'      => 'required|max:15',
            'tipe_motor'      => 'required|max:100',
            'keluhan'         => 'nullable|max:500',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'jam_booking'     => 'required',
        ], [
            'nama_pelanggan.required'  => 'Nama lengkap wajib diisi.',
            'nama_pelanggan.min'       => 'Nama minimal 3 karakter.',
            'nomer_plat.required'      => 'Nomer plat wajib diisi.',
            'tipe_motor.required'      => 'Tipe motor wajib diisi.',
            'tanggal_booking.required' => 'Tanggal booking wajib diisi.',
            'tanggal_booking.after_or_equal' => 'Tanggal tidak boleh sebelum hari ini.',
            'jam_booking.required'     => 'Jam booking wajib diisi.',
        ]);

        $plat = strtoupper(trim($request->nomer_plat));

        Booking::create([
            'user_id'         => auth()->check() ? auth()->id() : null,
            'nama_pelanggan'  => $request->nama_pelanggan,
            'nomer_plat'      => $plat,
            'tipe_motor'      => $request->tipe_motor,
            'keluhan'         => $request->keluhan,
            'tanggal_booking' => $request->tanggal_booking,
            'jam_booking'     => $request->jam_booking,
            'status_servis'   => 'Menunggu Antrean',
            'mechanic_id'     => null,
        ]);

        return redirect('/booking')->with('booking_sukses', $plat);
    }

    /** Halaman Booking Online (public) */
    public function showBooking()
    {
        return view('booking');
    }

    /** Cek status servis by nomer plat (public) */
    public function cekStatus(Request $request)
    {
        $plat    = strtoupper(trim($request->input('plat', '')));
        $results = collect();

        if ($plat) {
            $results = Booking::with('mechanic')
                ->where('nomer_plat', $plat)
                ->orderBy('tanggal_booking', 'desc')
                ->get();
        }

        // Simpan sebagai array plain agar session tidak error serialisasi
        return redirect('/cek-status')
            ->with('cek_plat', $plat)
            ->with('cek_results', $results->toArray());
    }

    /** Halaman Cek Status Servis (public) */
    public function showCekStatus()
    {
        return view('cek-status');
    }

    /** Halaman Katalog Produk & Suku Cadang (public) */
    public function produkCatalog()
    {
        $products = [
            // --- KATEGORI: BAN ---
            [
                'name' => 'Michelin Pilot Street Ring 14',
                'category' => 'Ban',
                'brand' => 'Michelin',
                'price' => 350000,
                'stock' => 'Tersedia',
                'desc' => 'Ban tubeless premium dengan cengkeraman maksimal di jalan basah dan kering.',
                'icon' => 'disc',
                'image' => 'michelin_pilot_street.png'
            ],
            [
                'name' => 'Michelin City Grip 2 Ring 14',
                'category' => 'Ban',
                'brand' => 'Michelin',
                'price' => 420000,
                'stock' => 'Tersedia',
                'desc' => 'Ban skuter premium dengan alur ban labirin untuk pembuangan air sangat maksimal.',
                'icon' => 'disc',
                'image' => 'michelin_pilot_street.png'
            ],
            [
                'name' => 'Pirelli Diablo Rosso Sport',
                'category' => 'Ban',
                'brand' => 'Pirelli',
                'price' => 490000,
                'stock' => 'Tersedia',
                'desc' => 'Ban sport balap premium ring 17 untuk kestabilan tinggi pada kecepatan penuh.',
                'icon' => 'disc',
                'image' => 'pirelli_diablo_rosso.png'
            ],
            [
                'name' => 'Pirelli Angel Scooter Ring 14',
                'category' => 'Ban',
                'brand' => 'Pirelli',
                'price' => 395000,
                'stock' => 'Tersedia',
                'desc' => 'Ban harian premium dengan struktur tangguh untuk kenyamanan melintasi jalan berlubang.',
                'icon' => 'disc',
                'image' => 'pirelli_angel_scooter.png'
            ],
            [
                'name' => 'Planeto Gold Ring 14',
                'category' => 'Ban',
                'brand' => 'Planeto',
                'price' => 215000,
                'stock' => 'Tersedia',
                'desc' => 'Ban awet dan hemat bahan bakar dengan pola kembangan yang modern dan dalam.',
                'icon' => 'disc',
                'image' => 'planeto_gold.png'
            ],
            [
                'name' => 'FDR Sport XR Evo Ring 14',
                'category' => 'Ban',
                'brand' => 'FDR',
                'price' => 260000,
                'stock' => 'Stok Terbatas',
                'desc' => 'Ban tubeless harian dengan desain sporty untuk kenyamanan manuver tajam.',
                'icon' => 'disc',
                'image' => 'fdr_sport_xr.png'
            ],
            [
                'name' => 'Aspira Premio Sportivo Ring 14',
                'category' => 'Ban',
                'brand' => 'Aspira',
                'price' => 245000,
                'stock' => 'Tersedia',
                'desc' => 'Didesain khusus dengan teknologi Italia menghasilkan keawetan ban luar biasa.',
                'icon' => 'disc',
                'image' => 'planeto_gold.png'
            ],
            // --- KATEGORI: OLI ---
            [
                'name' => 'X-Ten Ester Synthetic Matic 10W-30',
                'category' => 'Oli',
                'brand' => 'X-Ten',
                'price' => 55000,
                'stock' => 'Tersedia',
                'desc' => 'Oli motor matic super premium berbasis ester untuk menjaga mesin tetap dingin dan bertenaga.',
                'icon' => 'droplets',
                'image' => 'xten_ester_synthetic.png'
            ],
            [
                'name' => 'Shell Advance AX7 Matic 10W-30',
                'category' => 'Oli',
                'brand' => 'Shell',
                'price' => 65000,
                'stock' => 'Tersedia',
                'desc' => 'Oli semi-sintetis matic dengan teknologi pembersih aktif untuk mencegah pengendapan kotoran.',
                'icon' => 'droplets',
                'image' => 'shell_advance_ax7.png'
            ],
            [
                'name' => 'Castrol Power1 10W-40 4T',
                'category' => 'Oli',
                'brand' => 'Castrol',
                'price' => 58000,
                'stock' => 'Tersedia',
                'desc' => 'Formulasi 3-in-1 untuk akselerasi instan, perlindungan mesin luar biasa, dan perpindahan gigi mulus.',
                'icon' => 'droplets',
                'image' => 'castrol_power1.png'
            ],
            [
                'name' => 'Motul GP Power 4T 10W-40',
                'category' => 'Oli',
                'brand' => 'Motul',
                'price' => 75000,
                'stock' => 'Tersedia',
                'desc' => 'Oli berlisensi resmi MotoGP untuk perlindungan aus maksimal dan respons tarikan instan.',
                'icon' => 'droplets',
                'image' => 'motul_gp_power.png'
            ],
            [
                'name' => 'Pertamina Enduro Matic-G 20W-40',
                'category' => 'Oli',
                'brand' => 'Pertamina',
                'price' => 45000,
                'stock' => 'Tersedia',
                'desc' => 'Oli matic berkualitas tinggi yang andal melindungi mesin dari gesekan ekstrem jalanan kota.',
                'icon' => 'droplets',
                'image' => 'pertamina_enduro.png'
            ],
            [
                'name' => 'Yamalube Super Matic 10W-40',
                'category' => 'Oli',
                'brand' => 'Yamaha',
                'price' => 70000,
                'stock' => 'Tersedia',
                'desc' => 'Oli full sintetis khusus untuk skuter matik premium berkapasitas besar.',
                'icon' => 'droplets',
                'image' => 'xten_ester_synthetic.png'
            ],
            [
                'name' => 'X-Ten Gear Oil Matic 120ml',
                'category' => 'Oli',
                'brand' => 'X-Ten',
                'price' => 18000,
                'stock' => 'Tersedia',
                'desc' => 'Pelumas roda gigi transmisi otomatis matic untuk suara mesin halus dan perpindahan gigi responsif.',
                'icon' => 'droplets',
                'image' => 'xten_gear_oil.png'
            ],
            // --- KATEGORI: AKI ---
            [
                'name' => 'GS Astra MF YTZ-5S',
                'category' => 'Aki',
                'brand' => 'GS Astra',
                'price' => 245000,
                'stock' => 'Tersedia',
                'desc' => 'Aki kering bebas perawatan (maintenance-free) kualitas bawaan pabrik dengan starter andal.',
                'icon' => 'battery',
                'image' => 'gs_astra_battery.png'
            ],
            [
                'name' => 'Yuasa MF YTZ-5S',
                'category' => 'Aki',
                'brand' => 'Yuasa',
                'price' => 230000,
                'stock' => 'Tersedia',
                'desc' => 'Aki kering dengan performa start tinggi dan daya tahan ekstra di segala cuaca.',
                'icon' => 'battery',
                'image' => 'yuasa_battery.png'
            ],
            [
                'name' => 'Motobatt Gel MTZ5S',
                'category' => 'Aki',
                'brand' => 'Motobatt',
                'price' => 265000,
                'stock' => 'Tersedia',
                'desc' => 'Aki gel premium berdaya starter sangat tinggi dengan umur pakai hingga 2 kali aki biasa.',
                'icon' => 'battery',
                'image' => 'motobatt_gel.png'
            ],
            // --- KATEGORI: SUKU CADANG ---
            [
                'name' => 'Kampas Rem Depan Cakram',
                'category' => 'Suku Cadang',
                'brand' => 'Astra Otoparts',
                'price' => 45000,
                'stock' => 'Tersedia',
                'desc' => 'Kampas rem depan bahan keramik tidak merusak piringan cakram, pakem, dan bebas bising.',
                'icon' => 'settings',
                'image' => 'kampas_rem_depan.png'
            ],
            [
                'name' => 'Kampas Rem Belakang Tromol',
                'category' => 'Suku Cadang',
                'brand' => 'Astra Otoparts',
                'price' => 38000,
                'stock' => 'Tersedia',
                'desc' => 'Kampas rem tromol pakem dengan daya tahan panas tinggi untuk keselamatan berkendara.',
                'icon' => 'settings',
                'image' => 'kampas_rem_depan.png'
            ],
            [
                'name' => 'V-Belt Kit Federal Matic',
                'category' => 'Suku Cadang',
                'brand' => 'Federal',
                'price' => 135000,
                'stock' => 'Tersedia',
                'desc' => 'Paket V-belt dan roller berkualitas OEM untuk meminimalkan slip dan menjaga akselerasi matic.',
                'icon' => 'settings',
                'image' => 'vbelt_kit_federal.png'
            ],
            [
                'name' => 'Busi NGK Iridium CPR9EAIX-9',
                'category' => 'Suku Cadang',
                'brand' => 'NGK',
                'price' => 95000,
                'stock' => 'Stok Terbatas',
                'desc' => 'Busi iridium premium untuk pengapian presisi, starter lebih cepat, dan efisiensi bahan bakar maksimal.',
                'icon' => 'settings',
                'image' => 'busi_ngk_iridium.png'
            ],
            [
                'name' => 'Shockbreaker Belakang KYB Zeto 300mm',
                'category' => 'Suku Cadang',
                'brand' => 'Kayaba',
                'price' => 310000,
                'stock' => 'Tersedia',
                'desc' => 'Suspensi belakang premium empuk dengan setelan preload yang bisa disesuaikan beban berkendara.',
                'icon' => 'settings',
                'image' => 'kyb_zeto.png'
            ],
            [
                'name' => 'Filter Udara Aspira Honda Beat FI',
                'category' => 'Suku Cadang',
                'brand' => 'Aspira',
                'price' => 42000,
                'stock' => 'Tersedia',
                'desc' => 'Saringan udara presisi tinggi untuk menyaring debu secara optimal dan menjaga tarikan motor.',
                'icon' => 'settings',
                'image' => 'vbelt_kit_federal.png'
            ]
        ];

        return view('produk', compact('products'));
    }
}
