<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Servis — {{ $booking->nomer_plat }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 13px;
            color: #1a1a1a;
            background: #fff;
            padding: 32px 40px;
        }

        /* ── Header ── */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding-bottom: 18px;
            border-bottom: 3px solid #F97316;
            margin-bottom: 22px;
        }
        .brand-name {
            font-size: 22px;
            font-weight: 800;
            color: #0F172A;
            letter-spacing: -.5px;
        }
        .brand-name span { color: #F97316; }
        .brand-info {
            font-size: 11px;
            color: #64748B;
            margin-top: 4px;
            line-height: 1.6;
        }
        .doc-meta { text-align: right; }
        .doc-title {
            font-size: 15px;
            font-weight: 700;
            color: #0F172A;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .doc-no {
            font-size: 11px;
            color: #64748B;
            margin-top: 4px;
        }
        .doc-date {
            font-size: 11px;
            color: #64748B;
        }

        /* ── Status badge ── */
        .status-banner {
            background: #F0FDF4;
            border: 1.5px solid #86EFAC;
            border-radius: 8px;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
        }
        .status-dot {
            width: 10px; height: 10px;
            background: #22C55E;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .status-text {
            font-size: 12px;
            font-weight: 600;
            color: #166534;
        }

        /* ── Info grid ── */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            margin-bottom: 22px;
        }
        .info-box {
            padding: 14px 16px;
            border: 1px solid #E2E8F0;
        }
        .info-box:nth-child(1) { border-radius: 8px 0 0 0; }
        .info-box:nth-child(2) { border-radius: 0 8px 0 0; border-left: none; }
        .info-box:nth-child(3) { border-radius: 0 0 0 8px; border-top: none; }
        .info-box:nth-child(4) { border-radius: 0 0 8px 0; border-left: none; border-top: none; }
        .info-label {
            font-size: 10px;
            color: #94A3B8;
            text-transform: uppercase;
            letter-spacing: .6px;
            font-weight: 600;
            margin-bottom: 4px;
        }
        .info-value {
            font-size: 13px;
            font-weight: 700;
            color: #0F172A;
        }
        .info-value.plat {
            color: #F97316;
            font-size: 15px;
            letter-spacing: .5px;
        }

        /* ── Detail table ── */
        .section-title {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94A3B8;
            margin-bottom: 10px;
        }
        table.detail {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 22px;
        }
        table.detail thead tr {
            background: #F97316;
            color: white;
        }
        table.detail thead th {
            padding: 9px 12px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        table.detail tbody tr:nth-child(even) { background: #F8FAFC; }
        table.detail tbody td {
            padding: 10px 12px;
            font-size: 12px;
            color: #334155;
            border-bottom: 1px solid #F1F5F9;
        }
        table.detail tbody td.bold { font-weight: 700; color: #0F172A; }

        /* ── Keluhan ── */
        .keluhan-box {
            background: #FFF7ED;
            border: 1px solid #FED7AA;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 22px;
        }
        .keluhan-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .6px;
            color: #EA580C;
            margin-bottom: 4px;
        }
        .keluhan-text { font-size: 12px; color: #431407; line-height: 1.5; }

        /* ── LUNAS Stamp ── */
        .lunas-wrap {
            text-align: center;
            margin: 10px 0 22px;
        }
        .lunas-stamp {
            display: inline-block;
            border: 4px solid #16A34A;
            border-radius: 8px;
            padding: 8px 28px;
            color: #16A34A;
            font-size: 28px;
            font-weight: 900;
            letter-spacing: 4px;
            text-transform: uppercase;
            opacity: .85;
            transform: rotate(-5deg);
        }

        /* ── Footer ── */
        .footer {
            border-top: 1.5px dashed #CBD5E1;
            padding-top: 16px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .footer-note {
            font-size: 10px;
            color: #94A3B8;
            line-height: 1.6;
            max-width: 55%;
        }
        .ttd-box { text-align: center; }
        .ttd-label { font-size: 10px; color: #64748B; margin-bottom: 50px; }
        .ttd-line {
            width: 140px;
            border-bottom: 1px solid #334155;
            margin: 0 auto;
        }
        .ttd-name { font-size: 10px; color: #64748B; margin-top: 4px; }

        @media print {
            body { padding: 16px 24px; }
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <div>
            <div class="brand-name">Bengkel<span>Pro</span></div>
            <div class="brand-info">
                Jl. Raya Bekasi No. 123, Jakarta Timur<br>
                Telp: 08123456789 &nbsp;|&nbsp; Buka: Senin-Sabtu 08.00-17.00
            </div>
        </div>
        <div class="doc-meta">
            <div class="doc-title">Nota Servis</div>
            <div class="doc-no">No. NOTA-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</div>
            <div class="doc-date">Dicetak: {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y, HH:mm') }}</div>
        </div>
    </div>

    {{-- Status Banner --}}
    <div class="status-banner">
        <div class="status-dot"></div>
        <div class="status-text">Motor sudah selesai dikerjakan dan siap diserahkan kepada pelanggan</div>
    </div>

    {{-- Info Grid --}}
    <div class="info-grid">
        <div class="info-box">
            <div class="info-label">Nama Pelanggan</div>
            <div class="info-value">{{ $booking->nama_pelanggan }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Plat Nomor</div>
            <div class="info-value plat">{{ $booking->nomer_plat }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Tipe Motor</div>
            <div class="info-value">{{ $booking->tipe_motor }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">Mekanik</div>
            <div class="info-value">{{ $booking->mechanic->nama_mekanik ?? 'Belum Ditentukan' }}</div>
        </div>
    </div>

    {{-- Detail Servis --}}
    <div class="section-title">Detail Servis</div>
    <table class="detail">
        <thead>
            <tr>
                <th>Keterangan</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tanggal Booking</td>
                <td class="bold">{{ \Carbon\Carbon::parse($booking->tanggal_booking)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
            </tr>
            <tr>
                <td>Jam Masuk</td>
                <td class="bold">{{ $booking->jam_booking }} WIB</td>
            </tr>
            <tr>
                <td>Jenis Servis</td>
                <td class="bold">Servis Kendaraan - {{ $booking->tipe_motor }}</td>
            </tr>
            <tr>
                <td>Status Pengerjaan</td>
                <td class="bold" style="color:#16A34A">Selesai / Serah Terima</td>
            </tr>
            <tr>
                <td>Total Biaya Pembayaran</td>
                <td class="bold" style="color:#F97316; font-size: 14px;">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    {{-- Keluhan --}}
    @if($booking->keluhan)
    <div class="keluhan-box">
        <div class="keluhan-label">Keluhan / Catatan</div>
        <div class="keluhan-text">{{ $booking->keluhan }}</div>
    </div>
    @endif

    {{-- LUNAS Stamp --}}
    <div class="lunas-wrap">
        <div class="lunas-stamp">LUNAS</div>
    </div>

    {{-- Footer --}}
    <div class="footer">
        <div class="footer-note">
            Terima kasih telah mempercayakan kendaraan Anda kepada kami.<br>
            Simpan nota ini sebagai bukti servis yang sah.<br>
            <strong>BengkelPro</strong> — Profesional, Transparan, Terpercaya.
        </div>
        <div class="ttd-box">
            <div class="ttd-label">Kasir / Petugas</div>
            <div class="ttd-line"></div>
            <div class="ttd-name">( _____________________________ )</div>
        </div>
    </div>

</body>
</html>