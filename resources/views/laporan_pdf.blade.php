<h1>Nota Servis Bengkel</h1>
<p>Nama Pelanggan: {{ $booking->nama_pelanggan }}</p>
<p>Plat Nomor: {{ $booking->nomer_plat }}</p>
<p>Mekanik: {{ $booking->mechanic->nama_mekanik ?? 'Belum Ditentukan' }}</p>
<hr>
<p>Status: {{ $booking->status_servis }}</p>