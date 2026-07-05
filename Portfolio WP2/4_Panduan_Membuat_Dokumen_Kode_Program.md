# PANDUAN TUGAS 4: Membuat Dokumen Kode Program

Berikut adalah ekstraksi instruksi langkah-langkah kerja untuk Tugas 4 dari file PDF asli.

## Halaman 1

Unit Kompetensi   Kode Unit   :  J. 620100.023.02 
 Judul Unit   :  Membuat Dokumen Kode Program 
 
1. Penggunaan Komentar 
Pada Laravel, penggunaan komentar sangat penting untuk memudahkan pengembang 
dalam memahami kode, berkolaborasi dalam tim, serta memelihara dan memperbarui 
aplikasi di masa depan. Komentar digunakan untuk menjelaskan logika, tujuan, dan fungsi 
bagian-bagian tertentu dalam kode. 
 
2. Pembuatan Model Transaksi 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 2

-Model bertanggung jawab untuk menangani logika bisnis aplikasi, mengelola interaksi 
dengan database, dan memberikan data kepada controller dan view. Model sering kali 
digunakan untuk berinteraksi dengan data, baik itu mengambil, menyimpan, memperbarui, 
atau menghapus data dalam database. 
-Letak model terdapat di di dalam folder app/Models 
 
3. Pembuatan View index Transaksi di folder v_transaksi dengan nama file 
index.blade.php. 
 
-Di Laravel, View adalah bagian dari arsitektur MVC (Model -View-Controller) yang 
bertanggung jawab untuk menampilkan antarmuka pengguna (UI) atau tampilan (UI). View 
mengatur bagaimana data yang dikirimkan dari controller disajikan kepada pengguna dalam 
bentuk HTML, CSS, dan JavaScript. 
-Letak view terdapat di dalam folder resources/views 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 3

4. Pembuatan TransaksiController dengan function index. 
 
-Controller adalah bagian dari arsitektur MVC (Model-View-Controller) yang bertanggung 
jawab untuk menangani logika aplikasi, menerima input dari pengguna, memprosesnya, dan 
kemudian mengirimkan hasilnya ke View untuk ditampilkan. Controller juga menghubungkan 
antara Model dan View, dengan mengatur alur data yang akan diteruskan ke tampilan. 
-Letak controller terdapat di dalam folder app/Http/Controllers. 
 
5. Pembuatan Vie w Create Transaksi di folder v_transaksi dengan nama file 
create.blade.php. 
 
 
 
 
 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 4

6. Pembuatan TransaksiController dengan function create dan store. 
 
7. Pembuatan View edit Transaksi di folder v_transaksi dengan nama file edit.blade.php. 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 5

8. Pembuatan TransaksiController dengan function edit dan update. 
 
9. Pembuatan View detail Transaksi di folder v_transaksi dengan nama file detail.blade.php. 
 
 
 
 
 
 
 


----------------------------------------

## Halaman 6

10. Pembuatan TransaksiController dengan function show. 
 
-Berikut kodel lengkapnya: 
-Kode lengkap model Transaksi: 
<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class Transaksi extends Model 
{ 
     
    protected $table = 'transaksi'; 
 
    protected $guarded = ['id']; 
 
    public function anggota() 
    { 
        return $this->belongsTo(Anggota::class, 'anggota_id'); 
    } 
 
    public function details() 
    { 
        return $this->hasMany(TransaksiDetail::class, 'notran', 'notran'); 
    } 
 
    public function user() 
    { 
        return $this->belongsTo(User::class, 'user_id'); 
    } 


----------------------------------------

## Halaman 7

    public function produk() 
    { 
        return $this->belongsTo(Produk::class, 'produk_id'); 
    } 
 
    protected $dates = ['tanggal_awal', 'tanggal_akhir']; 
 
    public function detail() 
    { 
        return $this->hasMany(TransaksiDetail::class, 'notran', 'notran'); 
    } 
} 
 
 
-Kode lengkap View Index Transaksi: 
@extends('backend.v_layouts.app') 
@section('content') 
 
<div class="col-xs-12"> 
    <div class="box-content"> 
        <br><h4 class="box-title">{{ $judul }}</h4> 
        <div class="page-content fade-in-up"> 
            <div class="ibox"> 
                <div class="ibox-head"> 
                    <div class="box-content"> 
                        <a href="{{ route('transaksi.create') }}"> 
                            <button type="button" class="btn btn-icon btn-
icon-left btn-info btn-xs waves-effect waves-light"> 
                                <i class="ico fa fa-plus"></i>Tambah 
                            </button> 
                        </a> 
                    </div> 
                </div> 
                <div class="ibox-body"> 
                    <table id="example" class="table table-striped table-
bordered display" style="width:100%"> 
                        <thead> 
                            <tr> 
                                <th>No</th> 
                                <th>No. Tran</th> 
                                <th>Customer</th> 
                                <th>Nama Paket Wisata</th> 
                                <th>Tanggal Awal</th> 
                                <th>Tanggal Akhir</th> 
                                <th>Status Bayar</th> 
                                <th>Total</th> 
                                <th>Aksi</th> 
                            </tr> 

----------------------------------------

## Halaman 8

                        </thead> 
                        <tbody> 
                            @foreach ($index as $row) 
                            <tr> 
                                <td>{{ $loop->iteration }}</td> 
                                <td>{{ $row->notran }}</td> 
                                <td>{{ $row->anggota->user->nama }}</td> 
                                <td> 
                                     
                                        @foreach($row->detail as $detail) 
                                            <li>{{ $detail->produk-
>nama_produk }}</li> 
                                        @endforeach 
                                     
                                </td> 
                                <td>{{ $row->tanggal_awal }}</td> 
                                <td>{{ $row->tanggal_akhir }}</td> 
                                <td>{{ $row->status == 1 ? 'Lunas' : 'Belum 
Lunas' }}</td> 
                                <td>Rp. {{ number_format($row->total_bayar, 0, 
',', '.') }}</td> 
                                <td> 
                                    <a href="{{ route('transaksi.show', $row-
>id) }}" title="Detail Data"> 
                                        <span class="label label-primary"><i 
class="fa fa-eye"></i> Detail</span> 
                                    </a> 
                                    <a href="{{ route('transaksi.edit', $row-
>id) }}" title="Ubah Data"> 
                                        <span class="label label-primary"><i 
class="fa fa-edit"></i> Ubah</span> 
                                    </a> 
                                    <form method="POST" action="{{ 
route('transaksi.destroy', $row->id) }}" style="display: inline-block;"> 
                                        @method('delete') 
                                        @csrf 
                                        <button type="submit" class="label 
label-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete' data-
konf-delete="{{ $row->notran }}"><i class="fa fa-trash"></i> Hapus</button> 
                                    </form> 
                                </td> 
                            </tr> 
                            @endforeach 
                        </tbody> 
                    </table> 
                </div> 
            </div> 
        </div> 

----------------------------------------

## Halaman 9

    </div> 
</div> 
@endsection 
 
 
-Kode lengkap View Create Transaksi: 
@extends('backend.v_layouts.app') 
@section('content') 
 
<br><h4 class="box-title">{{ $judul }}</h4> 
<div class="page-content fade-in-up"> 
    <div class="row"> 
        <div class="col-lg-12 col-xs-12"> 
            <div class="ibox"> 
                <div class="ibox-body"> 
                    <form action="{{ route('transaksi.store') }}" 
method="post"> 
                        @csrf 
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label>No. Transaksi</label><br> 
                                    <input type="text" name="notran" value="{{ 
$notran }}" class="form-control @error('notran') is-invalid @enderror" 
readonly> 
                                    @error('notran') 
                                    <span class="invalid-feedback alert-
danger" role="alert"> 
                                        {{ $message }} 
                                    </span> 
                                    @enderror 
                                </div> 
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label>ID Customer</label> 
                                    <select class="form-control 
@error('anggota_id') is-invalid @enderror" name="anggota_id" id="anggota"> 
                                        <option value="" selected>-- Pilih ID 
Customer --</option> 
                                        @foreach ($anggota as $row) 
                                        <option value="{{ $row->id }}">{{ 
$row->user->email }}</option> 
                                        @endforeach 
                                    </select> 
                                    @error('anggota_id') 
                                    <span class="invalid-feedback alert-
danger" role="alert"> 

----------------------------------------

## Halaman 10

                                        {{ $message }} 
                                    </span> 
                                    @enderror 
                                </div> 
 
                                <div class="form-group"> 
                                    <label>Nama Customer</label> 
                                    <input type="text" class="form-control 
@error('nama') is-invalid @enderror" name="nama" id="nama" readonly> 
                                    @error('nama') 
                                    <span class="invalid-feedback alert-
danger" role="alert"> 
                                        {{ $message }} 
                                    </span> 
                                    @enderror 
                                </div> 
                            </div> 
                        </div> 
 
                        <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label>Tanggal Awal</label> 
                                <input type="date" class="form-control 
@error('tanggal_awal') is-invalid @enderror" name="tanggal_awal" value="{{ 
old('tanggal_awal') }}"> 
                                @error('tanggal_awal') 
                                <span class="invalid-feedback alert-danger" 
role="alert"> 
                                    {{ $message }} 
                                </span> 
                                @enderror 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="form-group"> 
                                <label>Tanggal Akhir</label> 
                                <input type="date" class="form-control 
@error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir" value="{{ 
old('tanggal_akhir') }}"> 
                                @error('tanggal_akhir') 
                                <span class="invalid-feedback alert-danger" 
role="alert"> 
                                    {{ $message }} 
                                </span> 
                                @enderror 
                            </div> 
                        </div> 

----------------------------------------

## Halaman 11

                    </div> 
                    <p></p> 
 
                        <h5>Detail Produk</h5> 
                        <p></p> 
                         
 
                        <button type="button" class="btn btn-icon btn-icon-
left btn-info btn-xs waves-effect waves-light add-produk"> 
                            <i class="ico fa fa-plus"></i>Tambah Produk 
                        </button> 
                        <p></p> 
 
                        <div id="produk-container"> 
                            <div class="row produk-row"> 
                                <div class="col-md-3"> 
                                    <div class="form-group"> 
                                        <label>Paket Wisata</label> 
                                        <select class="form-control produk-
select @error('produk_id') is-invalid @enderror" name="produk_id[]"> 
                                            <option value="" selected>-- Pilih 
Paket Wisata --</option> 
                                            @foreach ($produk as $row) 
                                            <option value="{{ $row->id }}">{{ 
$row->nama_produk }}</option> 
                                            @endforeach 
                                        </select> 
                                        @error('produk_id') 
                                        <span class="invalid-feedback alert-
danger" role="alert"> 
                                            {{ $message }} 
                                        </span> 
                                        @enderror 
                                    </div> 
                                </div> 
                                <div class="col-md-3"> 
                                    <div class="form-group"> 
                                        <label>Harga</label> 
                                        <input type="text" class="form-control 
@error('harga') is-invalid @enderror" name="harga[]" readonly> 
                                        @error('harga') 
                                        <span class="invalid-feedback alert-
danger" role="alert"> 
                                            {{ $message }} 
                                        </span> 
                                        @enderror 
                                    </div> 
                                </div> 

----------------------------------------

## Halaman 12

                                <div class="col-md-2"> 
                                    <div class="form-group"> 
                                        <label>Kuota Tersedia</label> 
                                        <input type="text" class="form-control 
@error('stok') is-invalid @enderror" name="stok[]" readonly> 
                                        @error('stok') 
                                        <span class="invalid-feedback alert-
danger" role="alert"> 
                                            {{ $message }} 
                                        </span> 
                                        @enderror 
                                    </div> 
                                </div> 
                                <div class="col-md-2"> 
                                    <div class="form-group"> 
                                        <label>Jumlah Orang</label> 
                                        <input type="number" class="form-
control @error('jumbel') is-invalid @enderror" name="jumbel[]"> 
                                        @error('jumbel') 
                                        <span class="invalid-feedback alert-
danger" role="alert"> 
                                            {{ $message }} 
                                        </span> 
                                        @enderror 
                                    </div> 
                                </div> 
                                <div class="col-md-2"> 
                                    <button type="button" class="btn btn-
danger remove-produk" style="margin-top: 24px;">Hapus</button> 
                                </div> 
                            </div> 
                        </div> 
 
                        <br><br> 
                        <button type="submit" class="btn btn-primary btn-sm 
waves-effect waves-light">Simpan</button> 
                        <a href="{{ route('transaksi.index') }}"> 
                            <button type="button" class="btn waves-effect btn-
sm waves-effect waves-light">Kembali</button> 
                        </a> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
 
<script> 

----------------------------------------

## Halaman 13

    document.getElementById('anggota').addEventListener('change', function() { 
        var anggotaId = this.value; 
        if (anggotaId) { 
            fetch(`/get-anggota/${anggotaId}`) 
                .then(response => response.json()) 
                .then(data => { 
                    document.getElementById('nama').value = data.nama; 
                }); 
        } else { 
            document.getElementById('nama').value = ''; 
        } 
    }); 
 
    document.addEventListener('change', function(e) { 
        if (e.target && e.target.classList.contains('produk-select')) { 
            var produkId = e.target.value; 
            var parentRow = e.target.closest('.produk-row'); 
            if (produkId) { 
                fetch(`/get-produk/${produkId}`) 
                    .then(response => response.json()) 
                    .then(data => { 
                        parentRow.querySelector('[name="harga[]"]').value = 
data.harga; 
                        parentRow.querySelector('[name="stok[]"]').value = 
data.stok; 
                        parentRow.querySelector('[name="jumbel[]"]').focus(); 
                    }); 
            } else { 
                parentRow.querySelector('[name="harga[]"]').value = ''; 
                parentRow.querySelector('[name="stok[]"]').value = ''; 
            } 
        } 
    }); 
 
    document.querySelector('.add-produk').addEventListener('click', function() 
{ 
        var container = document.getElementById('produk-container'); 
        var row = container.querySelector('.produk-row').cloneNode(true); 
        row.querySelectorAll('input').forEach(input => input.value = ''); 
        row.querySelectorAll('select').forEach(select => select.value = ''); 
        container.appendChild(row); 
    }); 
 
    document.addEventListener('click', function(e) { 
        if (e.target && e.target.classList.contains('remove-produk')) { 
            e.target.closest('.produk-row').remove(); 
        } 
    }); 

----------------------------------------

## Halaman 14

</script> 
 
@endsection 
 
 
-Kode lengkap View Edit Transaksi: 
@extends('backend.v_layouts.app') 
@section('content') 
 
<div class="ibox"> 
    <div class="ibox-head"> 
        <div class="ibox-title">{{ $judul }}</div> 
    </div> 
    <div class="ibox-body"> 
        <form action="{{ route('transaksi.update', $edit->id) }}" 
method="post"> 
            @csrf 
            @method('put') 
            <div class="form-group"> 
                <label>No. Transaksi</label> 
                <input type="text" name="notran" value="{{ $edit->notran }}" 
class="form-control @error('notran') is-invalid @enderror" readonly> 
                @error('notran') 
                <span class="invalid-feedback alert-danger" role="alert"> 
                    {{ $message }} 
                </span> 
                @enderror 
            </div> 
            <div class="form-group"> 
                <label>Nama Customer</label> 
                <select class="form-control @error('anggota_id') is-invalid 
@enderror" name="anggota_id" id="anggota"> 
                    <option value="" selected>-- Pilih Nama Anggota --
</option> 
                    @foreach ($anggota as $row) 
                    <option value="{{ $row->id }}" {{ $edit->anggota_id == 
$row->id ? 'selected' : '' }}>{{ $row->user->nama }}</option> 
                    @endforeach 
                </select> 
                @error('anggota_id') 
                <span class="invalid-feedback alert-danger" role="alert"> 
                    {{ $message }} 
                </span> 
                @enderror 
            </div> 
            <div class="form-group"> 
                <label>Status</label> 

----------------------------------------

## Halaman 15

                <select class="form-control @error('status') is-invalid 
@enderror" name="status"> 
                    <option value="1" {{ $edit->status == 1 ? 'selected' : '' 
}}>Lunas</option> 
                    <option value="0" {{ $edit->status == 0 ? 'selected' : '' 
}}>Belum Lunas</option> 
                </select> 
                @error('status') 
                <span class="invalid-feedback alert-danger" role="alert"> 
                    {{ $message }} 
                </span> 
                @enderror 
            </div> 
            <button type="submit" class="btn btn-primary">Simpan</button> 
            <a href="{{ route('transaksi.index') }}"> 
                <button type="button" class="btn btn-
secondary">Kembali</button> 
            </a> 
        </form> 
    </div> 
</div> 
 
@endsection 
 
 
 
-Kode lengkap View Detail Transaksi: 
@extends('backend.v_layouts.app') 
@section('content') 
 
<div class="ibox"> 
    <div class="ibox-head"> 
        <div class="ibox-title">Detail Transaksi</div> 
    </div> 
    <div class="ibox-body"> 
        <div class="form-group"> 
            <label>No. Transaksi</label> 
            <input type="text" value="{{ $transaksi->notran }}" class="form-
control" readonly> 
        </div> 
        <div class="form-group"> 
            <label>Nama Customer</label> 
            <input type="text" value="{{ $transaksi->anggota->user->nama }}" 
class="form-control" readonly> 
        </div> 
        <div class="form-group"> 
            <label>Status</label> 

----------------------------------------

## Halaman 16

            <input type="text" value="{{ $transaksi->status == 1 ? 'Lunas' : 
'Belum Lunas' }}" class="form-control" readonly> 
        </div> 
        <div class="form-group"> 
            <label>Tanggal Awal</label> 
            <input type="text" value="{{ $transaksi->tanggal_awal }}" 
class="form-control" readonly> 
        </div> 
        <div class="form-group"> 
            <label>Tanggal Akhir</label> 
            <input type="text" value="{{ $transaksi->tanggal_akhir }}" 
class="form-control" readonly> 
        </div> 
        <div class="form-group"> 
            <label>Total Bayar</label> 
            <input type="text" value="Rp. {{ number_format($transaksi-
>total_bayar, 0, ',', '.') }}" class="form-control" readonly> 
        </div> 
 
        <!-- Tambahkan detail produk --> 
        <div class="form-group"> 
            <label>Detail Paket</label> 
            <ul> 
                @foreach($transaksi->detail as $detail) 
                    <li> 
                        Paket Wisata: {{ $detail->produk->nama_produk }},  
                        Jumlah Orang: {{ $detail->jumbel }} 
                    </li> 
                @endforeach 
            </ul> 
        </div> 
         
        <a href="{{ route('transaksi.index') }}"> 
            <button type="button" class="btn btn-secondary">Kembali</button> 
        </a> 
    </div> 
</div> 
 
@endsection 
 
 
-Kode lengkap TransaksiController: 
<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Models\Transaksi; 
use App\Models\TransaksiDetail; 
use App\Models\Anggota; 

----------------------------------------

## Halaman 17

use App\Models\User; 
use App\Models\Produk; 
 
class TransaksiController extends Controller 
{ 
    /** 
     * Display a listing of the resource. 
     */ 
    public function index() 
{ 
    $transaksi = Transaksi::with(['anggota.user', 'detail.produk'])-
>orderBy('id', 'desc')->get(); 
    return view('backend.v_transaksi.index', [ 
        'judul' => 'Data Transaksi', 
        'index' => $transaksi 
    ]); 
} 
 
    /** 
     * Show the form for creating a new resource. 
     */ 
    public function create() 
    { 
         
        // no. transaksi otomatis 
        $today = now()->format('Ymd'); 
        $lastNumber = Transaksi::where('notran', 'like', $today . '%')-
>max('notran'); 
        $newNumber = $today . str_pad((int) substr($lastNumber, -4) + 1, 4, 
'0', STR_PAD_LEFT); 
        //data anggota 
        $anggota = Anggota::join('user', 'anggota.user_id', '=', 'user.id') 
            ->where('user.status', 1) 
            ->orderBy('user.nama', 'asc') 
            ->select('anggota.*', 'user.nama') 
            ->get(); 
        //data produk 
        $produk = Produk::where('status', 1) 
            ->orderBy('nama_produk', 'asc') 
            ->get(); 
        return view('backend.v_transaksi.create', [ 
            'judul' => 'Tambah Transaksi', 
            'notran' => $newNumber, 
            'anggota' => $anggota, 
            'produk' => $produk, 
        ]); 
    } 
 

----------------------------------------

## Halaman 18

    /** 
     * Store a newly created resource in storage. 
     */ 
    public function store(Request $request) 
    { 
        $request->validate([ 
            'notran' => 'required|unique:transaksi,notran', 
            'anggota_id' => 'required', 
            'produk_id' => 'required|array|min:1', 
            'produk_id.*' => 'required|integer|exists:produk,id', 
            'jumbel' => 'required|array|min:1', 
            'jumbel.*' => 'required|integer|min:1', 
            'harga' => 'required|array|min:1', 
            'harga.*' => 'required|numeric|min:0', 
            'tanggal_awal' => 'required|date', 
            'tanggal_akhir' => 'required|date', 
        ]); 
 
        $totalBayar = 0; 
 
        // Buat transaksi baru 
        $transaksi = Transaksi::create([ 
            'notran' => $request->notran, 
            'anggota_id' => $request->anggota_id, 
            'user_id' => auth()->id(), 
            'tanggal_awal' => $request->tanggal_awal, 
            'tanggal_akhir' => $request->tanggal_akhir, 
            'status' => 1, 
            'total_bayar' => 0 
        ]); 
 
        // **Reset data sebelum looping** untuk memastikan hanya data yang 
diinput tersimpan 
        TransaksiDetail::where('notran', $request->notran)->delete(); 
 
        // Looping dengan validasi yang benar 
        foreach ($request->produk_id as $index => $produk_id) { 
            $produk = Produk::find($produk_id); 
            if ($produk) { 
                $harga = $request->harga[$index]; 
                $jumlahBeli = $request->jumbel[$index]; 
 
                // Update stok hanya jika cukup 
                if ($produk->stok >= $jumlahBeli) { 
                    $produk->update(['stok' => $produk->stok - $jumlahBeli]); 
 
                    // Simpan detail transaksi baru 
                    TransaksiDetail::create([ 

----------------------------------------

## Halaman 19

                        'notran' => $request->notran, 
                        'produk_id' => $produk_id, 
                        'harga' => $harga, 
                        'jumbel' => $jumlahBeli 
                    ]); 
 
                    // Update total bayar 
                    $totalBayar += $harga * $jumlahBeli; 
                } else { 
                    return redirect()->back()->withErrors(['error' => 'Stok 
tidak mencukupi untuk produk: ' . $produk->nama_produk]); 
                } 
            } 
        } 
 
        // Perbarui total bayar setelah looping selesai 
        $transaksi->update(['total_bayar' => $totalBayar]); 
 
        return redirect()->route('transaksi.index')->with('success', 
'Transaksi berhasil disimpan'); 
    } 
 
 
    /** 
     * Display the specified resource. 
     */ 
    public function show($id) 
{ 
    $transaksi = Transaksi::with(['anggota', 'anggota.user'])->find($id); 
 
    if (!$transaksi) { 
        return redirect()->route('transaksi.index')->with('error', 'Transaksi 
tidak ditemukan'); 
    } 
 
    return view('backend.v_transaksi.detail', compact('transaksi')); 
} 
 
    /** 
     * Show the form for editing the specified resource. 
     */ 
    public function edit(string $id) 
{ 
    $transaksi = Transaksi::with(['anggota.user'])->find($id); // Tambahkan 
eager loading untuk relasi anggota dan user 
    if (!$transaksi) { 
        return redirect()->route('transaksi.index')->with('error', 'Transaksi 
tidak ditemukan'); 

----------------------------------------

## Halaman 20

    } 
 
    $anggota = Anggota::join('user', 'anggota.user_id', '=', 'user.id') 
                    ->where('user.status', 1) 
                    ->orderBy('user.nama', 'asc') 
                    ->select('anggota.*', 'user.nama') 
                    ->get(); 
    return view('backend.v_transaksi.edit', [ 
        'judul' => 'Ubah Transaksi', 
        'edit' => $transaksi, 
        'anggota' => $anggota 
    ]); 
} 
    /** 
     * Update the specified resource in storage. 
     */ 
    public function update(Request $request, string $id) 
    { 
        $request->validate([ 
            'notran' => 'required|unique:transaksi,notran,' . $id, 
            'anggota_id' => 'required|integer|exists:anggota,id', 
            'status' => 'required|in:0,1' 
        ]); 
     
        $transaksi = Transaksi::find($id); 
        $transaksi->notran = $request->notran; 
        $transaksi->anggota_id = $request->anggota_id; 
        $transaksi->status = $request->status; 
     
        $transaksi->save(); 
     
        return redirect()->route('transaksi.index')->with('success', 
'Transaksi berhasil diubah'); 
    } 
 
    /** 
     * Remove the specified resource from storage. 
     */ 
    public function destroy(string $id) 
    { 
        $transaksi = Transaksi::findOrFail($id); 
        User::where('id', $transaksi->user_id)->update(['status' => 0]); 
        $transaksi->delete(); 
        return redirect('/transaksi'); 
    } 
 
    public function getAnggota($id) 
    { 

----------------------------------------

## Halaman 21

        $anggota = Anggota::find($id); 
        $user = User::find($anggota->user_id); 
        return response()->json([ 
            'nama' => $user->nama 
        ]); 
    } 
 
    public function getProduk($id) 
    { 
        $produk = Produk::find($id); 
        return response()->json($produk); 
    } 
} 
 
 
 
 
 
 
 
 
 

----------------------------------------
