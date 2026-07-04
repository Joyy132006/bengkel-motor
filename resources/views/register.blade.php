<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Customer — BengkelPro</title>
    <meta name="description" content="Daftar akun customer baru BengkelPro.">
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
            --green:    #10B981;
            --red:      #EF4444;
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
        .register-wrap {
            position: relative;
            z-index: 10;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            animation: slideUp .5s ease;
        }
        @media (min-width: 768px) {
            .register-wrap {
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
        .card-mascot video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0;
            border: none;
            box-shadow: none;
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
            margin-bottom: 2rem;
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
        }

        /* ── Form ── */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: .4rem;
            margin-bottom: 1.25rem;
        }
        .form-label {
            font-size: .78rem;
            font-weight: 600;
            color: var(--text2);
            letter-spacing: .03em;
        }
        .input-wrap {
            position: relative;
        }
        .input-icon {
            position: absolute;
            left: .875rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text3);
            pointer-events: none;
            display: flex;
            align-items: center;
        }
        .form-input {
            width: 100%;
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: .75rem .875rem .75rem 2.6rem;
            color: var(--text);
            font-size: .875rem;
            font-family: inherit;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-input:focus {
            border-color: rgba(249,115,22,.5);
            box-shadow: 0 0 0 3px rgba(249,115,22,.08);
        }
        .form-input::placeholder { color: var(--text3); }
        .form-input.is-error { border-color: rgba(239,68,68,.5); }

        .field-error {
            font-size: .72rem;
            color: #F87171;
            display: flex;
            align-items: center;
            gap: .3rem;
        }

        .toggle-pw {
            position: absolute;
            right: .875rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text3);
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
            transition: color .2s;
        }
        .toggle-pw:hover { color: var(--text2); }

        .btn-register {
            width: 100%;
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            color: white;
            border: none;
            padding: .85rem;
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
            box-shadow: 0 0 20px rgba(249,115,22,.25);
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(249,115,22,.4);
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

    <div class="register-wrap">
        <div class="card">
            {{-- Mascot Column (Left) --}}
            <div class="card-mascot">
                <video autoplay loop muted playsinline>
                    <source src="{{ asset('images/ruka2.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutaran video.
                </video>
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
                        <div class="card-title">Daftar Customer Baru</div>
                        <div class="card-sub">Buat akun untuk melakukan booking online dengan nama terverifikasi.</div>
                    </div>

                    <form method="POST" action="{{ route('register.post') }}" id="registerForm">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div class="form-group">
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <i data-lucide="user" style="width:16px;height:16px;"></i>
                                </span>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-input {{ $errors->has('name') ? 'is-error' : '' }}"
                                    placeholder="cth. Budi Santoso"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                >
                            </div>
                            @error('name')
                            <div class="field-error">
                                <i data-lucide="alert-circle" style="width:12px;height:12px;"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- Username --}}
                        <div class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <i data-lucide="hash" style="width:16px;height:16px;"></i>
                                </span>
                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    class="form-input {{ $errors->has('username') ? 'is-error' : '' }}"
                                    placeholder="cth. budi123"
                                    value="{{ old('username') }}"
                                    required
                                >
                            </div>
                            @error('username')
                            <div class="field-error">
                                <i data-lucide="alert-circle" style="width:12px;height:12px;"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <i data-lucide="mail" style="width:16px;height:16px;"></i>
                                </span>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-input {{ $errors->has('email') ? 'is-error' : '' }}"
                                    placeholder="cth. budi@email.com"
                                    value="{{ old('email') }}"
                                    required
                                >
                            </div>
                            @error('email')
                            <div class="field-error">
                                <i data-lucide="alert-circle" style="width:12px;height:12px;"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <i data-lucide="lock" style="width:16px;height:16px;"></i>
                                </span>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-input {{ $errors->has('password') ? 'is-error' : '' }}"
                                    placeholder="Minimal 6 karakter"
                                    required
                                >
                                <button type="button" class="toggle-pw" id="togglePw" title="Tampilkan password">
                                    <i data-lucide="eye" style="width:16px;height:16px;" id="eyeIcon"></i>
                                </button>
                            </div>
                            @error('password')
                            <div class="field-error">
                                <i data-lucide="alert-circle" style="width:12px;height:12px;"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <i data-lucide="lock-keyhole" style="width:16px;height:16px;"></i>
                                </span>
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-input"
                                    placeholder="Ulangi password"
                                    required
                                >
                            </div>
                        </div>

                        <button type="submit" class="btn-register" id="submitBtn">
                            <i data-lucide="user-plus" style="width:17px;height:17px;"></i>
                            Daftar Sekarang
                        </button>
                    </form>

                    {{-- Secondary actions row matching BSI --}}
                    <div class="secondary-actions">
                        <a href="/login" class="btn-sec">Sudah Ada Akun</a>
                        <a href="/" class="btn-sec highlight">Ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>
        lucide.createIcons();

        // Toggle password visibility
        const pwInput  = document.getElementById('password');
        const eyeIcon  = document.getElementById('eyeIcon');
        const togglePw = document.getElementById('togglePw');

        togglePw.addEventListener('click', () => {
            const isHidden = pwInput.type === 'password';
            pwInput.type   = isHidden ? 'text' : 'password';
            eyeIcon.setAttribute('data-lucide', isHidden ? 'eye-off' : 'eye');
            lucide.createIcons();
        });

        // Loading state on submit
        document.getElementById('registerForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            btn.innerHTML = '<i data-lucide="loader" style="width:17px;height:17px;animation:spin 1s linear infinite"></i> Mendaftar...';
            btn.disabled  = true;
            lucide.createIcons();
        });
    </script>
    <style>
        @keyframes spin { to { transform: rotate(360deg); } }
    </style>
</body>
</html>
