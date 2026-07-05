<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BengkelPro — Servis Motor Terpercaya & Profesional</title>
    <meta name="description" content="Bengkel motor profesional dengan mekanik berpengalaman. Booking servis online mudah, cepat, dan transparan. Terpercaya sejak 2019.">
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
            width: 700px; height: 700px;
            background: radial-gradient(circle, rgba(249,115,22,.14) 0%, transparent 65%);
            top: -200px; right: -150px;
            animation-delay: 0s;
        }
        .orb-2 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(59,130,246,.09) 0%, transparent 65%);
            bottom: 10%; left: -120px;
            animation-delay: 4s;
        }
        .orb-3 {
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(249,115,22,.08) 0%, transparent 65%);
            top: 50%; left: 40%;
            animation-delay: 2s;
        }
        @keyframes orbFloat {
            0%,100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.05); }
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
        nav.scrolled {
            background: rgba(7, 12, 24, 0.95);
            border-bottom-color: var(--border);
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
        .nav-logo .brand-name { color: var(--text); }
        .nav-logo .brand-accent { color: var(--orange); }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.75rem;
            list-style: none;
        }
        .nav-links a {
            color: var(--text2);
            text-decoration: none;
            font-size: .875rem;
            font-weight: 500;
            transition: color .2s;
        }
        .nav-links a:hover { color: var(--text); }

        .btn-nav {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: linear-gradient(135deg, var(--orange), var(--orange-d)) !important;
            color: white !important;
            padding: .5rem 1.1rem !important;
            border-radius: 10px !important;
            font-weight: 700 !important;
            font-size: .85rem !important;
            box-shadow: 0 0 20px var(--orange-glow);
            transition: all .25s !important;
        }
        .btn-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(249,115,22,.4) !important;
        }

        /* ── Hero ── */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 6rem 1.5rem 3rem;
            position: relative;
            z-index: 1;
        }
        .hero-inner { max-width: 760px; }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: rgba(249,115,22,.1);
            border: 1px solid rgba(249,115,22,.3);
            color: #fb923c;
            font-size: .75rem;
            font-weight: 700;
            padding: .4rem 1rem;
            border-radius: 999px;
            margin-bottom: 2rem;
            letter-spacing: .06em;
            text-transform: uppercase;
            animation: fadeInDown .8s ease .1s both;
        }
        .badge-dot {
            width: 6px; height: 6px;
            background: var(--orange);
            border-radius: 50%;
            animation: blink 1.5s ease infinite;
        }
        @keyframes blink {
            0%,100% { opacity: 1; }
            50% { opacity: .3; }
        }

        .hero h1 {
            font-size: clamp(2.8rem, 7vw, 5.5rem);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -.03em;
            margin-bottom: 1.5rem;
            animation: fadeInDown .8s ease .2s both;
        }
        .hero h1 .line-white { color: var(--text); display: block; }
        .hero h1 .line-gradient {
            display: block;
            background: linear-gradient(135deg, var(--orange) 0%, #f59e0b 50%, #fb923c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-desc {
            font-size: 1.05rem;
            color: var(--text2);
            max-width: 520px;
            margin: 0 auto 2.5rem;
            line-height: 1.75;
            font-weight: 400;
            animation: fadeInDown .8s ease .3s both;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            animation: fadeInDown .8s ease .4s both;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: .6rem;
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            color: white;
            text-decoration: none;
            padding: .9rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: .95rem;
            transition: all .3s;
            box-shadow: 0 0 30px var(--orange-glow), 0 4px 20px rgba(0,0,0,.4);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 50px rgba(249,115,22,.45), 0 8px 30px rgba(0,0,0,.5);
        }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: .6rem;
            background: transparent;
            color: var(--text2);
            text-decoration: none;
            padding: .9rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: .95rem;
            border: 1px solid rgba(148,163,184,.15);
            transition: all .3s;
        }
        .btn-ghost:hover {
            color: var(--text);
            border-color: rgba(148,163,184,.3);
            background: rgba(148,163,184,.05);
        }

        .hero-metrics {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 4.5rem;
            padding-top: 2.5rem;
            border-top: 1px solid var(--border2);
            flex-wrap: wrap;
            animation: fadeInDown .8s ease .5s both;
        }
        .metric { text-align: center; }
        .metric-num {
            font-size: 2.2rem;
            font-weight: 900;
            color: var(--text);
            letter-spacing: -.02em;
            line-height: 1;
        }
        .metric-num em { color: var(--orange); font-style: normal; }
        .metric-label {
            font-size: .75rem;
            color: var(--text3);
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-top: .4rem;
        }

        /* ── Hero Grid / Mascot Layout ── */
        @media (min-width: 992px) {
            .hero-inner {
                max-width: 1200px;
                width: 100%;
                display: grid;
                grid-template-columns: 1.2fr 0.8fr;
                align-items: center;
                gap: 4rem;
                text-align: left;
            }
            .hero-content {
                text-align: left;
            }
            .hero-desc {
                margin-left: 0;
                margin-right: 0;
            }
            .hero-actions {
                justify-content: flex-start;
            }
            .hero-metrics {
                justify-content: flex-start;
            }
        }
        
        .hero-mascot {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 380px;
            margin: 3.5rem auto 1.5rem;
        }
        .hero-mascot video {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px;
            border: 1px solid var(--border);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6), 0 0 40px rgba(249, 115, 22, 0.1);
            object-fit: contain;
            animation: floatMascot 6s ease-in-out infinite;
        }
        
        /* Pulse glow behind mascot */
        .mascot-glow {
            position: absolute;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(249,115,22,0.18) 0%, transparent 70%);
            z-index: -1;
            filter: blur(10px);
            animation: pulseGlow 4s ease-in-out infinite;
        }

        @keyframes floatMascot {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(1deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        @keyframes pulseGlow {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.15); opacity: 1; }
        }

        /* ── Scroll Reveal ── */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .7s ease, transform .7s ease;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── Section Commons ── */
        section { position: relative; z-index: 1; }
        .section-wrap {
            max-width: 1140px;
            margin: 0 auto;
            padding: 5rem 1.5rem;
        }
        .section-tag {
            display: inline-block;
            color: var(--orange);
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-bottom: .75rem;
        }
        .section-title {
            font-size: clamp(1.6rem, 4vw, 2.4rem);
            font-weight: 800;
            color: var(--text);
            letter-spacing: -.02em;
            margin-bottom: .75rem;
            line-height: 1.2;
        }
        .section-sub {
            color: var(--text2);
            font-size: .95rem;
            max-width: 480px;
            line-height: 1.7;
        }
        .section-head { text-align: center; margin-bottom: 3.5rem; }
        .section-head .section-sub { margin: .5rem auto 0; }

        /* ── Services ── */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        .service-card {
            background: var(--card);
            border: 1px solid var(--border2);
            border-radius: 20px;
            padding: 2rem 2rem 2rem;
            backdrop-filter: blur(20px);
            transition: all .35s;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        .service-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(249,115,22,.06) 0%, transparent 60%);
            opacity: 0;
            transition: opacity .35s;
            pointer-events: none;
        }
        .service-card:hover {
            transform: translateY(-6px);
            border-color: rgba(249,115,22,.35);
            box-shadow: 0 24px 50px rgba(0,0,0,.35), 0 0 30px rgba(249,115,22,.1);
        }
        .service-card:hover::after { opacity: 1; }

        .svc-icon {
            width: 58px; height: 58px;
            background: linear-gradient(135deg, rgba(249,115,22,.18), rgba(249,115,22,.04));
            border: 1px solid rgba(249,115,22,.25);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin-bottom: 1.4rem;
        }
        .svc-name {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: .5rem;
        }
        .svc-desc {
            font-size: .85rem;
            color: var(--text2);
            line-height: 1.65;
        }
        .svc-price {
            margin-top: 1.5rem;
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--orange);
        }
        .svc-price small {
            font-size: .72rem;
            color: var(--text3);
            font-weight: 400;
        }

        /* ── Why Us ── */
        .why-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
        }
        @media (max-width: 768px) { .why-grid { grid-template-columns: 1fr; gap: 3rem; } }

        .why-title {
            font-size: clamp(1.6rem, 4vw, 2.2rem);
            font-weight: 800;
            color: var(--text);
            margin-bottom: 1.75rem;
            line-height: 1.25;
            letter-spacing: -.02em;
        }
        .why-title .accent { color: var(--orange); }

        .why-list { display: flex; flex-direction: column; gap: 1.1rem; }
        .why-item {
            display: flex;
            align-items: flex-start;
            gap: .875rem;
            padding: 1rem;
            border-radius: 12px;
            transition: background .2s;
        }
        .why-item:hover { background: rgba(249,115,22,.04); }
        .why-icon {
            width: 32px; height: 32px;
            background: linear-gradient(135deg, rgba(249,115,22,.2), rgba(249,115,22,.04));
            border: 1px solid rgba(249,115,22,.3);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .85rem;
            flex-shrink: 0;
        }
        .why-text h4 {
            font-weight: 700;
            font-size: .95rem;
            color: var(--text);
            margin-bottom: .2rem;
        }
        .why-text p {
            font-size: .83rem;
            color: var(--text2);
            line-height: 1.55;
        }

        .stat-box {
            background: var(--card);
            border: 1px solid var(--border2);
            border-radius: 20px;
            padding: 2rem;
            backdrop-filter: blur(20px);
        }
        .stat-box-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        .stat-item {
            text-align: center;
            padding: 1.5rem 1rem;
            background: rgba(249,115,22,.05);
            border: 1px solid rgba(249,115,22,.12);
            border-radius: 14px;
            transition: all .25s;
        }
        .stat-item:hover {
            background: rgba(249,115,22,.1);
            border-color: rgba(249,115,22,.25);
            transform: scale(1.03);
        }
        .stat-item .n {
            font-size: 2.2rem;
            font-weight: 900;
            color: var(--orange);
            line-height: 1;
            letter-spacing: -.02em;
        }
        .stat-item .l {
            font-size: .72rem;
            color: var(--text3);
            text-transform: uppercase;
            letter-spacing: .05em;
            margin-top: .4rem;
        }

        /* ── CTA ── */
        .cta-wrap {
            padding: 3rem 1.5rem 6rem;
            position: relative;
            z-index: 1;
        }
        .cta-box {
            max-width: 680px;
            margin: 0 auto;
            text-align: center;
            background: linear-gradient(135deg, rgba(249,115,22,.13), rgba(234,88,12,.04));
            border: 1px solid rgba(249,115,22,.28);
            border-radius: 28px;
            padding: 4rem 2rem;
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
        }
        .cta-box::before {
            content: '';
            position: absolute;
            top: -60%;
            left: 50%;
            transform: translateX(-50%);
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(249,115,22,.2) 0%, transparent 70%);
            pointer-events: none;
        }
        .cta-box h2 {
            font-size: clamp(1.5rem, 4vw, 2.1rem);
            font-weight: 800;
            color: var(--text);
            margin-bottom: 1rem;
            letter-spacing: -.02em;
            position: relative;
        }
        .cta-box p {
            color: var(--text2);
            font-size: .95rem;
            margin-bottom: 2rem;
            max-width: 380px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        /* ── Footer ── */
        footer {
            border-top: 1px solid var(--border2);
            padding: 2rem 1.5rem;
            text-align: center;
            color: var(--text3);
            font-size: .82rem;
            position: relative;
            z-index: 1;
        }
        footer .foot-accent { color: var(--orange); }
        .footer-admin { display:block; margin-top:.75rem; font-size:.72rem; color:var(--text3); text-decoration:none; opacity:.4; transition:opacity .2s; }
        .footer-admin:hover { opacity:.75; }

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

        @media (max-width: 768px) {
            .nav-links .hide-mobile { display: none !important; }
            .menu-toggle { display: flex; }
        }

        /* ── Lucide Icons ── */
        [data-lucide] { display: inline-block; vertical-align: middle; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; fill: none; }
        .ico-nav { width: 18px; height: 18px; }
        .ico-svc { width: 26px; height: 26px; }
        .ico-why { width: 14px; height: 14px; }
        .logo-icon [data-lucide] { width: 20px; height: 20px; color: white; }

        /* ── Booking Form ── */
        .booking-section { position:relative;z-index:1; background:linear-gradient(180deg,transparent,rgba(249,115,22,.03) 40%,transparent); }
        .booking-wrap { max-width:900px; margin:0 auto; padding:5rem 1.5rem; }
        .booking-card { background:rgba(15,23,42,.75); border:1px solid rgba(249,115,22,.2); border-radius:24px; padding:2.5rem; backdrop-filter:blur(24px); box-shadow:0 32px 80px rgba(0,0,0,.3),0 0 60px rgba(249,115,22,.06); }
        .booking-card-head { margin-bottom:2rem; }
        .booking-card-title { font-size:1.3rem; font-weight:800; color:var(--text); letter-spacing:-.02em; margin-bottom:.3rem; }
        .booking-card-sub { font-size:.83rem; color:var(--text2); }
        .booking-grid { display:grid; grid-template-columns:1fr 1fr; gap:1rem; }
        @media(max-width:640px){ .booking-grid{ grid-template-columns:1fr; } }
        .booking-grid .full { grid-column:1/-1; }
        .b-group { display:flex; flex-direction:column; gap:.4rem; }
        .b-label { font-size:.77rem; font-weight:600; color:var(--text2); letter-spacing:.03em; }
        .b-input,.b-select,.b-textarea { background:rgba(7,12,24,.7); border:1px solid rgba(148,163,184,.1); border-radius:11px; color:var(--text); font-family:'Inter',sans-serif; font-size:.875rem; padding:.7rem .9rem; outline:none; transition:border-color .2s,box-shadow .2s; width:100%; }
        .b-input:focus,.b-select:focus,.b-textarea:focus { border-color:rgba(249,115,22,.5); box-shadow:0 0 0 3px rgba(249,115,22,.08); }
        .b-input::placeholder,.b-textarea::placeholder { color:rgba(148,163,184,.35); }
        .b-select option { background:#0F172A; color:var(--text); }
        .b-textarea { resize:vertical; min-height:80px; }
        .b-error { font-size:.72rem; color:#F87171; margin-top:.2rem; display:flex; align-items:center; gap:.3rem; }
        .btn-booking-submit { width:100%; padding:.9rem; border:none; border-radius:12px; background:linear-gradient(135deg,var(--orange),var(--orange-d)); color:white; font-size:.95rem; font-weight:700; font-family:'Inter',sans-serif; cursor:pointer; transition:all .25s; box-shadow:0 0 24px rgba(249,115,22,.25); display:flex; align-items:center; justify-content:center; gap:.5rem; }
        .btn-booking-submit:hover { transform:translateY(-2px); box-shadow:0 0 40px rgba(249,115,22,.4); }
        .flash-booking-ok { background:rgba(16,185,129,.1); border:1px solid rgba(16,185,129,.25); color:#34D399; padding:1rem 1.25rem; border-radius:12px; font-size:.875rem; font-weight:500; margin-bottom:1.5rem; display:flex; align-items:flex-start; gap:.75rem; animation:slideDown .4s ease; }
        .flash-booking-err { background:rgba(239,68,68,.09); border:1px solid rgba(239,68,68,.22); color:#F87171; padding:1rem 1.25rem; border-radius:12px; font-size:.875rem; margin-bottom:1.5rem; display:flex; align-items:flex-start; gap:.75rem; }
        @keyframes slideDown { from{opacity:0;transform:translateY(-10px)} to{opacity:1;transform:translateY(0)} }

        /* ── Cek Status ── */
        .cek-section { position:relative; z-index:1; }
        .cek-wrap { max-width:700px; margin:0 auto; padding:0 1.5rem 5rem; }
        .cek-card { background:rgba(15,23,42,.75); border:1px solid rgba(148,163,184,.08); border-radius:24px; padding:2.5rem; backdrop-filter:blur(24px); }
        .cek-search { display:flex; gap:.75rem; margin-top:1.25rem; }
        .cek-input { flex:1; background:rgba(7,12,24,.8); border:1px solid rgba(148,163,184,.12); border-radius:11px; color:var(--text); font-family:'Inter',sans-serif; font-size:.9rem; padding:.75rem 1rem; outline:none; transition:border-color .2s; text-transform:uppercase; }
        .cek-input:focus { border-color:rgba(249,115,22,.45); }
        .cek-input::placeholder { text-transform:none; color:rgba(148,163,184,.35); }
        .btn-cek { padding:.75rem 1.5rem; background:linear-gradient(135deg,var(--orange),var(--orange-d)); border:none; border-radius:11px; color:white; font-weight:700; font-family:'Inter',sans-serif; cursor:pointer; white-space:nowrap; transition:all .2s; display:flex; align-items:center; gap:.4rem; }
        .btn-cek:hover { transform:translateY(-2px); box-shadow:0 0 20px rgba(249,115,22,.35); }
        .cek-results { margin-top:1.75rem; display:flex; flex-direction:column; gap:.75rem; }
        .cek-item { background:rgba(249,115,22,.04); border:1px solid rgba(249,115,22,.14); border-radius:14px; padding:1.1rem 1.25rem; display:grid; grid-template-columns:1fr auto; align-items:start; gap:1rem; }
        .cek-name { font-weight:700; font-size:.9rem; color:var(--text); margin-bottom:.2rem; }
        .cek-meta { font-size:.78rem; color:var(--text2); display:flex; gap:.9rem; flex-wrap:wrap; }
        .cek-meta span { display:flex; align-items:center; gap:.3rem; }
        .cek-badge { display:inline-flex; align-items:center; gap:.35rem; padding:.35rem .8rem; border-radius:999px; font-size:.73rem; font-weight:700; white-space:nowrap; }
        .badge-antre   { background:rgba(245,158,11,.12); color:#FCD34D; border:1px solid rgba(245,158,11,.25); }
        .badge-proses  { background:rgba(59,130,246,.12);  color:#93C5FD; border:1px solid rgba(59,130,246,.25); }
        .badge-selesai { background:rgba(16,185,129,.12);  color:#6EE7B7; border:1px solid rgba(16,185,129,.25); }
        .cek-empty { text-align:center; padding:2rem; color:var(--text3); font-size:.875rem; }
    </style>
</head>
<body>
    <!-- Background -->
    <div class="bg-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <!-- Navbar -->
    <nav id="navbar">
        <a href="/" class="nav-logo">
            <div class="logo-icon"><i data-lucide="wrench"></i></div>
            <span class="brand-name">Bengkel<span class="brand-accent">Pro</span></span>
        </a>
        <ul class="nav-links">
            <li class="hide-mobile"><a href="#layanan">Layanan</a></li>
            <li class="hide-mobile"><a href="/produk">Katalog Barang</a></li>
            <li class="hide-mobile"><a href="/booking">Booking</a></li>
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
            <li><a href="#layanan" onclick="toggleMenu()">Layanan</a></li>
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

    <!-- Hero -->
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Bengkel Motor Profesional & Terpercaya
                </div>
                <h1>
                    <span class="line-white">Servis Motor</span>
                    <span class="line-gradient">Cepat & Tuntas</span>
                </h1>
                <p class="hero-desc">
                    Percayakan motor kesayangan kamu ke tangan mekanik berpengalaman kami.
                    Booking online, transparan, dan harga terjangkau.
                </p>
                <div class="hero-actions">
                    <a href="/booking" class="btn-primary">
                        <i data-lucide="calendar-check" style="width:18px;height:18px"></i> Booking Servis Sekarang
                    </a>
                    <a href="/cek-status" class="btn-ghost">
                        <i data-lucide="search" style="width:16px;height:16px"></i> Cek Status Motor
                    </a>
                </div>
                <div class="hero-metrics">
                    <div class="metric">
                        <div class="metric-num">500<em>+</em></div>
                        <div class="metric-label">Motor Ditangani</div>
                    </div>
                    <div class="metric">
                        <div class="metric-num">5<em>+</em></div>
                        <div class="metric-label">Tahun Berdiri</div>
                    </div>
                    <div class="metric">
                        <div class="metric-num">98<em>%</em></div>
                        <div class="metric-label">Pelanggan Puas</div>
                    </div>
                </div>
            </div>

            {{-- Mascot column --}}
            <div class="hero-mascot reveal" style="transition-delay:.2s">
                <div class="mascot-glow"></div>
                <video autoplay loop muted playsinline>
                    <source src="{{ asset('images/mascot.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutaran video.
                </video>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="layanan">
        <div class="section-wrap">
            <div class="section-head reveal">
                <div class="section-tag">— Layanan Kami —</div>
                <h2 class="section-title">Apa yang Bisa Kami Bantu?</h2>
                <p class="section-sub">Dari tune up rutin hingga perbaikan mesin besar, semua kami tangani dengan penuh dedikasi dan profesionalisme.</p>
            </div>
            <div class="services-grid">
                <a href="/booking" class="service-card reveal" style="text-decoration: none; color: inherit; display: block; transition-delay:.05s">
                    <div class="svc-icon"><i data-lucide="settings" class="ico-svc" style="color:#F97316"></i></div>
                    <div class="svc-name">Tune Up & Servis Rutin</div>
                    <p class="svc-desc">Pengecekan & penyetelan menyeluruh agar motor selalu prima, irit bahan bakar, dan nyaman dikendarai setiap hari.</p>
                    <div class="svc-price">Mulai Rp 75.000 <small>/ servis</small></div>
                </a>
                <a href="/booking" class="service-card reveal" style="text-decoration: none; color: inherit; display: block; transition-delay:.1s">
                    <div class="svc-icon"><i data-lucide="droplets" class="ico-svc" style="color:#F97316"></i></div>
                    <div class="svc-name">Ganti Oli & Filter</div>
                    <p class="svc-desc">Penggantian oli mesin and filter udara dengan produk berkualitas terjamin untuk menjaga mesin tetap awet dan bertenaga.</p>
                    <div class="svc-price">Mulai Rp 50.000 <small>/ ganti</small></div>
                </a>
                <a href="/booking" class="service-card reveal" style="text-decoration: none; color: inherit; display: block; transition-delay:.15s">
                    <div class="svc-icon"><i data-lucide="wrench" class="ico-svc" style="color:#F97316"></i></div>
                    <div class="svc-name">Servis Mesin & Besar</div>
                    <p class="svc-desc">Perbaikan mendalam komponen mesin, bore up, overhaul, penanganan masalah kompleks oleh teknisi senior berpengalaman.</p>
                    <div class="svc-price">Mulai Rp 250.000 <small>/ pekerjaan</small></div>
                </a>
            </div>
        </div>
    </section>



    <!-- Why Us -->
    <section id="tentang">
        <div class="section-wrap">
            <div class="why-grid">
                <div class="reveal">
                    <div class="section-tag">— Kenapa Pilih Kami —</div>
                    <h2 class="why-title">Lebih dari Sekadar <span class="accent">Bengkel Biasa</span></h2>
                    <div class="why-list">
                        <div class="why-item">
                            <div class="why-icon"><i data-lucide="shield-check" class="ico-why" style="color:#F97316"></i></div>
                            <div class="why-text">
                                <h4>Mekanik Bersertifikat</h4>
                                <p>Teknisi kami terlatih dan berpengalaman di berbagai jenis dan merek motor.</p>
                            </div>
                        </div>
                        <div class="why-item">
                            <div class="why-icon"><i data-lucide="message-circle" class="ico-why" style="color:#F97316"></i></div>
                            <div class="why-text">
                                <h4>Transparan & Jujur</h4>
                                <p>Estimasi biaya diberikan sebelum pengerjaan dimulai, tanpa biaya tersembunyi.</p>
                            </div>
                        </div>
                        <div class="why-item">
                            <div class="why-icon"><i data-lucide="smartphone" class="ico-why" style="color:#F97316"></i></div>
                            <div class="why-text">
                                <h4>Booking Online Mudah</h4>
                                <p>Pilih jadwal sesuai keinginan kamu langsung dari hp atau laptop kapan saja.</p>
                            </div>
                        </div>
                        <div class="why-item">
                            <div class="why-icon"><i data-lucide="badge-check" class="ico-why" style="color:#F97316"></i></div>
                            <div class="why-text">
                                <h4>Spare Part Original</h4>
                                <p>Kami hanya menggunakan spare part berkualitas dan terjamin keasliannya.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stat-box reveal" style="transition-delay:.1s">
                    <div class="stat-box-grid">
                        <div class="stat-item">
                            <div class="n">500+</div>
                            <div class="l">Motor Ditangani</div>
                        </div>
                        <div class="stat-item">
                            <div class="n">5+</div>
                            <div class="l">Tahun Berdiri</div>
                        </div>
                        <div class="stat-item">
                            <div class="n">10+</div>
                            <div class="l">Mekanik Handal</div>
                        </div>
                        <div class="stat-item">
                            <div class="n">98%</div>
                            <div class="l">Kepuasan Pelanggan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <div class="cta-wrap">
        <div class="cta-box reveal">
            <h2>Siap Servis Motor Kamu?</h2>
            <p>Booking sekarang dan dapatkan pengerjaan terbaik dari mekanik profesional kami.</p>
            <a href="/booking" class="btn-primary">
                <i data-lucide="calendar-check" style="width:17px;height:17px"></i> Booking Servis Sekarang
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} <span class="foot-accent">BengkelPro</span>. Bengkel Motor Profesional &amp; Terpercaya.</p>
        @auth
            <a href="/dashboard" class="footer-admin"><i data-lucide="layout-dashboard" style="width:11px;height:11px;margin-right:3px"></i>Dashboard Admin</a>
        @else
            <a href="/login" class="footer-admin"><i data-lucide="log-in" style="width:11px;height:11px;margin-right:3px"></i>Login Admin</a>
        @endauth
    </footer>

    <script>
        // Scroll reveal
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(el => io.observe(el));

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 40);
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
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
