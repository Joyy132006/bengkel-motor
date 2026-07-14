<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password — BengkelPro</title>
    <meta name="description" content="Informasi pemulihan kata sandi akun BengkelPro.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --orange:   #F97316;
            --orange-d: #ea580c;
            --orange-gl: rgba(249,115,22,.2);
            --bg:       #0B0F1A;
            --bg2:      #111827;
            --card:     #161D2E;
            --card2:    #1A2236;
            --border:   rgba(255,255,255,.07);
            --text:     #F1F5F9;
            --text2:    #94A3B8;
            --text3:    #4B5563;
            --green:    #22C55E;
            --green-d:  #16A34A;
        }

        html, body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ── Background Effects ── */
        .bg-effects {
            position: fixed;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
            z-index: 0;
        }
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: .12;
        }
        .orb-1 {
            width: 500px; height: 500px;
            background: var(--orange);
            top: -150px; left: -100px;
        }
        .orb-2 {
            width: 400px; height: 400px;
            background: #7C3AED;
            bottom: -100px; right: -80px;
        }
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.02) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: 0;
        }

        /* ── Fullscreen Split Container ── */
        .lupa-wrap {
            position: relative;
            z-index: 10;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            animation: slideUp .5s ease;
        }
        @media (min-width: 768px) {
            .lupa-wrap {
                flex-direction: row;
            }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .card {
            background: transparent;
            border: none;
            border-radius: 0;
            box-shadow: none;
            display: flex;
            flex-direction: column;
            flex: 1;
            width: 100%;
            min-height: 100vh;
        }
        @media (min-width: 768px) {
            .card {
                flex-direction: row;
            }
        }

        /* Mascot Column (Left) */
        .card-mascot {
            display: none;
            background: var(--bg2);
            position: relative;
            overflow: hidden;
            width: 50%;
            min-height: 100vh;
        }
        @media (min-width: 768px) {
            .card-mascot {
                display: flex;
                border-right: 1px solid var(--border);
            }
        }
        .mascot-fallback {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at center, #1E293B 0%, #0F172A 100%);
            position: relative;
            overflow: hidden;
        }
        .mascot-glow {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(249,115,22,0.15) 0%, transparent 70%);
            z-index: 1;
        }
        .mascot-illustration {
            position: relative;
            width: 200px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }
        .circle-bg {
            position: absolute;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(249,115,22,0.2) 0%, rgba(249,115,22,0.03) 100%);
            border: 1px solid rgba(249,115,22,0.2);
            animation: pulseBg 4s ease-in-out infinite;
        }
        .mascot-icon {
            width: 64px;
            height: 64px;
            color: #F97316;
            filter: drop-shadow(0 0 15px rgba(249, 115, 22, 0.4));
            animation: floatIcon 6s ease-in-out infinite;
        }
        .mascot-gear {
            position: absolute;
            color: rgba(249, 115, 22, 0.25);
            z-index: -1;
        }
        .gear-1 {
            width: 48px;
            height: 48px;
            top: 25px;
            right: 25px;
            animation: rotateClockwise 20s linear infinite;
        }
        .gear-2 {
            width: 36px;
            height: 36px;
            bottom: 30px;
            left: 30px;
            animation: rotateCounterClockwise 15s linear infinite;
        }

        @keyframes pulseBg {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.1); opacity: 1; }
        }
        @keyframes floatIcon {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(15deg); }
        }
        @keyframes rotateClockwise {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes rotateCounterClockwise {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(-360deg); }
        }

        /* Form Column (Right) */
        .card-form {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
            position: relative;
        }
        @media (min-width: 768px) {
            .card-form {
                width: 50%;
            }
        }
        .form-inner {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        /* ── Brand inside Form ── */
        .brand {
            display: inline-flex;
            align-items: center;
            gap: .6rem;
            margin-bottom: 2rem;
            text-decoration: none;
        }
        .brand-logo {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px var(--orange-gl);
        }
        .brand-name {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -.03em;
        }
        .brand-name span { color: var(--orange); }

        .card-head {
            margin-bottom: 1.5rem;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -.02em;
            margin-bottom: .3rem;
        }
        .card-sub {
            font-size: .88rem;
            color: var(--text2);
            line-height: 1.5;
        }

        /* ── CS Instructions Card ── */
        .info-box {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
        }
        .info-step {
            display: flex;
            gap: .8rem;
            margin-bottom: 1rem;
        }
        .info-step:last-child {
            margin-bottom: 0;
        }
        .step-num {
            width: 24px; height: 24px;
            background: rgba(249, 115, 22, 0.1);
            border: 1px solid rgba(249, 115, 22, 0.2);
            color: var(--orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .8rem;
            font-weight: 700;
            flex-shrink: 0;
        }
        .step-content h4 {
            font-size: .88rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: .2rem;
        }
        .step-content p {
            font-size: .8rem;
            color: var(--text2);
            line-height: 1.5;
        }

        /* Prominent WA Button */
        .btn-wa {
            width: 100%;
            background: linear-gradient(135deg, var(--green), var(--green-d));
            color: white;
            border: none;
            padding: .9rem;
            border-radius: 11px;
            font-size: .9rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .25s;
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            text-decoration: none;
            box-shadow: 0 0 20px rgba(34,197,94,.2);
        }
        .btn-wa:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(34,197,94,.35);
        }

        /* Secondary actions matching BSI */
        .secondary-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-top: 1rem;
        }
        .btn-sec {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--card2);
            border: 1px solid var(--border);
            color: var(--text2);
            padding: .8rem;
            border-radius: 11px;
            font-size: .82rem;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s;
            text-align: center;
        }
        .btn-sec:hover {
            color: var(--text);
            border-color: rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.03);
        }
        .btn-sec.highlight {
            background: rgba(59, 130, 246, 0.05);
            border-color: rgba(59, 130, 246, 0.15);
            color: #93C5FD;
        }
        .btn-sec.highlight:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: rgba(59, 130, 246, 0.3);
            color: white;
        }

        [data-lucide] { display: inline-block; vertical-align: middle; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; fill: none; }
    </style>
</head>
<body>

    <div class="bg-effects">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
    </div>
    <div class="bg-grid"></div>

    <div class="lupa-wrap">
        <div class="card">
            {{-- Mascot Column (Left) --}}
            <div class="card-mascot">
                <div class="mascot-fallback">
                    <div class="mascot-glow"></div>
                    <div class="mascot-illustration">
                        <div class="circle-bg"></div>
                        <i data-lucide="wrench" class="mascot-icon"></i>
                        <i data-lucide="settings" class="mascot-gear gear-1"></i>
                        <i data-lucide="settings" class="mascot-gear gear-2"></i>
                    </div>
                </div>
            </div>

            {{-- Form Column (Right) --}}
            <div class="card-form">
                <div class="form-inner">
                    {{-- Brand logo --}}
                    <a href="/" class="brand">
                        <div class="brand-logo">
                            <i data-lucide="wrench" style="width:20px;height:20px;color:white;"></i>
                        </div>
                        <div class="brand-name">Bengkel<span>Pro</span></div>
                    </a>

                    <div class="card-head">
                        <div class="card-title">Lupa Password?</div>
                        <div class="card-sub">Karena sistem berjalan di komputer lokal (offline), pemulihan password otomatis dinonaktifkan. Silakan ikuti instruksi pemulihan berikut:</div>
                    </div>

                    {{-- Instruction Steps Box --}}
                    <div class="info-box">
                        <div class="info-step">
                            <div class="step-num">1</div>
                            <div class="step-content">
                                <h4>Kunjungi Meja Kasir</h4>
                                <p>Sebutkan username atau email Anda kepada staf BengkelPro di outlet untuk reset kata sandi instan.</p>
                            </div>
                        </div>
                        <div class="info-step">
                            <div class="step-num">2</div>
                            <div class="step-content">
                                <h4>Hubungi WhatsApp CS</h4>
                                <p>Atau klik tombol hijau di bawah untuk menghubungi layanan pelanggan daring kami secara instan.</p>
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp Helpline Button --}}
                    <a href="https://wa.me/6281234567890?text=Halo%20BengkelPro,%20saya%20lupa%20password%20untuk%20akun%20bengkel%20saya.%20Mohon%20bantuannya%20untuk%20reset." 
                       target="_blank" 
                       class="btn-wa">
                        <i data-lucide="message-square" style="width:18px;height:18px;"></i>
                        Hubungi WhatsApp CS (Simulasi)
                    </a>

                    {{-- Secondary actions row matching BSI --}}
                    <div class="secondary-actions">
                        <a href="/login" class="btn-sec">Kembali Login</a>
                        <a href="/" class="btn-sec highlight">Ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
