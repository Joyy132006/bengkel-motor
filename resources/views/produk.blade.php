<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Barang & Suku Cadang — BengkelPro</title>
    <meta name="description" content="Temukan ban, oli, aki, dan sparepart motor terlengkap dan berkualitas di BengkelPro. Harga transparan dan jaminan original.">
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
            padding: 8rem 2rem 3rem;
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

        /* ── Search & Filter ── */
        .filter-section {
            padding: 1rem 2rem 2rem;
            position: relative;
            z-index: 10;
        }
        .filter-wrap {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid var(--border2);
            padding: 1.5rem;
            border-radius: 16px;
            backdrop-filter: blur(12px);
        }
        .search-box-wrap {
            position: relative;
            width: 100%;
        }
        .search-input {
            width: 100%;
            background: rgba(7, 12, 24, 0.6);
            border: 1px solid var(--border);
            padding: .9rem 1.2rem .9rem 3rem;
            border-radius: 10px;
            color: var(--text);
            font-size: .9rem;
            font-family: inherit;
            transition: all .3s;
        }
        .search-input:focus {
            outline: none;
            border-color: var(--orange);
            box-shadow: 0 0 15px rgba(249, 115, 22, 0.15);
        }
        .search-icon-inside {
            position: absolute;
            left: 1.1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text3);
            pointer-events: none;
        }
        .filter-pills {
            display: flex;
            gap: .75rem;
            flex-wrap: wrap;
        }
        .filter-pill {
            background: rgba(255,255,255,0.03);
            border: 1px solid var(--border2);
            color: var(--text2);
            padding: .5rem 1.2rem;
            border-radius: 8px;
            font-size: .85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .25s;
        }
        .filter-pill:hover {
            color: var(--text);
            border-color: rgba(249, 115, 22, 0.3);
            background: rgba(249, 115, 22, 0.05);
        }
        .filter-pill.active {
            background: var(--orange);
            border-color: var(--orange);
            color: white;
            box-shadow: 0 0 15px var(--orange-glow);
        }

        /* ── Product Grid ── */
        .catalog-section {
            padding: 0 2rem 6rem;
            position: relative;
            z-index: 10;
        }
        .catalog-wrap {
            max-width: 1200px;
            margin: 0 auto;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }
        .product-card {
            background: var(--card);
            border: 1px solid var(--border2);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all .3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }
        .product-card:hover {
            transform: translateY(-5px);
            border-color: var(--border);
            box-shadow: 0 15px 35px rgba(0,0,0,0.4), 0 0 25px rgba(249,115,22,0.05);
        }
        .card-top {
            margin-bottom: 1.5rem;
        }
        .card-img-box {
            width: 100%;
            height: 160px;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 1.25rem;
            position: relative;
            background: var(--bg2);
            border: 1px solid var(--border2);
        }
        .card-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s ease;
        }
        .product-card:hover .card-img-box img {
            transform: scale(1.08);
        }
        .card-category-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 5;
            display: inline-block;
            font-size: .65rem;
            font-weight: 800;
            color: var(--orange);
            text-transform: uppercase;
            letter-spacing: .08em;
            background: rgba(11, 15, 26, 0.8);
            border: 1px solid rgba(249, 115, 22, 0.25);
            padding: .35rem .75rem;
            border-radius: 8px;
            backdrop-filter: blur(4px);
        }
        .card-icon-box {
            width: 48px; height: 48px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text2);
            margin-bottom: 1rem;
            transition: all .3s;
        }
        .product-card:hover .card-icon-box {
            color: var(--orange);
            border-color: rgba(249, 115, 22, 0.3);
            background: rgba(249, 115, 22, 0.03);
        }
        .product-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -.01em;
            margin-bottom: .5rem;
            line-height: 1.3;
        }
        .product-brand {
            font-size: .8rem;
            color: var(--text3);
            margin-bottom: .75rem;
        }
        .product-desc {
            font-size: .82rem;
            color: var(--text2);
            line-height: 1.6;
        }
        .card-bottom {
            margin-top: 1.5rem;
            padding-top: 1.25rem;
            border-top: 1px solid var(--border2);
        }
        .price-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        .price-label {
            font-size: .75rem;
            color: var(--text3);
            text-transform: uppercase;
        }
        .price-value {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text);
        }
        .stock-row {
            display: flex;
            align-items: center;
            gap: .4rem;
            font-size: .75rem;
            margin-bottom: 1rem;
        }
        .stock-indicator {
            width: 6px; height: 6px;
            border-radius: 50%;
        }
        .stock-ok { background: #22C55E; box-shadow: 0 0 10px rgba(34,197,94,0.4); }
        .stock-warn { background: #EAB308; box-shadow: 0 0 10px rgba(234,179,8,0.4); }
        
        .btn-card-booking {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border2);
            color: var(--text2);
            padding: .75rem;
            border-radius: 10px;
            font-size: .85rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            transition: all .25s;
            text-decoration: none;
        }
        .product-card:hover .btn-card-booking {
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            color: white;
            border-color: var(--orange);
            box-shadow: 0 0 15px var(--orange-glow);
        }
        .btn-card-booking:hover {
            transform: translateY(-2px);
        }

        /* ── Empty State ── */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            background: var(--card);
            border: 1px solid var(--border2);
            border-radius: 16px;
            display: none;
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
        @media (max-width: 640px) {
            .nav-links .hide-mobile {
                display: none;
            }
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
            <li class="hide-mobile"><a href="/produk" style="color:var(--text);font-weight:600">Katalog Barang</a></li>
            <li class="hide-mobile"><a href="/booking">Booking</a></li>
            <li class="hide-mobile"><a href="/cek-status">Cek Status</a></li>
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
                <h1 class="header-title">Katalog Barang & <span>Suku Cadang</span></h1>
                <p class="header-desc">
                    Temukan ban, oli, aki, dan sparepart motor original bergaransi resmi. 
                    Semua barang dijamin orisinalitasnya dan bisa langsung dipasang oleh mekanik ahli kami dengan melakukan booking servis.
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

    <!-- Filter & Search Section -->
    <section class="filter-section">
        <div class="filter-wrap reveal">
            <div class="search-box-wrap">
                <i data-lucide="search" class="search-icon-inside" style="width:18px;height:18px"></i>
                <input type="text" id="search-input" class="search-input" placeholder="Cari nama barang atau merk... (cth: Michelin, X-Ten, GS Astra)">
            </div>
            <div class="filter-pills">
                <div class="filter-pill active" data-filter="All">Semua Barang</div>
                <div class="filter-pill" data-filter="Ban">Ban Tubeless</div>
                <div class="filter-pill" data-filter="Oli">Oli & Pelumas</div>
                <div class="filter-pill" data-filter="Aki">Aki Motor</div>
                <div class="filter-pill" data-filter="Suku Cadang">Suku Cadang</div>
            </div>
        </div>
    </section>

    <!-- Catalog Cards Section -->
    <section class="catalog-section">
        <div class="catalog-wrap reveal" style="transition-delay:.1s">
            <div class="product-grid" id="product-grid">

                @foreach($products as $p)
                <div class="product-card" data-name="{{ strtolower($p['name']) }}" data-category="{{ $p['category'] }}" data-brand="{{ strtolower($p['brand']) }}">
                    <div class="card-top">
                        <div class="card-img-box">
                            <img src="{{ asset('images/' . $p['image']) }}" alt="{{ $p['name'] }}">
                            <span class="card-category-badge">{{ $p['category'] }}</span>
                        </div>
                        <h3 class="product-name">{{ $p['name'] }}</h3>
                        <div class="product-brand">Merk: <strong>{{ $p['brand'] }}</strong></div>
                        <p class="product-desc">{{ $p['desc'] }}</p>
                    </div>
                    
                    <div class="card-bottom">
                        <div class="price-row">
                            <span class="price-label">Harga</span>
                            <span class="price-value">Rp {{ number_format($p['price'], 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="stock-row">
                            <span class="stock-indicator {{ $p['stock'] == 'Tersedia' ? 'stock-ok' : 'stock-warn' }}"></span>
                            <span style="color:{{ $p['stock'] == 'Tersedia' ? 'var(--text2)' : '#fb923c' }}">{{ $p['stock'] }}</span>
                        </div>

                        <a href="/booking?pasang={{ urlencode($p['name']) }}&brand={{ urlencode($p['brand']) }}" class="btn-card-booking">
                            <i data-lucide="calendar-check" style="width:15px;height:15px"></i>
                            Booking Pasang
                        </a>
                    </div>
                </div>
                @endforeach

                <!-- Empty State (jika pencarian tidak ada hasil) -->
                <div class="empty-state" id="empty-state">
                    <i data-lucide="package-x" style="width:48px;height:48px;color:var(--text3);margin-bottom:1rem"></i>
                    <h4 style="font-size:1.1rem;font-weight:700;margin-bottom:.5rem">Barang Tidak Ditemukan</h4>
                    <p style="font-size:.85rem;color:var(--text3)">Coba cari kata kunci atau merk barang yang lain.</p>
                </div>

            </div>
        </div>
    </section>

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>
        lucide.createIcons();

        // --- JavaScript Real-Time Search & Filter ---
        const searchInput = document.getElementById('search-input');
        const filterPills = document.querySelectorAll('.filter-pill');
        const cards = document.querySelectorAll('.product-card');
        const emptyState = document.getElementById('empty-state');

        let activeCategory = 'All';

        function filterProducts() {
            const query = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;

            cards.forEach(card => {
                const name = card.getAttribute('data-name');
                const category = card.getAttribute('data-category');
                const brand = card.getAttribute('data-brand');

                const matchesSearch = name.includes(query) || brand.includes(query);
                const matchesCategory = activeCategory === 'All' || category === activeCategory;

                if (matchesSearch && matchesCategory) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Tampilkan empty state jika pencarian kosong
            if (visibleCount === 0) {
                emptyState.style.display = 'block';
            } else {
                emptyState.style.display = 'none';
            }
        }

        searchInput.addEventListener('input', filterProducts);

        filterPills.forEach(pill => {
            pill.addEventListener('click', () => {
                filterPills.forEach(p => p.classList.remove('active'));
                pill.classList.add('active');
                activeCategory = pill.getAttribute('data-filter');
                filterProducts();
            });
        });

        // Simple Scroll Reveal implementation
        document.addEventListener('DOMContentLoaded', () => {
            const reveals = document.querySelectorAll('.reveal');
            reveals.forEach(r => r.classList.add('visible'));
        });
    </script>
</body>
</html>
