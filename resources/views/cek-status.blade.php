<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Servis Motor — BengkelPro</title>
    <meta name="description" content="Pantau progres pengerjaan servis motor kamu secara real-time. Masukkan nomer plat untuk melacak status dari mekanik kami.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --orange: #F97316;
            --orange-d: #ea580c;
            --orange-glow: rgba(249, 115, 22, 0.25);
            --bg: #070C18;
            --bg2: #0F172A;
            --card: rgba(15, 23, 42, 0.7);
            --border: rgba(249, 115, 22, 0.15);
            --border2: rgba(148, 163, 184, 0.08);
            --text: #F1F5F9;
            --text2: #94A3B8;
            --text3: #64748B;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* ── Background FX ── */
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(249,115,22,.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(249,115,22,.04) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            z-index: 0;
        }
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
            z-index: 0;
            animation: orbFloat 8s ease-in-out infinite;
        }
        .orb-1 {
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(249,115,22,.12) 0%, transparent 65%);
            top: -200px; right: -100px;
            animation-delay: 0s;
        }
        .orb-2 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(59,130,246,.08) 0%, transparent 65%);
            bottom: 10%; left: -100px;
            animation-delay: 4s;
        }
        @keyframes orbFloat {
            0%,100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-20px) scale(1.03); }
        }

        /* ── Navbar ── */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(7, 12, 24, 0.75);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid var(--border2);
            transition: all .3s;
        }
        .nav-logo {
            display: flex;
            align-items: center;
            gap: .6rem;
            text-decoration: none;
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--text);
            letter-spacing: -.02em;
        }
        .logo-icon {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            box-shadow: 0 0 16px var(--orange-glow);
            flex-shrink: 0;
        }
        .brand-name {
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--text);
        }
        .brand-accent { color: var(--orange); }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            list-style: none;
        }
        .nav-links a {
            color: var(--text2);
            text-decoration: none;
            font-size: .85rem;
            font-weight: 500;
            transition: color .2s;
        }
        .nav-links a:hover { color: var(--text); }
        .btn-nav {
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            color: white !important;
            padding: .5rem 1.1rem;
            border-radius: 8px;
            font-weight: 600 !important;
            box-shadow: 0 0 15px var(--orange-glow);
            border: none;
            cursor: pointer;
            transition: all .25s !important;
        }
        .btn-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(249,115,22,.4) !important;
        }

        /* ── Header Layout ── */
        .header-section {
            padding: 8rem 2rem 2rem;
            position: relative;
            z-index: 10;
        }
        .header-wrap {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            align-items: center;
            gap: 4rem;
        }
        .header-content {
            text-align: left;
        }
        .header-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -.03em;
            margin-bottom: 1rem;
        }
        .header-title span {
            background: linear-gradient(135deg, var(--orange) 0%, #f59e0b 50%, #fb923c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .header-desc {
            color: var(--text2);
            font-size: .95rem;
            line-height: 1.7;
            max-width: 540px;
            margin-bottom: 2rem;
        }

        /* Mascot Banner */
        .header-mascot {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 380px;
            margin: 0 auto;
        }
        .header-mascot video {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px;
            border: 1px solid var(--border);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6), 0 0 40px rgba(249, 115, 22, 0.1);
            object-fit: contain;
            animation: floatMascot 6s ease-in-out infinite;
        }
        .mascot-glow {
            position: absolute;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(249,115,22,0.15) 0%, transparent 70%);
            z-index: -1;
            filter: blur(10px);
            animation: pulseGlow 4s ease-in-out infinite;
        }

        @keyframes floatMascot {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        @keyframes pulseGlow {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.1); opacity: 1; }
        }

        /* ── Cek Card & Form ── */
        .cek-form-section {
            padding: 1rem 2rem 2rem;
            position: relative;
            z-index: 10;
        }
        .cek-form-wrap {
            max-width: 1200px;
            margin: 0 auto;
        }
        .cek-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.4), 0 0 40px rgba(249, 115, 22, 0.05);
            backdrop-filter: blur(24px);
        }
        .cek-search {
            display: flex;
            gap: .75rem;
            margin-top: .5rem;
        }
        .cek-input {
            flex: 1;
            background: rgba(7, 12, 24, 0.6);
            border: 1px solid var(--border2);
            border-radius: 11px;
            color: var(--text);
            font-family: inherit;
            font-size: .95rem;
            padding: .85rem 1.1rem;
            outline: none;
            transition: all .25s;
        }
        .cek-input:focus {
            border-color: var(--orange);
            box-shadow: 0 0 15px rgba(249, 115, 22, 0.15);
        }
        .cek-input::placeholder {
            color: rgba(148, 163, 184, 0.35);
        }
        .btn-cek {
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            color: white;
            border: none;
            border-radius: 11px;
            font-weight: 700;
            padding: 0 2rem;
            cursor: pointer;
            transition: all .25s;
            display: flex;
            align-items: center;
            gap: .5rem;
            box-shadow: 0 0 20px rgba(249, 115, 22, 0.25);
        }
        .btn-cek:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 35px rgba(249, 115, 22, 0.4);
        }

        /* ── Results ── */
        .cek-results {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border2);
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }
        .cek-item {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border2);
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            transition: all .25s;
        }
        .cek-item:hover {
            border-color: rgba(249, 115, 22, 0.2);
            background: rgba(249, 115, 22, 0.01);
        }
        .cek-name {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--text);
            margin-bottom: .4rem;
        }
        .cek-meta {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
            font-size: .8rem;
            color: var(--text2);
        }
        .cek-meta span {
            display: flex;
            align-items: center;
            gap: .4rem;
        }
        .cek-meta i {
            color: var(--text3);
        }

        /* Badges */
        .cek-badge {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .75rem;
            font-weight: 700;
            padding: .35rem .8rem;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: .02em;
        }
        .badge-antre {
            background: rgba(59, 130, 246, 0.08);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #93C5FD;
        }
        .badge-proses {
            background: rgba(234, 179, 8, 0.08);
            border: 1px solid rgba(234, 179, 8, 0.2);
            color: #FDE047;
        }
        .badge-selesai {
            background: rgba(34, 197, 94, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #86EFAC;
        }

        /* Empty & Reset State */
        .cek-empty {
            text-align: center;
            padding: 3rem 1.5rem;
            color: var(--text3);
            font-size: .85rem;
            line-height: 1.7;
        }
        .cek-empty a {
            color: var(--orange);
            text-decoration: none;
            font-weight: 600;
        }
        .cek-empty a:hover {
            text-decoration: underline;
        }

        /* ── Responsive Nav ── */
        @media (max-width: 640px) {
            .nav-links .hide-mobile { display: none; }
            .cek-search { flex-direction: column; }
            .btn-cek { padding: .85rem; justify-content: center; }
            .cek-item { flex-direction: column; align-items: flex-start; }
            .cek-meta { gap: .75rem; }
        }

        @media (max-width: 991px) {
            .header-wrap {
                grid-template-columns: 1fr;
                gap: 2.5rem;
                text-align: center;
            }
            .header-content { text-align: center; }
            .header-desc { margin: 0 auto 2rem; }
        }
    </style>
</head>
<body>

    <div class="bg-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <!-- Navbar -->
    <nav>
        <a href="/" class="nav-logo">
            <div class="logo-icon"><i data-lucide="wrench"></i></div>
            <span class="brand-name">Bengkel<span class="brand-accent">Pro</span></span>
        </a>
        <ul class="nav-links">
            <li class="hide-mobile"><a href="/#layanan">Layanan</a></li>
            <li class="hide-mobile"><a href="/produk">Katalog Barang</a></li>
            <li class="hide-mobile"><a href="/booking">Booking</a></li>
            <li class="hide-mobile"><a href="/cek-status" style="color:var(--text);font-weight:600">Cek Status</a></li>
            @auth
                @if(auth()->user()->role === 'customer')
                    <li class="hide-mobile" style="color:var(--text2);font-weight:600;font-size:.85rem;display:flex;align-items:center;gap:.3rem">
                        <i data-lucide="user" style="width:13px;height:13px;color:var(--orange)"></i>
                        {{ auth()->user()->name }}
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline">
                            @csrf
                            <button type="submit" class="btn-nav" style="border:1px solid rgba(239,68,68,.3);background:rgba(239,68,68,.1);color:#F87171">
                                <i data-lucide="log-out" style="width:13px;height:13px"></i> Keluar
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="/dashboard" class="btn-nav"><i data-lucide="layout-dashboard" style="width:14px;height:14px"></i> Dashboard</a></li>
                @endif
            @else
                <li><a href="/login" class="btn-nav"><i data-lucide="log-in" style="width:14px;height:14px"></i> Masuk</a></li>
            @endauth
        </ul>
    </nav>

    <!-- Header Section -->
    <section class="header-section">
        <div class="header-wrap">
            <div class="header-content reveal">
                <h1 class="header-title">Pantau Status <span>Servis Motor</span></h1>
                <p class="header-desc">
                    Masukkan nomor plat kendaraan Anda di bawah ini untuk memantau status antrean, diagnosa pengerjaan mekanik, serta progres servis secara instan dan transparan.
                </p>
            </div>

            {{-- Mascot column --}}
            <div class="header-mascot reveal" style="transition-delay:.15s">
                <div class="mascot-glow"></div>
                <video autoplay loop muted playsinline>
                    <source src="{{ asset('images/ruka2.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutaran video.
                </video>
            </div>
        </div>
    </section>

    <!-- Cek Form Section -->
    <section class="cek-form-section">
        <div class="cek-form-wrap reveal">
            <div class="cek-card">
                <form method="POST" action="{{ route('cek.status') }}">
                    @csrf
                    <div style="margin-bottom:.5rem;font-size:.85rem;font-weight:600;color:var(--text2)">Nomer Plat Motor</div>
                    <div class="cek-search">
                        <input type="text" name="plat" class="cek-input"
                            placeholder="Masukkan nomer plat... cth. B1234ABC"
                            value="{{ session('cek_plat','') }}"
                            oninput="this.value=this.value.toUpperCase()"
                            required
                            autofocus>
                        <button type="submit" class="btn-cek">
                            <i data-lucide="search" style="width:16px;height:16px"></i> Cek Status
                        </button>
                    </div>
                </form>

                @if(session('cek_plat'))
                <div class="cek-results">
                    @forelse(session('cek_results', []) as $b)
                    <div class="cek-item">
                        <div>
                            <div class="cek-name">{{ $b['nama_pelanggan'] }}</div>
                            <div class="cek-meta">
                                <span><i data-lucide="tag" style="width:12px;height:12px;color:var(--orange)"></i> {{ $b['nomer_plat'] }}</span>
                                <span><i data-lucide="cpu" style="width:12px;height:12px"></i> {{ $b['tipe_motor'] }}</span>
                                <span><i data-lucide="calendar" style="width:12px;height:12px"></i> {{ \Carbon\Carbon::parse($b['tanggal_booking'])->format('d M Y') }} — {{ $b['jam_booking'] }}</span>
                                @if(!empty($b['mechanic']))
                                <span><i data-lucide="wrench" style="width:12px;height:12px"></i> {{ $b['mechanic']['nama_mekanik'] }}</span>
                                @endif
                            </div>
                        </div>
                        <div>
                            @if($b['status_servis']==='Menunggu Antrean')
                                <span class="cek-badge badge-antre"><i data-lucide="clock" style="width:11px;height:11px"></i> Menunggu</span>
                            @elseif($b['status_servis']==='Sedang Dikerjakan')
                                <span class="cek-badge badge-proses"><i data-lucide="wrench" style="width:11px;height:11px"></i> Dikerjakan</span>
                            @else
                                <span class="cek-badge badge-selesai"><i data-lucide="check-circle" style="width:11px;height:11px"></i> Selesai ✔</span>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="cek-empty">
                        <i data-lucide="search-x" style="width:34px;height:34px;opacity:.25;display:block;margin:0 auto .75rem"></i>
                        Tidak ada booking ditemukan untuk plat <strong style="color:var(--text2)">{{ session('cek_plat') }}</strong>.<br>
                        <span style="font-size:.78rem">Pastikan nomer plat sudah benar atau lakukan <a href="/booking">booking terlebih dahulu</a>.</span>
                    </div>
                    @endforelse
                </div>
                @endif
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>
        lucide.createIcons();

        // Scroll Reveal activation
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal');
            reveals.forEach(r => r.classList.add('visible'));
        });
    </script>
</body>
</html>
