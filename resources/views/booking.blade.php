<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwalkan Servis Motor Online — BengkelPro</title>
    <meta name="description" content="Booking antrean servis motor kamu secara online di BengkelPro. Praktis, tanpa antri panjang, dan ditangani oleh mekanik profesional.">
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

        /* ── Header ── */
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

        /* ── Booking Section ── */
        .booking-section {
            padding: 1rem 2rem 6rem;
            position: relative;
            z-index: 10;
        }
        .booking-wrap {
            max-width: 1200px;
            margin: 0 auto;
        }
        .booking-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            backdrop-filter: blur(24px);
            box-shadow: 0 32px 80px rgba(0,0,0,.3),0 0 60px rgba(249,115,22,.06);
        }
        .booking-card-head { margin-bottom: 2rem; }
        .booking-card-title { font-size: 1.35rem; font-weight: 800; color: var(--text); letter-spacing: -.02em; margin-bottom: .3rem; }
        .booking-card-sub { font-size: .85rem; color: var(--text2); }
        
        .booking-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }
        @media(max-width: 768px){ .booking-grid{ grid-template-columns: 1fr; } }
        .booking-grid .full { grid-column: 1/-1; }
        
        .b-group { display: flex; flex-direction: column; gap: .4rem; }
        .b-label { font-size: .78rem; font-weight: 600; color: var(--text2); letter-spacing: .03em; }
        .b-input, .b-select, .b-textarea { 
            background: rgba(7, 12, 24, 0.7); 
            border: 1px solid rgba(148, 163, 184, 0.1); 
            border-radius: 11px; 
            color: var(--text); 
            font-family: inherit; 
            font-size: .88rem; 
            padding: .75rem .95rem; 
            outline: none; 
            transition: all .25s; 
            width: 100%; 
        }
        .b-input:focus, .b-select:focus, .b-textarea:focus { 
            border-color: rgba(249, 115, 22, 0.5); 
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.08); 
        }
        .b-input::placeholder, .b-textarea::placeholder { color: rgba(148, 163, 184, 0.35); }
        .b-select option { background: #0F172A; color: var(--text); }
        .b-textarea { resize: vertical; min-height: 90px; }
        .b-error { font-size: .72rem; color: #F87171; margin-top: .2rem; display: flex; align-items: center; gap: .3rem; }
        
        .btn-booking-submit { 
            width: 100%; 
            padding: .9rem; 
            border: none; 
            border-radius: 12px; 
            background: linear-gradient(135deg, var(--orange), var(--orange-d)); 
            color: white; 
            font-size: .95rem; 
            font-weight: 700; 
            cursor: pointer; 
            transition: all .25s; 
            box-shadow: 0 0 24px rgba(249, 115, 22, 0.25); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            gap: .5rem; 
        }
        .btn-booking-submit:hover { transform: translateY(-2px); box-shadow: 0 0 40px rgba(249, 115, 22, 0.4); }
        
        /* Alerts */
        .flash-booking-ok { 
            background: rgba(16, 185, 129, 0.1); 
            border: 1px solid rgba(16, 185, 129, 0.25); 
            color: #34D399; 
            padding: 1rem 1.25rem; 
            border-radius: 12px; 
            font-size: .88rem; 
            font-weight: 500; 
            margin-bottom: 1.5rem; 
            display: flex; 
            align-items: flex-start; 
            gap: .75rem; 
            animation: slideDown .4s ease; 
        }
        .flash-booking-err { 
            background: rgba(239, 68, 68, 0.09); 
            border: 1px solid rgba(239, 68, 68, 0.22); 
            color: #F87171; 
            padding: 1rem 1.25rem; 
            border-radius: 12px; 
            font-size: .88rem; 
            margin-bottom: 1.5rem; 
            display: flex; 
            align-items: flex-start; 
            gap: .75rem; 
        }
        @keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }

        /* ── Responsive Nav & Hamburger Menu ── */
        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 26px;
            height: 18px;
            background: transparent;
            border: none;
            cursor: pointer;
            z-index: 100;
            padding: 0;
        }
        .menu-toggle .bar {
            width: 100%;
            height: 2.5px;
            background-color: var(--text);
            border-radius: 4px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .menu-toggle.open .bar-1 {
            transform: translateY(8px) rotate(45deg);
        }
        .menu-toggle.open .bar-2 {
            opacity: 0;
            transform: translateX(-10px);
        }
        .menu-toggle.open .bar-3 {
            transform: translateY(-8px) rotate(-45deg);
        }

        .mobile-menu-backdrop {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(0,0,0,0.65);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 98;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        .mobile-menu-backdrop.open {
            opacity: 1;
            pointer-events: auto;
        }

        .mobile-menu {
            position: fixed;
            top: 0; right: -320px; width: 280px; height: 100vh;
            background: rgba(9, 15, 30, 0.96);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border-left: 1px solid rgba(255,255,255,0.06);
            box-shadow: -15px 0 40px rgba(0,0,0,0.6);
            z-index: 99;
            display: flex;
            flex-direction: column;
            padding: 7rem 2rem 2rem;
            transition: right 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .mobile-menu.open {
            right: 0;
        }
        .mobile-nav-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        .mobile-nav-links li {
            width: 100%;
        }
        .mobile-nav-links a {
            color: var(--text2);
            text-decoration: none;
            font-size: 1.15rem;
            font-weight: 600;
            transition: color 0.2s, transform 0.2s;
            display: block;
        }
        .mobile-nav-links a:hover {
            color: var(--orange);
            transform: translateX(4px);
        }

        /* ── Mobile Responsive Overrides ── */
        @media (max-width: 768px) {
            nav {
                padding: 0 1.25rem;
            }
            .nav-links .hide-mobile { display: none !important; }
            .menu-toggle { display: flex; }
            .header-section {
                padding: 6rem 1.25rem 1.5rem;
            }
            .header-wrap {
                grid-template-columns: 1fr;
                gap: 2.5rem;
                text-align: center;
            }
            .header-content {
                text-align: center;
            }
            .header-desc {
                margin: 0 auto 1.5rem;
            }
            .header-mascot {
                margin-top: 1.5rem;
                max-width: 280px;
            }
            .booking-section {
                padding: 0.5rem 1.25rem 4rem;
            }
            .booking-card {
                padding: 1.5rem 1.25rem;
                border-radius: 20px;
            }
            .booking-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="bg-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <nav id="navbar">
        <a href="/" class="nav-logo">
            <div class="logo-icon"><i data-lucide="wrench"></i></div>
            <span class="brand-name">Bengkel<span class="brand-accent">Pro</span></span>
        </a>
        <ul class="nav-links">
            <li class="hide-mobile"><a href="/#layanan">Layanan</a></li>
            <li class="hide-mobile"><a href="/produk">Katalog Barang</a></li>
            <li class="hide-mobile"><a href="/booking" style="color:var(--text);font-weight:600">Booking</a></li>
            <li class="hide-mobile"><a href="/cek-status">Cek Status</a></li>
            @auth
                @if(auth()->user()->role === 'customer')
                    <li class="hide-mobile" style="color:var(--text2);font-weight:600;font-size:.85rem;display:flex;align-items:center;gap:.3rem">
                        <i data-lucide="user" style="width:13px;height:13px;color:var(--orange)"></i>
                        {{ auth()->user()->name }}
                    </li>
                    <li class="hide-mobile">
                        <form method="POST" action="{{ route('logout') }}" style="display:inline">
                            @csrf
                            <button type="submit" class="btn-nav" style="border:1px solid rgba(239,68,68,.3);background:rgba(239,68,68,.1);color:#F87171">
                                <i data-lucide="log-out" style="width:13px;height:13px"></i> Keluar
                            </button>
                        </form>
                    </li>
                @else
                    <li class="hide-mobile"><a href="/dashboard" class="btn-nav"><i data-lucide="layout-dashboard" style="width:14px;height:14px"></i> Dashboard</a></li>
                @endif
            @else
                <li class="hide-mobile"><a href="/login" class="btn-nav"><i data-lucide="log-in" style="width:14px;height:14px"></i> Masuk</a></li>
            @endauth
        </ul>
        <!-- Hamburger Menu Button -->
        <button class="menu-toggle" id="menuToggle" onclick="toggleMenu()" aria-label="Toggle Menu">
            <span class="bar bar-1"></span>
            <span class="bar bar-2"></span>
            <span class="bar bar-3"></span>
        </button>
    </nav>

    <!-- Mobile Menu Drawer -->
    <div class="mobile-menu-backdrop" id="menuBackdrop" onclick="toggleMenu()"></div>
    <div class="mobile-menu" id="mobileMenu">
        <ul class="mobile-nav-links">
            <li><a href="/#layanan" onclick="toggleMenu()">Layanan</a></li>
            <li><a href="/produk" onclick="toggleMenu()">Katalog Barang</a></li>
            <li><a href="/booking" onclick="toggleMenu()">Booking</a></li>
            <li><a href="/cek-status" onclick="toggleMenu()">Cek Status</a></li>
            @auth
                @if(auth()->user()->role === 'customer')
                    <li style="color:var(--text2);font-weight:600;font-size:1.05rem;display:flex;align-items:center;gap:.4rem;padding-top:1rem;border-top:1px solid rgba(255,255,255,0.06);margin-top:1rem;">
                        <i data-lucide="user" style="width:15px;height:15px;color:var(--orange)"></i>
                        {{ auth()->user()->name }}
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display:inline">
                            @csrf
                            <button type="submit" class="btn-nav" style="border:1px solid rgba(239,68,68,.3);background:rgba(239,68,68,.1);color:#F87171;width:100%;justify-content:center;padding:.8rem;">
                                <i data-lucide="log-out" style="width:14px;height:14px"></i> Keluar
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="/dashboard" class="btn-nav" style="width:100%;justify-content:center;padding:.8rem;"><i data-lucide="layout-dashboard" style="width:14px;height:14px"></i> Dashboard</a></li>
                @endif
            @else
                <li><a href="/login" class="btn-nav" style="width:100%;justify-content:center;padding:.8rem;"><i data-lucide="log-in" style="width:14px;height:14px"></i> Masuk</a></li>
            @endauth
        </ul>
    </div>

    <!-- Header Section -->
    <section class="header-section">
        <div class="header-wrap">
            <div class="header-content reveal">
                <h1 class="header-title">Booking <span>Servis Online</span></h1>
                <p class="header-desc">
                    Isi form di bawah ini untuk memesan jadwal antrean servis. Datang tepat waktu sesuai jadwal pilihan Anda, langsung masuk antrean prioritas tanpa menunggu lama!
                </p>
            </div>

            {{-- Mascot column --}}
            <div class="header-mascot reveal" style="transition-delay:.15s">
                <div class="mascot-glow"></div>
                <video autoplay loop muted playsinline>
                    <source src="{{ asset('images/ruka.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutaran video.
                </video>
            </div>
        </div>
    </section>

    <!-- Booking Form Section -->
    <section class="booking-section">
        <div class="booking-wrap reveal">
            @if(session('sukses_register'))
            <div class="flash-booking-ok" style="margin-bottom:1.5rem">
                <i data-lucide="check-circle" style="width:20px;height:20px;flex-shrink:0;margin-top:1px"></i>
                <div>
                    <strong>Registrasi Berhasil!</strong> {{ session('sukses_register') }}
                </div>
            </div>
            @endif

            @if(session('sukses_logout'))
            <div class="flash-booking-ok" style="margin-bottom:1.5rem;background:rgba(59,130,246,.1);border-color:rgba(59,130,246,.25);color:#93C5FD">
                <i data-lucide="info" style="width:20px;height:20px;flex-shrink:0;margin-top:1px"></i>
                <div>
                    {{ session('sukses_logout') }}
                </div>
            </div>
            @endif

            <div class="booking-card">
                @auth
                    @if(auth()->user()->role === 'customer')
                        @if(session('booking_sukses'))
                        <div class="flash-booking-ok">
                            <i data-lucide="check-circle" style="width:20px;height:20px;flex-shrink:0;margin-top:1px"></i>
                            <div>
                                <strong>Booking berhasil!</strong><br>
                                Nomer plat <strong>{{ session('booking_sukses') }}</strong> sudah terdaftar.
                                Datang sesuai jadwal yang dipilih ya!
                            </div>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="flash-booking-err">
                            <i data-lucide="alert-circle" style="width:18px;height:18px;flex-shrink:0;margin-top:1px"></i>
                            <div>
                                <strong>Mohon periksa kembali:</strong>
                                <ul style="margin-top:.35rem;padding-left:1rem">
                                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="booking-card-head">
                            <div class="booking-card-title">Form Booking Servis</div>
                            <div class="booking-card-sub">Nama lengkap dikunci otomatis sesuai nama akun Customer Anda.</div>
                        </div>

                        <form method="POST" action="{{ route('booking.customer') }}">
                            @csrf
                            <div class="booking-grid">

                                <div class="b-group">
                                    <label class="b-label" for="nama_pelanggan">Nama Lengkap</label>
                                    <div style="position:relative">
                                        <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="b-input"
                                            value="{{ auth()->user()->name }}" readonly style="background:rgba(255,255,255,.03);color:var(--text2);cursor:not-allowed;padding-right:2.5rem">
                                        <i data-lucide="lock" style="width:14px;height:14px;position:absolute;right:1rem;top:50%;transform:translateY(-50%);color:var(--text3)"></i>
                                    </div>
                                    @error('nama_pelanggan')<div class="b-error"><i data-lucide="alert-circle" style="width:11px;height:11px"></i>{{ $message }}</div>@enderror
                                </div>

                                <div class="b-group">
                                    <label class="b-label" for="nomer_plat">Nomer Plat</label>
                                    <input type="text" id="nomer_plat" name="nomer_plat" class="b-input"
                                        placeholder="cth. B 1234 ABC" value="{{ old('nomer_plat') }}"
                                        style="text-transform:uppercase" oninput="this.value=this.value.toUpperCase()">
                                    @error('nomer_plat')<div class="b-error"><i data-lucide="alert-circle" style="width:11px;height:11px"></i>{{ $message }}</div>@enderror
                                </div>

                                <div class="b-group full">
                                    <label class="b-label" for="tipe_motor">Tipe Motor</label>
                                    <select id="tipe_motor" name="tipe_motor" class="b-select">
                                        <option value="">— Pilih tipe motor —</option>

                                        <optgroup label="── Matic / Skuter">
                                            <option value="Honda Beat" {{ old('tipe_motor')=='Honda Beat'?'selected':'' }}>Honda Beat</option>
                                            <option value="Honda Beat Street" {{ old('tipe_motor')=='Honda Beat Street'?'selected':'' }}>Honda Beat Street</option>
                                            <option value="Honda Vario 125" {{ old('tipe_motor')=='Honda Vario 125'?'selected':'' }}>Honda Vario 125</option>
                                            <option value="Honda Vario 150" {{ old('tipe_motor')=='Honda Vario 150'?'selected':'' }}>Honda Vario 150</option>
                                            <option value="Honda Vario 160" {{ old('tipe_motor')=='Honda Vario 160'?'selected':'' }}>Honda Vario 160</option>
                                            <option value="Honda Scoopy" {{ old('tipe_motor')=='Honda Scoopy'?'selected':'' }}>Honda Scoopy</option>
                                            <option value="Honda Genio" {{ old('tipe_motor')=='Honda Genio'?'selected':'' }}>Honda Genio</option>
                                            <option value="Honda PCX 160" {{ old('tipe_motor')=='Honda PCX 160'?'selected':'' }}>Honda PCX 160</option>
                                            <option value="Honda ADV 160" {{ old('tipe_motor')=='Honda ADV 160'?'selected':'' }}>Honda ADV 160</option>
                                            <option value="Yamaha Mio M3" {{ old('tipe_motor')=='Yamaha Mio M3'?'selected':'' }}>Yamaha Mio M3</option>
                                            <option value="Yamaha Mio S" {{ old('tipe_motor')=='Yamaha Mio S'?'selected':'' }}>Yamaha Mio S</option>
                                            <option value="Yamaha Mio Soul GT" {{ old('tipe_motor')=='Yamaha Mio Soul GT'?'selected':'' }}>Yamaha Mio Soul GT</option>
                                            <option value="Yamaha Freego" {{ old('tipe_motor')=='Yamaha Freego'?'selected':'' }}>Yamaha Freego</option>
                                            <option value="Yamaha Fazzio" {{ old('tipe_motor')=='Yamaha Fazzio'?'selected':'' }}>Yamaha Fazzio</option>
                                            <option value="Yamaha Grand Filano" {{ old('tipe_motor')=='Yamaha Grand Filano'?'selected':'' }}>Yamaha Grand Filano</option>
                                            <option value="Yamaha Lexi 125" {{ old('tipe_motor')=='Yamaha Lexi 125'?'selected':'' }}>Yamaha Lexi 125</option>
                                            <option value="Yamaha NMAX 155" {{ old('tipe_motor')=='Yamaha NMAX 155'?'selected':'' }}>Yamaha NMAX 155</option>
                                            <option value="Yamaha Aerox 155" {{ old('tipe_motor')=='Yamaha Aerox 155'?'selected':'' }}>Yamaha Aerox 155</option>
                                            <option value="Yamaha XMax 250" {{ old('tipe_motor')=='Yamaha XMax 250'?'selected':'' }}>Yamaha XMax 250</option>
                                            <option value="Suzuki Nex II" {{ old('tipe_motor')=='Suzuki Nex II'?'selected':'' }}>Suzuki Nex II</option>
                                            <option value="Suzuki Address 115" {{ old('tipe_motor')=='Suzuki Address 115'?'selected':'' }}>Suzuki Address 115</option>
                                            <option value="Suzuki Avenis 125" {{ old('tipe_motor')=='Suzuki Avenis 125'?'selected':'' }}>Suzuki Avenis 125</option>
                                            <option value="Suzuki Burgman Street 125" {{ old('tipe_motor')=='Suzuki Burgman Street 125'?'selected':'' }}>Suzuki Burgman Street 125</option>
                                        </optgroup>

                                        <optgroup label="── Bebek / Semi Otomatis">
                                            <option value="Honda Supra X 125" {{ old('tipe_motor')=='Honda Supra X 125'?'selected':'' }}>Honda Supra X 125</option>
                                            <option value="Honda Revo X" {{ old('tipe_motor')=='Honda Revo X'?'selected':'' }}>Honda Revo X</option>
                                            <option value="Honda Revo Fit" {{ old('tipe_motor')=='Honda Revo Fit'?'selected':'' }}>Honda Revo Fit</option>
                                            <option value="Honda Blade 125" {{ old('tipe_motor')=='Honda Blade 125'?'selected':'' }}>Honda Blade 125</option>
                                            <option value="Yamaha Jupiter MX King 150" {{ old('tipe_motor')=='Yamaha Jupiter MX King 150'?'selected':'' }}>Yamaha Jupiter MX King 150</option>
                                            <option value="Yamaha Jupiter Z1" {{ old('tipe_motor')=='Yamaha Jupiter Z1'?'selected':'' }}>Yamaha Jupiter Z1</option>
                                            <option value="Yamaha Vega Force" {{ old('tipe_motor')=='Yamaha Vega Force'?'selected':'' }}>Yamaha Vega Force</option>
                                            <option value="Yamaha Force 1" {{ old('tipe_motor')=='Yamaha Force 1'?'selected':'' }}>Yamaha Force 1</option>
                                            <option value="Suzuki Smash 115" {{ old('tipe_motor')=='Suzuki Smash 115'?'selected':'' }}>Suzuki Smash 115</option>
                                            <option value="Suzuki Shogun 125" {{ old('tipe_motor')=='Suzuki Shogun 125'?'selected':'' }}>Suzuki Shogun 125</option>
                                        </optgroup>

                                        <optgroup label="── Sport / Naked / Motor Gigi">
                                            <option value="Honda Sonic 150R" {{ old('tipe_motor')=='Honda Sonic 150R'?'selected':'' }}>Honda Sonic 150R</option>
                                            <option value="Honda CB150R" {{ old('tipe_motor')=='Honda CB150R'?'selected':'' }}>Honda CB150R StreetFire</option>
                                            <option value="Honda CB150 Verza" {{ old('tipe_motor')=='Honda CB150 Verza'?'selected':'' }}>Honda CB150 Verza</option>
                                            <option value="Honda CB150X" {{ old('tipe_motor')=='Honda CB150X'?'selected':'' }}>Honda CB150X</option>
                                            <option value="Honda CBR150R" {{ old('tipe_motor')=='Honda CBR150R'?'selected':'' }}>Honda CBR150R</option>
                                            <option value="Honda CBR250RR" {{ old('tipe_motor')=='Honda CBR250RR'?'selected':'' }}>Honda CBR250RR</option>
                                            <option value="Honda CRF150L" {{ old('tipe_motor')=='Honda CRF150L'?'selected':'' }}>Honda CRF150L</option>
                                            <option value="Honda WR 155R" {{ old('tipe_motor')=='Honda WR 155R'?'selected':'' }}>Honda WR 155R</option>
                                            <option value="Yamaha MT-15" {{ old('tipe_motor')=='Yamaha MT-15'?'selected':'' }}>Yamaha MT-15</option>
                                            <option value="Yamaha MT-25" {{ old('tipe_motor')=='Yamaha MT-25'?'selected':'' }}>Yamaha MT-25</option>
                                            <option value="Yamaha R15 V4" {{ old('tipe_motor')=='Yamaha R15 V4'?'selected':'' }}>Yamaha R15 V4</option>
                                            <option value="Yamaha R25" {{ old('tipe_motor')=='Yamaha R25'?'selected':'' }}>Yamaha R25</option>
                                            <option value="Yamaha XSR 155" {{ old('tipe_motor')=='Yamaha XSR 155'?'selected':'' }}>Yamaha XSR 155</option>
                                            <option value="Yamaha WR155R" {{ old('tipe_motor')=='Yamaha WR155R'?'selected':'' }}>Yamaha WR155R</option>
                                            <option value="Kawasaki W175" {{ old('tipe_motor')=='Kawasaki W175'?'selected':'' }}>Kawasaki W175</option>
                                            <option value="Kawasaki KLX 150" {{ old('tipe_motor')=='Kawasaki KLX 150'?'selected':'' }}>Kawasaki KLX 150</option>
                                            <option value="Kawasaki KLX 230" {{ old('tipe_motor')=='Kawasaki KLX 230'?'selected':'' }}>Kawasaki KLX 230</option>
                                            <option value="Kawasaki Ninja 250" {{ old('tipe_motor')=='Kawasaki Ninja 250'?'selected':'' }}>Kawasaki Ninja 250</option>
                                            <option value="Kawasaki Ninja ZX-25R" {{ old('tipe_motor')=='Kawasaki Ninja ZX-25R'?'selected':'' }}>Kawasaki Ninja ZX-25R</option>
                                            <option value="Kawasaki Z250" {{ old('tipe_motor')=='Kawasaki Z250'?'selected':'' }}>Kawasaki Z250</option>
                                            <option value="Suzuki GSX-R150" {{ old('tipe_motor')=='Suzuki GSX-R150'?'selected':'' }}>Suzuki GSX-R150</option>
                                            <option value="Suzuki GSX-S150" {{ old('tipe_motor')=='Suzuki GSX-S150'?'selected':'' }}>Suzuki GSX-S150</option>
                                            <option value="Suzuki GSX-S1000" {{ old('tipe_motor')=='Suzuki GSX-S1000'?'selected':'' }}>Suzuki GSX-S1000</option>
                                        </optgroup>

                                        <optgroup label="── Lainnya">
                                            <option value="Lainnya" {{ old('tipe_motor')=='Lainnya'?'selected':'' }}>Lainnya (ketik di keluhan)</option>
                                        </optgroup>
                                    </select>
                                    @error('tipe_motor')<div class="b-error"><i data-lucide="alert-circle" style="width:11px;height:11px"></i>{{ $message }}</div>@enderror
                                </div>

                                <div class="b-group">
                                    <label class="b-label" for="tanggal_booking">Tanggal Booking</label>
                                    <input type="date" id="tanggal_booking" name="tanggal_booking" class="b-input"
                                        value="{{ old('tanggal_booking') }}" min="{{ date('Y-m-d') }}">
                                    @error('tanggal_booking')<div class="b-error"><i data-lucide="alert-circle" style="width:11px;height:11px"></i>{{ $message }}</div>@enderror
                                </div>

                                <div class="b-group">
                                    <label class="b-label" for="jam_booking">Jam Booking</label>
                                    <select id="jam_booking" name="jam_booking" class="b-select">
                                        <option value="">— Pilih jam —</option>
                                        @foreach(['08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30'] as $jam)
                                        <option value="{{ $jam }}" {{ old('jam_booking')==$jam?'selected':'' }}>{{ $jam }} WIB</option>
                                        @endforeach
                                    </select>
                                    @error('jam_booking')<div class="b-error"><i data-lucide="alert-circle" style="width:11px;height:11px"></i>{{ $message }}</div>@enderror
                                </div>

                                <div class="b-group full">
                                    <label class="b-label" for="keluhan">Keluhan / Gejala <span style="color:var(--text3);font-weight:400">(opsional)</span></label>
                                    <textarea id="keluhan" name="keluhan" class="b-textarea"
                                        placeholder="cth. Mesin susah nyala, rem bunyi, oli bocor, dll...">{{ old('keluhan', request('pasang') ? 'Pemasangan: ' . request('pasang') . ' (Merk: ' . request('brand') . ')' : '') }}</textarea>
                                </div>

                                <div class="full">
                                    <button type="submit" class="btn-booking-submit">
                                        <i data-lucide="calendar-check" style="width:18px;height:18px"></i>
                                        Kirim Booking Sekarang
                                    </button>
                                </div>

                            </div>
                        </form>
                    @else
                        {{-- Logged in as Admin or Kasir --}}
                        <div style="text-align:center;padding:2rem 1.5rem">
                            <i data-lucide="shield-alert" style="width:48px;height:48px;color:var(--orange);opacity:.8;margin-bottom:1rem"></i>
                            <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:.5rem">Akses Terbatas</h3>
                            <p style="font-size:.85rem;color:var(--text2);max-width:340px;margin:0 auto 1.5rem">Anda sedang masuk sebagai staf. Untuk menambahkan booking baru, silakan gunakan form di panel staf.</p>
                            <a href="/dashboard" class="btn-booking-submit" style="display:inline-flex;width:auto;padding:.75rem 1.5rem;text-decoration:none">
                                <i data-lucide="layout-dashboard" style="width:16px;height:16px"></i> Masuk ke Dashboard
                            </a>
                        </div>
                    @endif
                @else
                    {{-- Not logged in --}}
                    <div style="text-align:center;padding:3rem 1.5rem">
                        <i data-lucide="lock" style="width:48px;height:48px;color:var(--orange);opacity:.8;margin-bottom:1rem"></i>
                        <h3 style="font-size:1.2rem;font-weight:700;margin-bottom:.5rem">Login Customer Diperlukan</h3>
                        <p style="font-size:.85rem;color:var(--text2);max-width:340px;margin:0 auto 1.5rem">Untuk menjamin identitas pemilik kendaraan, silakan masuk ke akun customer Anda atau daftar akun baru terlebih dahulu.</p>
                        <div style="display:flex;justify-content:center;gap:1rem;flex-wrap:wrap">
                            <a href="/login" class="btn-booking-submit" style="display:inline-flex;width:auto;padding:.75rem 1.5rem;text-decoration:none">
                                <i data-lucide="log-in" style="width:16px;height:16px"></i> Masuk Akun
                            </a>
                            <a href="/register" class="btn-booking-submit" style="display:inline-flex;width:auto;padding:.75rem 1.5rem;text-decoration:none;background:transparent;border:1px solid var(--border);color:var(--text)">
                                <i data-lucide="user-plus" style="width:16px;height:16px"></i> Daftar Akun Baru
                            </a>
                        </div>
                    </div>
                @endauth
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

        // Hamburger Menu toggle
        function toggleMenu() {
            const toggle = document.getElementById('menuToggle');
            const menu = document.getElementById('mobileMenu');
            const backdrop = document.getElementById('menuBackdrop');
            
            toggle.classList.toggle('open');
            menu.classList.toggle('open');
            backdrop.classList.toggle('open');
            
            if (menu.classList.contains('open')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
    </script>
</body>
</html>
