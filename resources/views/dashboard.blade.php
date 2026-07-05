<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin — BengkelPro</title>
    <meta name="description" content="Panel admin untuk mengelola booking servis motor dan data mekanik BengkelPro.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --sidebar-w: 255px;
            --orange:    #F97316;
            --orange-d:  #ea580c;
            --orange-gl: rgba(249,115,22,.22);
            --blue:      #3B82F6;
            --green:     #10B981;
            --amber:     #F59E0B;
            --red:       #EF4444;
            --bg:        #0B0F1A;
            --bg2:       #111827;
            --sidebar:   #0F1420;
            --card:      #161D2E;
            --card2:     #1A2236;
            --border:    rgba(255,255,255,.07);
            --border-o:  rgba(249,115,22,.22);
            --text:      #F1F5F9;
            --text2:     #94A3B8;
            --text3:     #4B5563;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ══════════════════════════════════
           SIDEBAR
        ══════════════════════════════════ */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar);
            border-right: 1px solid var(--border);
            position: fixed;
            top: 0; left: 0; bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 200;
            transition: transform .3s ease;
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem 1rem;
            display: flex;
            align-items: center;
            gap: .625rem;
            border-bottom: 1px solid var(--border);
            text-decoration: none;
        }
        .brand-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
            box-shadow: 0 0 18px var(--orange-gl);
        }
        .brand-text {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--text);
            letter-spacing: -.02em;
        }
        .brand-text span { color: var(--orange); }
        .brand-tag {
            font-size: .65rem;
            color: var(--text3);
            font-weight: 500;
            margin-top: .1rem;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1rem .75rem;
            display: flex;
            flex-direction: column;
            gap: .25rem;
            overflow-y: auto;
        }

        .nav-section-label {
            font-size: .65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: var(--text3);
            padding: .75rem .5rem .35rem;
            margin-top: .5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .625rem .875rem;
            border-radius: 10px;
            text-decoration: none;
            color: var(--text2);
            font-size: .85rem;
            font-weight: 500;
            transition: all .2s;
            position: relative;
        }
        .nav-link:hover {
            background: rgba(255,255,255,.05);
            color: var(--text);
        }
        .nav-link.active {
            background: rgba(249,115,22,.12);
            color: var(--orange);
            font-weight: 600;
        }
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 3px; height: 70%;
            background: var(--orange);
            border-radius: 0 3px 3px 0;
        }
        .nav-icon { font-size: 1rem; width: 1.1rem; text-align: center; }

        .sidebar-footer {
            padding: .875rem 1rem;
            border-top: 1px solid var(--border);
        }
        .sf-item {
            display: flex;
            align-items: center;
            gap: .6rem;
            padding: .5rem;
            border-radius: 8px;
            text-decoration: none;
            color: var(--text2);
            font-size: .82rem;
            font-weight: 500;
            transition: all .2s;
        }
        .sf-item:hover { color: var(--text); background: rgba(255,255,255,.04); }

        /* Hamburger (mobile) */
        .hamburger {
            display: none;
            position: fixed;
            top: 1rem; left: 1rem;
            z-index: 300;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: .5rem;
            cursor: pointer;
            font-size: 1.1rem;
            color: var(--text);
        }
        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.55);
            z-index: 150;
            backdrop-filter: blur(4px);
        }

        /* ══════════════════════════════════
           MAIN CONTENT
        ══════════════════════════════════ */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Topbar */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(11,15,26,.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .topbar-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -.02em;
            display: flex;
            align-items: center;
            gap: .5rem;
        }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .topbar-date {
            font-size: .8rem;
            color: var(--text2);
            background: var(--card2);
            border: 1px solid var(--border);
            padding: .4rem .9rem;
            border-radius: 8px;
        }

        .btn-orange {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            color: white;
            border: none;
            padding: .6rem 1.2rem;
            border-radius: 10px;
            font-size: .85rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .25s;
            text-decoration: none;
            font-family: 'Inter', sans-serif;
            box-shadow: 0 0 18px var(--orange-gl);
            white-space: nowrap;
        }
        .btn-orange:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 28px rgba(249,115,22,.4);
        }

        /* Content Area */
        .content {
            padding: 1.75rem 2rem;
            flex: 1;
        }

        /* ── Flash / Alert ── */
        .flash-success {
            display: flex;
            align-items: center;
            gap: .75rem;
            background: rgba(16,185,129,.12);
            border: 1px solid rgba(16,185,129,.3);
            color: #34D399;
            padding: .875rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: .875rem;
            font-weight: 500;
            animation: slideDown .4s ease;
        }
        .flash-error {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            background: rgba(239,68,68,.1);
            border: 1px solid rgba(239,68,68,.3);
            color: #F87171;
            padding: .875rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: .875rem;
            font-weight: 500;
            animation: slideDown .4s ease;
        }
        .flash-error ul { margin-left: 1rem; }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Stats Grid ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }
        @media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 600px)  { .stats-grid { grid-template-columns: 1fr; } }

        .stat-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: all .25s;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            border-color: rgba(255,255,255,.12);
            box-shadow: 0 12px 30px rgba(0,0,0,.3);
        }
        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 2px;
            border-radius: 0 0 16px 16px;
        }
        .stat-card.orange-card::after { background: linear-gradient(90deg, var(--orange), var(--orange-d)); }
        .stat-card.amber-card::after  { background: linear-gradient(90deg, var(--amber), #d97706); }
        .stat-card.blue-card::after   { background: linear-gradient(90deg, var(--blue), #2563eb); }
        .stat-card.green-card::after  { background: linear-gradient(90deg, var(--green), #059669); }

        .stat-icon {
            width: 56px; height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
            position: relative;
        }
        .stat-icon::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 16px;
            opacity: .4;
            filter: blur(12px);
            z-index: -1;
        }
        .icon-orange {
            background: linear-gradient(135deg, rgba(249,115,22,.22), rgba(249,115,22,.06));
            border: 1px solid rgba(249,115,22,.35);
            box-shadow: 0 0 20px rgba(249,115,22,.15);
        }
        .icon-orange::after { background: var(--orange); }
        .icon-amber {
            background: linear-gradient(135deg, rgba(245,158,11,.22), rgba(245,158,11,.06));
            border: 1px solid rgba(245,158,11,.35);
            box-shadow: 0 0 20px rgba(245,158,11,.15);
        }
        .icon-amber::after { background: #F59E0B; }
        .icon-blue {
            background: linear-gradient(135deg, rgba(59,130,246,.22), rgba(59,130,246,.06));
            border: 1px solid rgba(59,130,246,.35);
            box-shadow: 0 0 20px rgba(59,130,246,.15);
        }
        .icon-blue::after { background: #3B82F6; }
        .icon-green {
            background: linear-gradient(135deg, rgba(16,185,129,.22), rgba(16,185,129,.06));
            border: 1px solid rgba(16,185,129,.35);
            box-shadow: 0 0 20px rgba(16,185,129,.15);
        }
        .icon-green::after { background: #10B981; }

        .stat-num {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--text);
            line-height: 1;
            letter-spacing: -.03em;
        }
        .stat-label {
            font-size: .78rem;
            color: var(--text2);
            margin-top: .3rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            font-weight: 500;
        }

        /* ── Section Block ── */
        .section-block {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 1.75rem;
        }
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
        }
        .section-header-left { display: flex; align-items: center; gap: .75rem; }
        .section-icon-wrap {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: rgba(249,115,22,.12);
            border: 1px solid rgba(249,115,22,.22);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
        }
        .section-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -.01em;
        }
        .section-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(249,115,22,.15);
            color: var(--orange);
            font-size: .72rem;
            font-weight: 700;
            padding: .2rem .55rem;
            border-radius: 999px;
            min-width: 24px;
        }

        /* ── Search Bar ── */
        .search-bar {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            gap: .75rem;
            align-items: center;
        }
        .search-wrap {
            flex: 1;
            position: relative;
        }
        .search-icon {
            position: absolute;
            left: .875rem; top: 50%;
            transform: translateY(-50%);
            color: var(--text3);
            font-size: .9rem;
            pointer-events: none;
        }
        .search-input {
            width: 100%;
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .625rem .875rem .625rem 2.4rem;
            color: var(--text);
            font-size: .875rem;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color .2s;
        }
        .search-input:focus { border-color: rgba(249,115,22,.4); }
        .search-input::placeholder { color: var(--text3); }
        .btn-search {
            background: var(--card2);
            border: 1px solid var(--border);
            color: var(--text2);
            padding: .625rem 1rem;
            border-radius: 10px;
            font-size: .82rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            font-family: 'Inter', sans-serif;
            white-space: nowrap;
        }
        .btn-search:hover { color: var(--text); border-color: rgba(255,255,255,.15); }
        .btn-reset {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text3);
            padding: .625rem 1rem;
            border-radius: 10px;
            font-size: .82rem;
            cursor: pointer;
            transition: all .2s;
            font-family: 'Inter', sans-serif;
            text-decoration: none;
            white-space: nowrap;
        }
        .btn-reset:hover { color: var(--text2); }

        /* ── Table ── */
        .table-wrap { overflow-x: auto; }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: .83rem;
        }
        thead th {
            padding: .75rem 1rem;
            text-align: left;
            font-size: .7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: var(--text3);
            background: rgba(255,255,255,.02);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }
        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background .15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: rgba(255,255,255,.025); }
        td {
            padding: .875rem 1rem;
            vertical-align: middle;
            color: var(--text2);
        }
        td .primary-text {
            color: var(--text);
            font-weight: 600;
            font-size: .875rem;
        }
        td .sub-text {
            color: var(--text3);
            font-size: .75rem;
            margin-top: .1rem;
        }

        .plat-badge {
            display: inline-block;
            background: rgba(249,115,22,.1);
            border: 1px solid rgba(249,115,22,.25);
            color: #fb923c;
            font-size: .78rem;
            font-weight: 700;
            padding: .25rem .65rem;
            border-radius: 7px;
            letter-spacing: .05em;
        }

        /* Status badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .3rem .75rem;
            border-radius: 999px;
            font-size: .72rem;
            font-weight: 700;
            white-space: nowrap;
        }
        .badge-dot-sm {
            width: 5px; height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .badge-amber {
            background: rgba(245,158,11,.12);
            border: 1px solid rgba(245,158,11,.3);
            color: #FCD34D;
        }
        .badge-amber .badge-dot-sm { background: #F59E0B; }
        .badge-blue {
            background: rgba(59,130,246,.12);
            border: 1px solid rgba(59,130,246,.3);
            color: #93C5FD;
        }
        .badge-blue .badge-dot-sm { background: var(--blue); }
        .badge-green {
            background: rgba(16,185,129,.12);
            border: 1px solid rgba(16,185,129,.3);
            color: #6EE7B7;
        }
        .badge-green .badge-dot-sm { background: var(--green); }

        /* Action buttons */
        .actions {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-wrap: nowrap;
        }
        /* ── Custom Status Dropdown ── */
        .csd-wrap { position: relative; }
        .csd-btn {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            background: var(--card2);
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: .38rem .65rem;
            font-size: .75rem;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            min-width: 118px;
            transition: border-color .2s, background .2s;
            color: var(--text2);
            width: 100%;
            justify-content: space-between;
        }
        .csd-btn:hover { border-color: rgba(249,115,22,.35); color: var(--text); }
        .csd-btn-left { display: flex; align-items: center; gap: .4rem; }
        .csd-btn [data-lucide] { flex-shrink: 0; }
        .csd-panel {
            display: none;
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            background: var(--card);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 11px;
            padding: .3rem;
            z-index: 999;
            min-width: 150px;
            box-shadow: 0 12px 32px rgba(0,0,0,.5);
            animation: fadeIn .15s ease;
        }
        .csd-panel.open { display: block; }
        .csd-opt {
            display: flex;
            align-items: center;
            gap: .5rem;
            padding: .5rem .7rem;
            border-radius: 8px;
            font-size: .78rem;
            cursor: pointer;
            color: var(--text2);
            transition: background .15s, color .15s;
            font-family: 'Inter', sans-serif;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }
        .csd-opt:hover { background: rgba(255,255,255,.07); color: var(--text); }

        .btn-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: .85rem;
            cursor: pointer;
            border: 1px solid var(--border);
            background: var(--card2);
            transition: all .2s;
            text-decoration: none;
        }
        .btn-pdf:hover  { background: rgba(59,130,246,.15);  border-color: rgba(59,130,246,.35);  }
        .btn-del:hover  { background: rgba(239,68,68,.15);   border-color: rgba(239,68,68,.35);   }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text3);
        }
        .empty-state .empty-icon { font-size: 3rem; margin-bottom: 1rem; opacity: .5; }
        .empty-state .empty-title { font-size: .95rem; font-weight: 600; color: var(--text2); margin-bottom: .5rem; }
        .empty-state .empty-sub   { font-size: .82rem; }

        /* ── Mekanik Section ── */
        .mek-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1rem;
            padding: 1.5rem;
        }
        .mek-card {
            background: var(--card2);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.25rem;
            transition: all .25s;
        }
        .mek-card:hover {
            border-color: rgba(249,115,22,.25);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,.25);
        }
        .mek-avatar {
            width: 48px; height: 48px;
            background: linear-gradient(135deg, rgba(249,115,22,.2), rgba(249,115,22,.05));
            border: 1px solid rgba(249,115,22,.25);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 1rem;
        }
        .mek-name {
            font-size: .9rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: .25rem;
        }
        .mek-skill {
            font-size: .75rem;
            color: var(--text2);
            line-height: 1.4;
        }
        .mek-booking-count {
            margin-top: .875rem;
            font-size: .7rem;
            color: var(--text3);
            display: flex;
            align-items: center;
            gap: .35rem;
        }
        .mek-booking-count strong { color: var(--orange); }

        /* Tambah Mekanik Form (inline, collapsible) */
        .add-mek-form {
            padding: 1.5rem;
            border-top: 1px solid var(--border);
            display: none;
        }
        .add-mek-form.open { display: block; }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: .875rem;
            align-items: end;
        }
        @media (max-width: 600px) { .form-row { grid-template-columns: 1fr; } }

        .form-group { display: flex; flex-direction: column; gap: .35rem; }
        .form-label {
            font-size: .75rem;
            font-weight: 600;
            color: var(--text2);
            letter-spacing: .03em;
        }
        .form-input {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .65rem .875rem;
            color: var(--text);
            font-size: .875rem;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color .2s;
        }
        .form-input:focus { border-color: rgba(249,115,22,.45); }
        .form-input::placeholder { color: var(--text3); }
        .form-input.error { border-color: rgba(239,68,68,.5); }

        /* ══════════════════════════════════
           MODAL
        ══════════════════════════════════ */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.6);
            backdrop-filter: blur(8px);
            z-index: 500;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .modal-overlay.open {
            display: flex;
            animation: fadeIn .25s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        .modal {
            background: var(--card);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 20px;
            width: 100%;
            max-width: 540px;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp .3s ease;
            box-shadow: 0 30px 70px rgba(0,0,0,.5);
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(24px) scale(.97); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        .modal-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.5rem 1.5rem 0;
        }
        .modal-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: .5rem;
        }
        .modal-close {
            width: 32px; height: 32px;
            border-radius: 8px;
            background: var(--card2);
            border: 1px solid var(--border);
            color: var(--text2);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            transition: all .2s;
        }
        .modal-close:hover { color: var(--text); background: rgba(255,255,255,.06); }

        .modal-body { padding: 1.25rem 1.5rem; }
        .modal-foot { padding: 0 1.5rem 1.5rem; display: flex; gap: .75rem; justify-content: flex-end; }

        .modal-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        @media (max-width: 480px) { .modal-grid { grid-template-columns: 1fr; } }
        .modal-grid .full-col { grid-column: 1 / -1; }

        .form-select {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .65rem .875rem;
            color: var(--text);
            font-size: .875rem;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: border-color .2s;
            width: 100%;
        }
        .form-select:focus { border-color: rgba(249,115,22,.45); }
        .form-select option { background: #1e293b; }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text2);
            padding: .65rem 1.25rem;
            border-radius: 10px;
            font-size: .875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            font-family: 'Inter', sans-serif;
        }
        .btn-outline:hover { color: var(--text); border-color: rgba(255,255,255,.18); }

        .form-error-msg {
            font-size: .72rem;
            color: #F87171;
            margin-top: .25rem;
        }

        /* ══════════════════════════════════
           RESPONSIVE
        ══════════════════════════════════ */
        @media (max-width: 900px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main {
                margin-left: 0;
            }
            .hamburger { display: flex; }
            .overlay.open { display: block; }
            .topbar { padding: 1rem 1rem 1rem 3.5rem; }
            .content { padding: 1.25rem 1rem; }
            .topbar-date { display: none; }
        }

        /* ── Lucide Icons ── */
        [data-lucide] { display: inline-block; vertical-align: middle; stroke: currentColor; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; fill: none; flex-shrink: 0; }
        .ico    { width: 16px; height: 16px; }
        .ico-sm { width: 14px; height: 14px; }
        .ico-md { width: 18px; height: 18px; }
        .ico-lg { width: 22px; height: 22px; }
        .ico-xl { width: 28px; height: 28px; }
        .nav-icon [data-lucide] { width: 17px; height: 17px; }
        .stat-icon [data-lucide] { width: 26px; height: 26px; }
        .section-icon-wrap [data-lucide] { width: 15px; height: 15px; }
        .btn-icon [data-lucide] { width: 14px; height: 14px; }
        .empty-icon [data-lucide] { width: 44px; height: 44px; opacity: .35; }
        .mek-avatar [data-lucide] { width: 26px; height: 26px; }

        /* ── User info + logout in topbar ── */
        .topbar-user {
            display: flex;
            align-items: center;
            gap: .6rem;
            background: var(--card2);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: .35rem .75rem .35rem .5rem;
            text-decoration: none;
            transition: border-color .2s;
        }
        .topbar-user:hover { border-color: rgba(255,255,255,.15); }
        .user-avatar {
            width: 28px; height: 28px;
            background: linear-gradient(135deg, var(--orange), var(--orange-d));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .user-name  { font-size: .78rem; font-weight: 600; color: var(--text); line-height: 1.2; }
        .user-role  { font-size: .68rem; color: var(--text3); text-transform: capitalize; }
        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text3);
            padding: .45rem .8rem;
            border-radius: 9px;
            font-size: .78rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            font-family: 'Inter', sans-serif;
        }
        .btn-logout:hover { color: #F87171; border-color: rgba(239,68,68,.35); background: rgba(239,68,68,.06); }
        /* ── Custom Confirm Modal ── */
        .cmodal-overlay {
            position: fixed; inset: 0; z-index: 9999;
            background: rgba(0,0,0,.65);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none;
            transition: opacity .2s ease;
        }
        .cmodal-overlay.open { opacity: 1; pointer-events: all; }
        .cmodal {
            background: #0F172A;
            border: 1px solid rgba(239,68,68,.25);
            border-radius: 20px;
            padding: 2rem;
            width: 100%; max-width: 420px;
            box-shadow: 0 32px 80px rgba(0,0,0,.5), 0 0 40px rgba(239,68,68,.08);
            transform: scale(.94) translateY(10px);
            transition: transform .25s ease, opacity .25s ease;
            opacity: 0;
        }
        .cmodal-overlay.open .cmodal { transform: scale(1) translateY(0); opacity: 1; }
        .cmodal-icon {
            width: 52px; height: 52px;
            background: rgba(239,68,68,.1);
            border: 1px solid rgba(239,68,68,.25);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.25rem;
        }
        .cmodal-title { font-size: 1.05rem; font-weight: 700; color: #F1F5F9; margin-bottom: .4rem; }
        .cmodal-sub   { font-size: .83rem; color: #94A3B8; line-height: 1.6; margin-bottom: .35rem; }
        .cmodal-name  { font-size: .83rem; color: #F97316; font-weight: 600; margin-bottom: 1.5rem; }
        .cmodal-warn  { font-size: .75rem; color: #F87171; display: flex; align-items: center; gap: .35rem; margin-bottom: 1.5rem; }
        .cmodal-actions { display: flex; gap: .75rem; }
        .cmodal-btn-cancel {
            flex: 1; padding: .7rem; border-radius: 11px;
            background: rgba(148,163,184,.08); border: 1px solid rgba(148,163,184,.15);
            color: #94A3B8; font-size: .875rem; font-weight: 600;
            font-family: 'Inter', sans-serif; cursor: pointer;
            transition: all .2s;
        }
        .cmodal-btn-cancel:hover { background: rgba(148,163,184,.14); color: #F1F5F9; }
        .cmodal-btn-hapus {
            flex: 1; padding: .7rem; border-radius: 11px;
            background: linear-gradient(135deg, #EF4444, #DC2626);
            border: none; color: white; font-size: .875rem; font-weight: 700;
            font-family: 'Inter', sans-serif; cursor: pointer;
            box-shadow: 0 0 20px rgba(239,68,68,.3);
            transition: all .2s; display: flex; align-items: center; justify-content: center; gap: .4rem;
        }
        .cmodal-btn-hapus:hover { transform: translateY(-2px); box-shadow: 0 0 30px rgba(239,68,68,.45); }

        /* ── Bayar Button ── */
        .btn-bayar {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 5px 10px; border-radius: 8px; cursor: pointer;
            background: rgba(16,185,129,.12);
            border: 1px solid rgba(16,185,129,.35);
            color: #10B981; font-size: .72rem; font-weight: 700;
            font-family: 'Inter', sans-serif; white-space: nowrap;
            transition: all .2s;
        }
        .btn-bayar:hover { background: rgba(16,185,129,.22); transform: translateY(-1px); }

        /* ── Payment Confirm Modal ── */
        .pmodal-overlay {
            position: fixed; inset: 0; z-index: 9999;
            background: rgba(0,0,0,.65);
            backdrop-filter: blur(6px);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none;
            transition: opacity .2s ease;
        }
        .pmodal-overlay.open { opacity: 1; pointer-events: all; }
        .pmodal {
            background: #0F172A;
            border: 1px solid rgba(16,185,129,.25);
            border-radius: 20px;
            padding: 2rem;
            width: 100%; max-width: 420px;
            box-shadow: 0 32px 80px rgba(0,0,0,.5), 0 0 40px rgba(16,185,129,.08);
            transform: scale(.94) translateY(10px);
            transition: transform .25s ease, opacity .25s ease;
            opacity: 0;
        }
        .pmodal-overlay.open .pmodal { transform: scale(1) translateY(0); opacity: 1; }
        .pmodal-icon {
            width: 52px; height: 52px;
            background: rgba(16,185,129,.1);
            border: 1px solid rgba(16,185,129,.25);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.25rem;
        }
        .pmodal-title { font-size: 1.05rem; font-weight: 700; color: #F1F5F9; margin-bottom: .4rem; }
        .pmodal-sub   { font-size: .83rem; color: #94A3B8; line-height: 1.6; margin-bottom: .35rem; }
        .pmodal-name  { font-size: .83rem; color: #10B981; font-weight: 600; margin-bottom: 1.5rem; }
        .pmodal-info  { font-size: .75rem; color: #94A3B8; display: flex; align-items: center; gap: .35rem; margin-bottom: 1.5rem; }
        .pmodal-actions { display: flex; gap: .75rem; }
        .pmodal-btn-cancel {
            flex: 1; padding: .7rem; border-radius: 11px;
            background: rgba(148,163,184,.08); border: 1px solid rgba(148,163,184,.15);
            color: #94A3B8; font-size: .875rem; font-weight: 600;
            font-family: 'Inter', sans-serif; cursor: pointer; transition: all .2s;
        }
        .pmodal-btn-cancel:hover { background: rgba(148,163,184,.14); color: #F1F5F9; }
        .pmodal-btn-lunas {
            flex: 1; padding: .7rem; border-radius: 11px;
            background: linear-gradient(135deg, #10B981, #059669);
            border: none; color: white; font-size: .875rem; font-weight: 700;
            font-family: 'Inter', sans-serif; cursor: pointer;
            box-shadow: 0 0 20px rgba(16,185,129,.3);
            transition: all .2s; display: flex; align-items: center; justify-content: center; gap: .4rem;
        }
        .pmodal-btn-lunas:hover { transform: translateY(-2px); box-shadow: 0 0 30px rgba(16,185,129,.45); }
    </style>
</head>
<body>

    <!-- Mobile overlay -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    <!-- Hamburger -->
    <button class="hamburger" id="hamburger" onclick="toggleSidebar()"><i data-lucide="menu" class="ico-md"></i></button>

    <!-- ═══════════════ SIDEBAR ═══════════════ -->
    <aside class="sidebar" id="sidebar">
        <a href="/dashboard" class="sidebar-brand">
            <div class="brand-icon">
                @if(Auth::user()->role === 'kasir')
                    <i data-lucide="receipt" style="width:19px;height:19px;color:white;"></i>
                @else
                    <i data-lucide="shield" style="width:19px;height:19px;color:white;"></i>
                @endif
            </div>
            <div>
                <div class="brand-text">Bengkel<span>Pro</span></div>
                <div class="brand-tag">
                    @if(Auth::user()->role === 'kasir')
                        Kasir Panel
                    @else
                        Admin Panel
                    @endif
                </div>
            </div>
        </a>

        <nav class="sidebar-nav">
            <div class="nav-section-label">Menu Utama</div>
            <a href="#statistik" class="nav-link active" onclick="setActive(this)">
                <span class="nav-icon"><i data-lucide="gauge"></i></span>
                @if(Auth::user()->role === 'kasir') Ringkasan @else Dashboard @endif
            </a>
            <a href="#booking" class="nav-link" onclick="setActive(this)">
                <span class="nav-icon"><i data-lucide="clipboard-list"></i></span> Daftar Booking
            </a>
            @if(Auth::user()->role === 'admin')
            <a href="#mekanik" class="nav-link" onclick="setActive(this)">
                <span class="nav-icon"><i data-lucide="wrench"></i></span> Data Mekanik
            </a>
            @else
            <a href="#kasir-info" class="nav-link" onclick="setActive(this)">
                <span class="nav-icon"><i data-lucide="banknote"></i></span> Pembayaran
            </a>
            @endif
        </nav>

        <div class="sidebar-footer">
            <div class="sf-item" style="color: var(--text3); font-size:.72rem;">
                <span><i data-lucide="calendar" class="ico-sm"></i></span>
                <span>{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
            </div>
        </div>
    </aside>

    <!-- ═══════════════ MAIN ═══════════════ -->
    <main class="main">

        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-title">
                @if(Auth::user()->role === 'kasir')
                    <i data-lucide="receipt" style="width:20px;height:20px;color:var(--orange);flex-shrink:0"></i>
                    Kasir Dashboard
                @else
                    <i data-lucide="gauge" style="width:20px;height:20px;color:var(--orange);flex-shrink:0"></i>
                    Dashboard Admin
                @endif
            </div>
            <div class="topbar-right">
                <div class="topbar-date" style="display:flex;align-items:center;gap:.4rem">
                    <i data-lucide="calendar" class="ico-sm"></i> {{ \Carbon\Carbon::now()->format('d M Y') }}
                </div>
                {{-- User info --}}
                <div class="topbar-user">
                    <div class="user-avatar">
                        <i data-lucide="user" style="width:14px;height:14px;color:white;"></i>
                    </div>
                    <div>
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">{{ Auth::user()->role }}</div>
                    </div>
                </div>
                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="btn-logout" title="Logout">
                        <i data-lucide="log-out" style="width:14px;height:14px;"></i>
                        Logout
                    </button>
                </form>

            </div>
        </div>

        <div class="content">

            {{-- Flash success --}}
            @if(session('sukses'))
            <div class="flash-success">
                <span><i data-lucide="check-circle" class="ico-md" style="color:#34D399"></i></span>
                <span>{{ session('sukses') }}</span>
            </div>
            @endif

            {{-- Validation errors --}}
            @if($errors->any())
            <div class="flash-error">
                <span><i data-lucide="alert-triangle" class="ico-md" style="color:#F87171"></i></span>
                <div>
                    <strong>Ada yang perlu diperbaiki:</strong>
                    <ul style="margin-top:.3rem;">
                        @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            {{-- ──────────────────── STATS ──────────────────── --}}
            <div class="stats-grid" id="statistik">
                <div class="stat-card orange-card">
                    <div class="stat-icon icon-orange"><i data-lucide="calendar-check" style="color:#F97316"></i></div>
                    <div class="stat-num">{{ $statistik['total'] }}</div>
                    <div class="stat-label">Total Booking</div>
                </div>
                <div class="stat-card amber-card">
                    <div class="stat-icon icon-amber"><i data-lucide="hourglass" style="color:#F59E0B"></i></div>
                    <div class="stat-num">{{ $statistik['antre'] }}</div>
                    <div class="stat-label">Menunggu Antrean</div>
                </div>
                <div class="stat-card blue-card">
                    <div class="stat-icon icon-blue"><i data-lucide="zap" style="color:#3B82F6"></i></div>
                    <div class="stat-num">{{ $statistik['proses'] }}</div>
                    <div class="stat-label">Sedang Dikerjakan</div>
                </div>
                <div class="stat-card green-card">
                    <div class="stat-icon icon-green"><i data-lucide="package-check" style="color:#10B981"></i></div>
                    <div class="stat-num">{{ $statistik['selesai'] }}</div>
                    <div class="stat-label">Selesai / Serah Terima</div>
                </div>
            </div>

            {{-- ──────────────────── BOOKING TABLE ──────────────────── --}}
            <div class="section-block" id="booking">
                <div class="section-header">
                    <div class="section-header-left">
                        <div class="section-icon-wrap"><i data-lucide="clipboard-list" style="color:#F97316"></i></div>
                        <div class="section-title">Daftar Booking</div>
                        <span class="section-count">{{ $bookings->count() }}</span>
                    </div>
                    @if(Auth::user()->role === 'admin')
                    <button class="btn-orange" onclick="document.getElementById('modalBooking').classList.add('open')">
                        <i data-lucide="plus" style="width:14px;height:14px"></i> Booking Baru
                    </button>
                    @endif
                </div>

                {{-- Search --}}
                <div class="search-bar">
                    <form method="GET" action="/dashboard" class="search-wrap">
                        <span class="search-icon"><i data-lucide="search" class="ico-sm" style="color:var(--text3)"></i></span>
                        <input
                            type="text"
                            name="cari"
                            class="search-input"
                            placeholder="Cari nama pelanggan atau nomer plat..."
                            value="{{ $cariPlat ?? '' }}"
                            autocomplete="off"
                            id="searchInput"
                        >
                    </form>
                    <button class="btn-search" onclick="document.querySelector('.search-bar form').submit()">Cari</button>
                    @if($cariPlat)
                    <a href="/dashboard" class="btn-reset">× Reset</a>
                    @endif
                </div>

                {{-- Table --}}
                <div class="table-wrap">
                    @if($bookings->isEmpty())
                    <div class="empty-state">
                        <div class="empty-icon"><i data-lucide="inbox"></i></div>
                        <div class="empty-title">
                            @if($cariPlat)
                                Tidak ada hasil untuk "{{ $cariPlat }}"
                            @else
                                Belum ada booking
                            @endif
                        </div>
                        <div class="empty-sub">
                            @if($cariPlat)
                                Coba kata kunci lain atau <a href="/dashboard" style="color:var(--orange);">reset pencarian</a>.
                            @else
                                Klik <strong style="color:var(--orange);">+ Booking Baru</strong> untuk menambah booking pertama.
                            @endif
                        </div>
                    </div>
                    @else
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pelanggan</th>
                                <th>Plat</th>
                                <th>Motor</th>
                                <th>Mekanik</th>
                                <th>Jadwal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $b)
                            <tr>
                                <td style="color:var(--text3); font-size:.75rem; width:40px;">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="primary-text">{{ $b->nama_pelanggan }}</div>
                                </td>
                                <td>
                                    <span class="plat-badge">{{ $b->nomer_plat }}</span>
                                </td>
                                <td>
                                    <div class="primary-text">{{ $b->tipe_motor }}</div>
                                    <div style="font-size: .72rem; color: var(--text3); margin-top: 4px; max-width: 180px; white-space: normal; line-height: 1.3;">
                                        Keluhan: <span style="color:var(--text2)">{{ $b->keluhan ?: '-' }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if(Auth::user()->role === 'admin')
                                        {{-- Admin: dropdown assign mekanik --}}
                                        <form method="POST" action="{{ route('booking.mekanik', $b->id) }}" id="mf-{{ $b->id }}">
                                            @csrf
                                            @if($cariPlat)
                                            <input type="hidden" name="cari" value="{{ $cariPlat }}">
                                            @endif
                                        </form>
                                        <div class="csd-wrap">
                                            <button type="button" class="csd-btn" onclick="toggleCSD('mp-{{ $b->id }}', event)" style="min-width:130px">
                                                <span class="csd-btn-left">
                                                    @if($b->mechanic)
                                                        <i data-lucide="user-round" style="width:13px;height:13px;color:#F97316"></i>
                                                        {{ $b->mechanic->nama_mekanik }}
                                                    @else
                                                        <i data-lucide="user-x" style="width:13px;height:13px;color:#64748B"></i>
                                                        <span style="color:var(--text3)">Belum assigned</span>
                                                    @endif
                                                </span>
                                                <i data-lucide="chevron-down" style="width:12px;height:12px;color:var(--text3)"></i>
                                            </button>
                                            <div class="csd-panel" id="mp-{{ $b->id }}">
                                                {{-- Opsi: tidak ada mekanik --}}
                                                <button type="button" class="csd-opt"
                                                    onclick="assignMekanik('mf-{{ $b->id }}', '')">
                                                    <i data-lucide="user-x" style="width:14px;height:14px;color:#64748B"></i>
                                                    <span style="color:#64748B">— Belum ditentukan</span>
                                                </button>
                                                {{-- Daftar mekanik --}}
                                                @foreach($mechanics as $m)
                                                <button type="button" class="csd-opt"
                                                    onclick="assignMekanik('mf-{{ $b->id }}', {{ $m->id }})"
                                                    style="{{ $b->mechanic_id == $m->id ? 'color:#F97316;background:rgba(249,115,22,.07)' : '' }}">
                                                    <i data-lucide="user-round" style="width:14px;height:14px;color:#F97316"></i>
                                                    {{ $m->nama_mekanik }}
                                                    <span style="font-size:.7rem;color:var(--text3);margin-left:auto">{{ $m->keahlian }}</span>
                                                </button>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        {{-- Kasir: read only --}}
                                        @if($b->mechanic)
                                            <div class="primary-text">{{ $b->mechanic->nama_mekanik }}</div>
                                            <div class="sub-text">{{ $b->mechanic->keahlian }}</div>
                                        @else
                                            <span style="color:var(--text3);font-size:.78rem">— Belum ditentukan</span>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <div class="primary-text">{{ \Carbon\Carbon::parse($b->tanggal_booking)->format('d M Y') }}</div>
                                    <div class="sub-text">{{ $b->jam_booking }}</div>
                                </td>
                                <td>
                                    @if($b->status_servis === 'Menunggu Antrean')
                                        <span class="badge badge-amber">
                                            <span class="badge-dot-sm"></span>Menunggu
                                        </span>
                                    @elseif($b->status_servis === 'Sedang Dikerjakan')
                                        <span class="badge badge-blue">
                                            <span class="badge-dot-sm"></span>Dikerjakan
                                        </span>
                                    @else
                                        <span class="badge badge-green">
                                            <span class="badge-dot-sm"></span>Selesai
                                        </span>
                                    @endif
                                    {{-- Badge pembayaran --}}
                                    @if($b->status_servis === 'Selesai')
                                        @if($b->status_pembayaran === 'Lunas')
                                            <span class="badge" style="background:rgba(16,185,129,.12);color:#10B981;border:1px solid rgba(16,185,129,.3);margin-top:4px;display:flex;flex-direction:column;align-items:flex-start;gap:2px;width:fit-content">
                                                <span><i data-lucide="badge-check" style="width:10px;height:10px"></i>&nbsp;Lunas</span>
                                                <span style="font-size:.7rem;font-weight:700;">Rp {{ number_format($b->total_harga, 0, ',', '.') }}</span>
                                            </span>
                                        @else
                                            <span class="badge" style="background:rgba(239,68,68,.1);color:#F87171;border:1px solid rgba(239,68,68,.25);margin-top:4px;display:flex;width:fit-content">
                                                <i data-lucide="circle-alert" style="width:10px;height:10px"></i>&nbsp;Belum Bayar
                                            </span>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <div class="actions">
                                        {{-- Update Status: Custom Dropdown --}}
                                        <form method="POST" action="{{ route('booking.status', $b->id) }}" id="sf-{{ $b->id }}">
                                            @csrf
                                            @if($cariPlat)
                                            <input type="hidden" name="cari" value="{{ $cariPlat }}">
                                            @endif
                                            <input type="hidden" name="status" id="sv-{{ $b->id }}" value="{{ $b->status_servis }}">
                                        </form>
                                        <div class="csd-wrap">
                                            <button type="button" class="csd-btn" onclick="toggleCSD('cp-{{ $b->id }}', event)">
                                                <span class="csd-btn-left">
                                                    @if($b->status_servis === 'Menunggu Antrean')
                                                        <i data-lucide="clock" style="width:13px;height:13px;color:#F59E0B"></i> Antrean
                                                    @elseif($b->status_servis === 'Sedang Dikerjakan')
                                                        <i data-lucide="wrench" style="width:13px;height:13px;color:#3B82F6"></i> Dikerjakan
                                                    @else
                                                        <i data-lucide="check-circle" style="width:13px;height:13px;color:#10B981"></i> Selesai
                                                    @endif
                                                </span>
                                                <i data-lucide="chevron-down" style="width:12px;height:12px;color:var(--text3)"></i>
                                            </button>
                                            <div class="csd-panel" id="cp-{{ $b->id }}">
                                                <button type="button" class="csd-opt" onclick="pilihStatus('sf-{{ $b->id }}','sv-{{ $b->id }}','Menunggu Antrean',' Antrean','clock','#F59E0B','cp-{{ $b->id }}')"><i data-lucide="clock" style="width:14px;height:14px;color:#F59E0B"></i> Antrean</button>
                                                <button type="button" class="csd-opt" onclick="pilihStatus('sf-{{ $b->id }}','sv-{{ $b->id }}','Sedang Dikerjakan',' Dikerjakan','wrench','#3B82F6','cp-{{ $b->id }}')"><i data-lucide="wrench" style="width:14px;height:14px;color:#3B82F6"></i> Dikerjakan</button>
                                                <button type="button" class="csd-opt" onclick="pilihStatus('sf-{{ $b->id }}','sv-{{ $b->id }}','Selesai',' Selesai','check-circle','#10B981','cp-{{ $b->id }}')"><i data-lucide="check-circle" style="width:14px;height:14px;color:#10B981"></i> Selesai</button>
                                            </div>
                                        </div>
                                        {{-- Cetak PDF (hanya aktif jika Lunas) --}}
                                        @if($b->status_pembayaran === 'Lunas')
                                            <a href="/test-cetak/{{ $b->id }}" target="_blank"
                                               class="btn-icon btn-pdf"
                                               title="Cetak Nota PDF">
                                                <i data-lucide="file-text" style="color:#93C5FD"></i>
                                            </a>
                                        @else
                                            <span class="btn-icon btn-pdf"
                                                  style="opacity:.25;cursor:not-allowed;pointer-events:none;"
                                                  title="{{ $b->status_servis === 'Selesai' ? 'Konfirmasi bayar dulu sebelum cetak nota' : 'Motor belum selesai dikerjakan' }}">
                                                <i data-lucide="file-x" style="color:#94A3B8"></i>
                                            </span>
                                        @endif
                                        {{-- Konfirmasi Bayar (tampil jika Selesai & Belum Bayar) --}}
                                        @if($b->status_servis === 'Selesai' && $b->status_pembayaran !== 'Lunas')
                                        <form method="POST" action="{{ route('booking.bayar', $b->id) }}" id="bf-{{ $b->id }}" style="display:none">
                                            @csrf
                                            <input type="hidden" name="total_harga" id="total-harga-bf-{{ $b->id }}" value="0">
                                        </form>
                                        <button type="button" class="btn-bayar"
                                            title="Konfirmasi Pembayaran Lunas"
                                            onclick="konfirmasiBayar({{ $b->id }}, '{{ addslashes($b->nama_pelanggan) }}')">
                                            <i data-lucide="banknote" style="width:13px;height:13px"></i>
                                            Bayar
                                        </button>
                                        @endif
                                        {{-- Hapus: hanya admin --}}
                                        @if(Auth::user()->role === 'admin')
                                        <form method="POST" action="{{ route('booking.hapus', $b->id) }}" id="hf-{{ $b->id }}" style="display:inline">
                                            @csrf
                                            <button
                                                type="button"
                                                class="btn-icon btn-del"
                                                title="Hapus Booking"
                                                onclick="konfirmasiHapus({{ $b->id }}, '{{ addslashes($b->nama_pelanggan) }}')"
                                            ><i data-lucide="trash-2" style="color:#F87171"></i></button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

            {{-- ──────────────────── MEKANIK SECTION (Admin Only) ──────────────────── --}}
            @if(Auth::user()->role === 'admin')
            <div class="section-block" id="mekanik">
                <div class="section-header">
                    <div class="section-header-left">
                        <div class="section-icon-wrap"><i data-lucide="users" style="color:#F97316"></i></div>
                        <div class="section-title">Data Mekanik</div>
                        <span class="section-count">{{ $mechanics->count() }}</span>
                    </div>
                    <button class="btn-orange" id="toggleMekForm" onclick="toggleMekanikForm()">
                        + Tambah Mekanik
                    </button>
                </div>

                {{-- Add Mechanic Form (collapsible) --}}
                <div class="add-mek-form" id="mekForm">
                    <form method="POST" action="{{ route('mekanik.simpan') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="nama_mekanik">Nama Mekanik *</label>
                                <input type="text" id="nama_mekanik" name="nama_mekanik"
                                    class="form-input {{ $errors->has('nama_mekanik') ? 'error' : '' }}"
                                    placeholder="cth. Budi Santoso" value="{{ old('nama_mekanik') }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="keahlian">Keahlian *</label>
                                <input type="text" id="keahlian" name="keahlian"
                                    class="form-input {{ $errors->has('keahlian') ? 'error' : '' }}"
                                    placeholder="cth. Spesialis Mesin 4-tak" value="{{ old('keahlian') }}" autocomplete="off">
                            </div>
                            <div class="form-group" style="justify-content:flex-end;">
                                <button type="submit" class="btn-orange" style="height:fit-content; padding:.65rem 1.2rem; display:inline-flex; align-items:center; gap:.4rem">
                                    <i data-lucide="save" class="ico"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Mechanic Cards --}}
                @if($mechanics->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon"><i data-lucide="user-x"></i></div>
                    <div class="empty-title">Belum ada mekanik terdaftar</div>
                    <div class="empty-sub">Tambah mekanik pertama menggunakan form di atas.</div>
                </div>
                @else
                <div class="mek-grid">
                    @foreach($mechanics as $m)
                    <div class="mek-card" style="position:relative;">
                        <div style="position:absolute; top:12px; right:12px; display:flex; gap:8px; z-index:10;">
                            <button class="action-btn" title="Edit" onclick="editMekanik({{ $m->id }}, '{{ addslashes($m->nama_mekanik) }}', '{{ addslashes($m->keahlian) }}')" style="background:none; border:none; color:#64748B; cursor:pointer; padding:4px;">
                                <i data-lucide="pencil" style="width:16px; height:16px;"></i>
                            </button>
                            <button class="action-btn" title="Hapus" onclick="konfirmasiHapus('mek-{{ $m->id }}', '{{ addslashes($m->nama_mekanik) }}')" style="background:none; border:none; color:#EF4444; cursor:pointer; padding:4px;">
                                <i data-lucide="trash-2" style="width:16px; height:16px;"></i>
                            </button>
                        </div>
                        
                        <form method="POST" action="{{ route('mekanik.hapus', $m->id) }}" id="hf-mek-{{ $m->id }}" style="display:none;">
                            @csrf
                        </form>

                        <div class="mek-avatar"><i data-lucide="user-round" style="color:#F97316"></i></div>
                        <div class="mek-name">{{ $m->nama_mekanik }}</div>
                        <div class="mek-skill">{{ $m->keahlian }}</div>
                        <div class="mek-booking-count">
                            <i data-lucide="clipboard" class="ico-sm"></i> <strong>{{ $m->bookings->count() }}</strong> booking ditangani
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            @else
            {{-- ──────────────────── KASIR INFO SECTION ──────────────────── --}}
            <div class="section-block" id="kasir-info">
                <div class="section-header">
                    <div class="section-header-left">
                        <div class="section-icon-wrap"><i data-lucide="banknote" style="color:#F97316"></i></div>
                        <div class="section-title">Ringkasan Pembayaran</div>
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1.25rem;padding:1.5rem 0 1rem">
                    <div style="background:rgba(16,185,129,.07);border:1px solid rgba(16,185,129,.2);border-radius:16px;padding:1.5rem;">
                        <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1rem">
                            <div style="width:42px;height:42px;background:rgba(16,185,129,.15);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <i data-lucide="package-check" style="width:20px;height:20px;color:#10B981"></i>
                            </div>
                            <div style="font-size:.8rem;color:#94A3B8;font-weight:600;line-height:1.3">Siap Diambil<br>/ Bayar</div>
                        </div>
                        <div style="font-size:2.5rem;font-weight:800;color:#10B981;line-height:1;margin-bottom:.4rem">{{ $statistik['selesai'] }}</div>
                        <div style="font-size:.72rem;color:#64748B">booking sudah selesai dikerjakan</div>
                    </div>
                    <div style="background:rgba(245,158,11,.07);border:1px solid rgba(245,158,11,.2);border-radius:16px;padding:1.5rem;">
                        <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1rem">
                            <div style="width:42px;height:42px;background:rgba(245,158,11,.15);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <i data-lucide="hourglass" style="width:20px;height:20px;color:#F59E0B"></i>
                            </div>
                            <div style="font-size:.8rem;color:#94A3B8;font-weight:600;line-height:1.3">Masih<br>Diproses</div>
                        </div>
                        <div style="font-size:2.5rem;font-weight:800;color:#F59E0B;line-height:1;margin-bottom:.4rem">{{ $statistik['antre'] + $statistik['proses'] }}</div>
                        <div style="font-size:.72rem;color:#64748B">sedang antre + dikerjakan mekanik</div>
                    </div>
                    <div style="background:rgba(249,115,22,.07);border:1px solid rgba(249,115,22,.2);border-radius:16px;padding:1.5rem;">
                        <div style="display:flex;align-items:center;gap:.75rem;margin-bottom:1rem">
                            <div style="width:42px;height:42px;background:rgba(249,115,22,.15);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <i data-lucide="calendar-check" style="width:20px;height:20px;color:#F97316"></i>
                            </div>
                            <div style="font-size:.8rem;color:#94A3B8;font-weight:600;line-height:1.3">Total<br>Booking</div>
                        </div>
                        <div style="font-size:2.5rem;font-weight:800;color:#F97316;line-height:1;margin-bottom:.4rem">{{ $statistik['total'] }}</div>
                        <div style="font-size:.72rem;color:#64748B">keseluruhan booking masuk</div>
                    </div>
                </div>
                <div style="padding:.9rem 1.1rem;background:rgba(249,115,22,.05);border:1px solid rgba(249,115,22,.12);border-radius:12px;font-size:.8rem;color:#94A3B8;display:flex;align-items:flex-start;gap:.6rem;line-height:1.6">
                    <i data-lucide="info" style="width:15px;height:15px;color:var(--orange);flex-shrink:0;margin-top:2px"></i>
                    <span>Sebagai <strong style="color:var(--text2)">Kasir</strong>, tugas kamu adalah mengkonfirmasi pembayaran saat pelanggan datang mengambil motor — ubah status menjadi <strong style="color:#10B981">Selesai</strong>, lalu cetak nota via ikon <strong style="color:#93C5FD">PDF</strong> di kolom Aksi sebagai bukti pembayaran.</span>
                </div>
            </div>
            @endif

        </div>{{-- /content --}}
    </main>

    {{-- ═══════════════ ADD BOOKING MODAL ═══════════════ --}}
    <div class="modal-overlay" id="modalBooking" onclick="closeModalOnOverlay(event)">
        <div class="modal">
            <div class="modal-head">
                <div class="modal-title"><i data-lucide="calendar-plus" class="ico-md" style="color:var(--orange)"></i> Tambah Booking Baru</div>
                <button class="modal-close" onclick="document.getElementById('modalBooking').classList.remove('open')"><i data-lucide="x" class="ico-sm"></i></button>
            </div>
            <form method="POST" action="{{ route('booking.simpan') }}">
                @csrf
                <div class="modal-body">
                    <div class="modal-grid">
                        <div class="form-group full-col">
                            <label class="form-label" for="m_nama">Nama Pelanggan *</label>
                            <input
                                type="text"
                                id="m_nama"
                                name="nama_pelanggan"
                                class="form-input {{ $errors->has('nama_pelanggan') ? 'error' : '' }}"
                                placeholder="Nama lengkap pelanggan"
                                value="{{ old('nama_pelanggan') }}"
                                autocomplete="off"
                            >
                            @error('nama_pelanggan')
                            <div class="form-error-msg"><i data-lucide="alert-circle" style="width:11px;height:11px;display:inline;vertical-align:middle;margin-right:2px"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="m_plat">Nomer Plat *</label>
                            <input
                                type="text"
                                id="m_plat"
                                name="nomer_plat"
                                class="form-input {{ $errors->has('nomer_plat') ? 'error' : '' }}"
                                placeholder="cth. B 1234 XYZ"
                                value="{{ old('nomer_plat') }}"
                                autocomplete="off"
                                style="text-transform:uppercase"
                                oninput="this.value=this.value.toUpperCase()"
                            >
                            @error('nomer_plat')
                            <div class="form-error-msg"><i data-lucide="alert-circle" style="width:11px;height:11px;display:inline;vertical-align:middle;margin-right:2px"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="m_motor">Tipe Motor *</label>
                            <input
                                type="text"
                                id="m_motor"
                                name="tipe_motor"
                                class="form-input {{ $errors->has('tipe_motor') ? 'error' : '' }}"
                                placeholder="cth. Honda Vario 150"
                                value="{{ old('tipe_motor') }}"
                                autocomplete="off"
                            >
                            @error('tipe_motor')
                            <div class="form-error-msg"><i data-lucide="alert-circle" style="width:11px;height:11px;display:inline;vertical-align:middle;margin-right:2px"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="m_tanggal">Tanggal Booking *</label>
                            <input
                                type="date"
                                id="m_tanggal"
                                name="tanggal_booking"
                                class="form-input {{ $errors->has('tanggal_booking') ? 'error' : '' }}"
                                value="{{ old('tanggal_booking', date('Y-m-d')) }}"
                                min="{{ date('Y-m-d') }}"
                            >
                            @error('tanggal_booking')
                            <div class="form-error-msg"><i data-lucide="alert-circle" style="width:11px;height:11px;display:inline;vertical-align:middle;margin-right:2px"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="m_jam">Jam Booking *</label>
                            <input
                                type="time"
                                id="m_jam"
                                name="jam_booking"
                                class="form-input {{ $errors->has('jam_booking') ? 'error' : '' }}"
                                value="{{ old('jam_booking', '08:00') }}"
                            >
                            @error('jam_booking')
                            <div class="form-error-msg"><i data-lucide="alert-circle" style="width:11px;height:11px;display:inline;vertical-align:middle;margin-right:2px"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group full-col">
                            <label class="form-label" for="m_mekanik">Pilih Mekanik <span style="color:var(--text3)">(Opsional)</span></label>
                            <select id="m_mekanik" name="mechanic_id" class="form-select">
                                <option value="">— Belum ditentukan —</option>
                                @foreach($mechanics as $m)
                                <option value="{{ $m->id }}" {{ old('mechanic_id') == $m->id ? 'selected' : '' }}>
                                    {{ $m->nama_mekanik }} — {{ $m->keahlian }}
                                </option>
                                @endforeach
                            </select>
                            @if($mechanics->isEmpty())
                            <div style="font-size:.72rem; color:var(--text3); margin-top:.25rem;">
                                Belum ada mekanik. Tambah dulu di seksi Mekanik.
                            </div>
                            @endif
                        </div>
                        <div class="form-group full-col">
                            <label class="form-label" for="m_keluhan">Keluhan / Catatan <span style="color:var(--text3)">(Opsional)</span></label>
                            <textarea id="m_keluhan" name="keluhan" class="form-input" placeholder="cth. Servis rutin, ganti oli, ban bocor..." style="min-height: 80px; resize: vertical; font-family: inherit;">{{ old('keluhan') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-foot">
                    <button type="button" class="btn-outline" onclick="document.getElementById('modalBooking').classList.remove('open')">Batal</button>
                    <button type="submit" class="btn-orange"><i data-lucide="save" style="width:14px;height:14px"></i> Simpan Booking</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Custom Payment Confirm Modal -->
    <div id="pmodalOverlay" class="pmodal-overlay" onclick="pmodalClose(event)">
        <div class="pmodal" role="dialog" aria-modal="true">
            <div class="pmodal-icon">
                <i data-lucide="banknote" style="width:24px;height:24px;color:#10B981"></i>
            </div>
            <div class="pmodal-title">Konfirmasi Pembayaran</div>
            <div class="pmodal-sub">Tandai pembayaran dari:</div>
            <div class="pmodal-name" id="pmodalNama">—</div>
            <div class="pmodal-info">
                <i data-lucide="info" style="width:13px;height:13px;flex-shrink:0;color:#F97316"></i>
                Setelah dikonfirmasi, nota PDF bisa langsung dicetak.
            </div>
            <div style="margin: 1.25rem 0; text-align: left; width: 100%;">
                <label style="margin-bottom: 0.5rem; display: block; font-size: 0.78rem; font-weight: 600; color: var(--text2); text-transform: uppercase; letter-spacing: .03em;">Total Biaya Servis &amp; Part (Rp)</label>
                <input type="number" id="pmodalHarga" placeholder="Masukkan total biaya (contoh: 150000)" style="width: 100%; background: var(--bg2); border: 1px solid var(--border); border-radius: 11px; padding: .75rem; color: var(--text); font-size: .875rem; outline: none;" min="0">
            </div>
            <div class="pmodal-actions">
                <button class="pmodal-btn-cancel" onclick="pmodalCancel()">Batal</button>
                <button class="pmodal-btn-lunas" id="pmodalConfirmBtn">
                    <i data-lucide="badge-check" style="width:14px;height:14px"></i>
                    Ya, Sudah Lunas
                </button>
            </div>
        </div>
    </div>

    <!-- Custom Confirm Modal (hapus booking) -->
    <div id="cmodalOverlay" class="cmodal-overlay" onclick="cmodalClose(event)">
        <div class="cmodal" role="dialog" aria-modal="true">
            <div class="cmodal-icon">
                <i data-lucide="trash-2" style="width:24px;height:24px;color:#EF4444"></i>
            </div>
            <div class="cmodal-title">Hapus Booking?</div>
            <div class="cmodal-sub">Kamu akan menghapus booking atas nama:</div>
            <div class="cmodal-name" id="cmodalNama">—</div>
            <div class="cmodal-warn">
                <i data-lucide="alert-triangle" style="width:13px;height:13px;flex-shrink:0"></i>
                Data yang sudah dihapus tidak bisa dikembalikan.
            </div>
            <div class="cmodal-actions">
                <button class="cmodal-btn-cancel" onclick="cmodalCancel()">Batal</button>
                <button class="cmodal-btn-hapus" id="cmodalConfirmBtn">
                    <i data-lucide="trash-2" style="width:14px;height:14px"></i>
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        // ── Modal ──
        function closeModalOnOverlay(e) {
            if (e.target.id === 'modalBooking') {
                e.target.classList.remove('open');
            }
        }

        // ── Sidebar Mobile ──
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('overlay').classList.toggle('open');
        }
        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('overlay').classList.remove('open');
        }

        // ── Active nav link ──
        function setActive(el) {
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            el.classList.add('active');
        }

        // ── Assign Mekanik ──
        function assignMekanik(formId, mekanikId) {
            const form = document.getElementById(formId);
            let input = form.querySelector('input[name="mechanic_id"]');
            if (!input) {
                input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'mechanic_id';
                form.appendChild(input);
            }
            input.value = mekanikId;
            form.submit();
        }

        // ── Payment Confirm Modal ──
        let _bayarFormId = null;

        function konfirmasiBayar(id, nama) {
            _bayarFormId = 'bf-' + id;
            document.getElementById('pmodalNama').textContent = nama;
            document.getElementById('pmodalHarga').value = '';
            const overlay = document.getElementById('pmodalOverlay');
            overlay.classList.add('open');
            document.getElementById('pmodalConfirmBtn').onclick = function() {
                const harga = document.getElementById('pmodalHarga').value || 0;
                document.getElementById('total-harga-' + _bayarFormId).value = harga;
                document.getElementById(_bayarFormId).submit();
            };
            lucide.createIcons();
        }
        function pmodalCancel() {
            document.getElementById('pmodalOverlay').classList.remove('open');
            _bayarFormId = null;
        }
        function pmodalClose(e) {
            if (e.target.id === 'pmodalOverlay') pmodalCancel();
        }

        // ── Custom Confirm Modal (hapus) ──
        let _hapusFormId = null;

        function konfirmasiHapus(id, nama) {
            _hapusFormId = 'hf-' + id;
            document.getElementById('cmodalNama').textContent = nama;
            const overlay = document.getElementById('cmodalOverlay');
            overlay.classList.add('open');
            document.getElementById('cmodalConfirmBtn').onclick = function() {
                document.getElementById(_hapusFormId).submit();
            };
            lucide.createIcons();
        }
        function cmodalCancel() {
            document.getElementById('cmodalOverlay').classList.remove('open');
            _hapusFormId = null;
        }
        function cmodalClose(e) {
            if (e.target.id === 'cmodalOverlay') cmodalCancel();
        }

        // ── Mekanik form toggle ──
        function toggleMekanikForm() {
            const form = document.getElementById('mekForm');
            const btn  = document.getElementById('toggleMekForm');
            const formEl = form.querySelector('form');
            if (form.classList.contains('open')) {
                form.classList.remove('open');
                btn.textContent = '+ Tambah Mekanik';
                // Reset form action and values
                formEl.action = "{{ route('mekanik.simpan') }}";
                document.getElementById('nama_mekanik').value = '';
                document.getElementById('keahlian').value = '';
            } else {
                form.classList.add('open');
                btn.textContent = '✕ Tutup Form';
                document.getElementById('nama_mekanik').focus();
            }
        }

        function editMekanik(id, nama, keahlian) {
            const form = document.getElementById('mekForm');
            const btn  = document.getElementById('toggleMekForm');
            const formEl = form.querySelector('form');
            
            // Set action to update
            formEl.action = `/mekanik/${id}/update`;
            
            // Populate values
            document.getElementById('nama_mekanik').value = nama;
            document.getElementById('keahlian').value = keahlian;
            
            // Open form if not open
            if (!form.classList.contains('open')) {
                form.classList.add('open');
            }
            btn.textContent = '✕ Batal Edit';
            document.getElementById('nama_mekanik').focus();
            
            // Scroll to form smoothly
            document.getElementById('mekanik').scrollIntoView({ behavior: 'smooth' });
        }

        // ── Auto-open modal if there are validation errors ──
        @if($errors->has('nama_pelanggan') || $errors->has('nomer_plat') || $errors->has('tipe_motor') || $errors->has('tanggal_booking') || $errors->has('jam_booking'))
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('modalBooking').classList.add('open');
        });
        @endif

        // ── Auto-open mekanik form if mekanik errors ──
        @if($errors->has('nama_mekanik') || $errors->has('keahlian'))
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('mekForm').classList.add('open');
        });
        @endif

        // ── Smooth scroll for sidebar links ──
        document.querySelectorAll('.nav-link[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('href').slice(1);
                const el = document.getElementById(id);
                if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                if (window.innerWidth < 900) closeSidebar();
            });
        });

        // ── Auto-dismiss flash message ──
        setTimeout(() => {
            const flash = document.querySelector('.flash-success');
            if (flash) {
                flash.style.transition = 'opacity .5s';
                flash.style.opacity = '0';
                setTimeout(() => flash.remove(), 500);
            }
        }, 4000);

        // ── Custom Status Dropdown ──
        function toggleCSD(panelId, e) {
            e.stopPropagation();
            const panel = document.getElementById(panelId);
            const isOpen = panel.classList.contains('open');
            // Close all open panels first
            document.querySelectorAll('.csd-panel.open').forEach(p => p.classList.remove('open'));
            if (!isOpen) panel.classList.add('open');
        }

        function pilihStatus(formId, inputId, value, label, icon, color, panelId) {
            document.getElementById(inputId).value = value;
            document.getElementById(panelId).classList.remove('open');
            // Update button display
            const btn = document.querySelector(`#${panelId}`).previousElementSibling.querySelector('.csd-btn-left');
            btn.innerHTML = `<i data-lucide="${icon}" style="width:13px;height:13px;color:${color}"></i>${label}`;
            lucide.createIcons();
            // Submit the form
            document.getElementById(formId).submit();
        }

        // Close dropdown on outside click
        document.addEventListener('click', () => {
            document.querySelectorAll('.csd-panel.open').forEach(p => p.classList.remove('open'));
        });
    </script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
