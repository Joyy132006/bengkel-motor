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
        $products  = \App\Models\Product::all();

        $statistik = [
            'total'   => Booking::count(),
            'antre'   => Booking::where('status_servis', 'Menunggu Antrean')->count(),
            'proses'  => Booking::where('status_servis', 'Sedang Dikerjakan')->count(),
            'selesai' => Booking::where('status_servis', 'Selesai')->count(),
        ];

        return view('dashboard', compact('bookings', 'mechanics', 'products', 'statistik', 'cariPlat'));
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
        $products = \App\Models\Product::all();
        return view('produk', compact('products'));
    }

    /** Simpan Produk Baru ke Katalog (Admin Only) */
    public function simpanProduk(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required',
            'desc' => 'nullable',
        ]);

        $category = $request->input('category');
        $icon = 'settings';
        $image = 'vbelt_kit_federal.png';

        if ($category === 'Ban') {
            $icon = 'disc';
            $image = 'planeto_gold.png';
        } elseif ($category === 'Oli') {
            $icon = 'droplets';
            $image = 'xten_ester_synthetic.png';
        } elseif ($category === 'Aki') {
            $icon = 'battery';
            $image = 'yuasa_battery.png';
        }

        \App\Models\Product::create([
            'name' => $request->input('name'),
            'category' => $category,
            'brand' => $request->input('brand'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'desc' => $request->input('desc'),
            'icon' => $icon,
            'image' => $image,
        ]);

        return redirect()->route('dashboard')->with('success', 'Produk berhasil ditambahkan ke katalog!');
    }

    /** Update Produk Existing (Admin Only) */
    public function updateProduk(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required',
            'desc' => 'nullable',
        ]);

        $product = \App\Models\Product::findOrFail($id);
        
        $category = $request->input('category');
        $icon = $product->icon;
        $image = $product->image;

        if ($category !== $product->category) {
            if ($category === 'Ban') {
                $icon = 'disc';
                $image = 'planeto_gold.png';
            } elseif ($category === 'Oli') {
                $icon = 'droplets';
                $image = 'xten_ester_synthetic.png';
            } elseif ($category === 'Aki') {
                $icon = 'battery';
                $image = 'yuasa_battery.png';
            } else {
                $icon = 'settings';
                $image = 'vbelt_kit_federal.png';
            }
        }

        $product->update([
            'name' => $request->input('name'),
            'category' => $category,
            'brand' => $request->input('brand'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'desc' => $request->input('desc'),
            'icon' => $icon,
            'image' => $image,
        ]);

        return redirect()->route('dashboard')->with('success', 'Produk berhasil diperbarui!');
    }

    /** Hapus Produk dari Katalog (Admin Only) */
    public function hapusProduk($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Produk berhasil dihapus dari katalog!');
    }
}
