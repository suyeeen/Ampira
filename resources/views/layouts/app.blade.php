<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Ampira')</title>
    @include('partials.tokens')
    <style>
        .container {
            max-width: 1360px;
            margin: 0 auto;
            padding: 0 48px;
        }

        /* ---------- HEADER ---------- */
        .app-header {
            background: var(--surface);
            border-bottom: 1px solid var(--line);
        }

        .app-header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-top: 16px;
            padding-bottom: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--ink);
            flex: none;
        }

        .brand-mark {
            width: 36px;
            height: 36px;
            border-radius: 11px;
            background: var(--lime);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
        }

        .app-nav {
            display: flex;
            gap: 4px;
            background: var(--chip);
            border-radius: var(--radius-pill);
            padding: 5px;
        }

        .nav-link {
            padding: 8px 16px;
            border-radius: var(--radius-pill);
            text-decoration: none;
            color: var(--muted);
            font-weight: 600;
            font-size: 15px;
            white-space: nowrap;
        }

        .nav-link.active {
            background: var(--deep);
            color: #fff;
        }

        .app-account {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: none;
        }

        .icon-btn {
            width: 40px;
            height: 40px;
            border-radius: 999px;
            background: var(--chip);
            border: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .app-avatar {
            width: 36px;
            height: 36px;
            border-radius: 999px;
            background: var(--brand-soft);
            color: var(--brand);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex: none;
        }

        .app-account span.name {
            font-size: 14px;
            font-weight: 600;
        }

        /* ---------- MAIN ---------- */
        main {
            max-width: {{ $maxWidth ?? '1360px' }};
            margin: 0 auto;
            padding: 36px 48px 56px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .page-head {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
        }

        .page-head h1 {
            margin: 0 0 6px;
            font-size: 30px;
            font-weight: 800;
        }

        .page-head p {
            margin: 0;
            font-size: 15px;
            color: var(--muted);
        }

        /* ---------- STEPPER ---------- */
        .stepper {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .stepper .langkah {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stepper .bulat {
            width: 32px;
            height: 32px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            border: 1px solid var(--line);
            background: var(--surface);
            color: var(--muted);
            flex: none;
        }

        .stepper .langkah.selesai .bulat {
            background: var(--brand);
            border-color: var(--brand);
            color: #fff;
        }

        .stepper .langkah.sekarang .bulat {
            background: var(--deep);
            border-color: var(--deep);
            color: var(--lime);
        }

        .stepper .langkah span.label {
            font-size: 15px;
            color: var(--muted);
            font-weight: 500;
        }

        .stepper .langkah.sekarang span.label {
            color: var(--ink);
            font-weight: 700;
        }

        .stepper .garis {
            width: 56px;
            height: 2px;
            background: var(--line);
        }

        .stepper .garis.selesai {
            background: var(--brand);
        }

        /* ---------- CARD ---------- */
        .kartu {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: var(--radius-card);
            padding: 28px;
        }

        .kv-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            width: 100%;
        }

        .kv-row span.k {
            font-size: 14px;
            color: var(--muted);
        }

        .kv-row span.v {
            font-size: 14px;
            font-weight: 600;
        }

        @media (max-width: 900px) {

            .container,
            main {
                padding-left: 20px;
                padding-right: 20px;
            }

            .app-header .container {
                flex-wrap: wrap;
            }

            .app-nav {
                order: 3;
                width: 100%;
                overflow-x: auto;
            }

            .page-head {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
    @yield('head')
</head>

<body>
    <header class="app-header">
        <div class="container">
            <a href="{{ route('beranda') }}" class="brand">
                <span class="brand-mark" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#051C12" stroke-width="2"
                        stroke-linecap="round">
                        <path d="M4 12h1M8 8v8M12 5v14M16 8v8M20 12h0" />
                    </svg>
                </span>
                <span class="brand-name">Ampira</span>
            </a>
            <nav aria-label="Menu akun" class="app-nav">
                <a href="{{ route('beranda') }}"
                    class="nav-link {{ ($activeNav ?? '') === 'beranda' ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('skrining.profil') }}"
                    class="nav-link {{ ($activeNav ?? '') === 'skrining' ? 'active' : '' }}">Skrining</a>
                <a href="{{ route('riwayat') }}"
                    class="nav-link {{ ($activeNav ?? '') === 'riwayat' ? 'active' : '' }}">Riwayat</a>
                <a href="{{ route('chat') }}"
                    class="nav-link {{ ($activeNav ?? '') === 'chat' ? 'active' : '' }}">Chat psikolog</a>
            </nav>
            <div class="app-account">
                <button type="button" class="icon-btn" aria-label="Notifikasi">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0B130F" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9M13.7 21a2 2 0 0 1-3.4 0" />
                    </svg>
                </button>
                <span class="app-avatar" aria-hidden="true">A</span>
                <span class="name">Orang tua A</span>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
