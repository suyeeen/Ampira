<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Ampira')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;1,6..72,400&family=Public+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #2F6F63;
            --primary-dark: #1F4E45;
            --primary-soft: #E8F0ED;
            --ink: #16211D;
            --ink-soft: #3D4A45;
            --ink-muted: #66736E;
            --ink-faint: #8B9793;
            --ink-faintest: #9AA5A1;
            --line: rgba(22, 33, 29, .12);
            --line-soft: rgba(22, 33, 29, .08);
            --bg: #FBFCFB;
            --white: #FFFFFF;
            --risk-low: #2F6F63;
            --risk-mid: #9A6B1C;
            --risk-high: #A3483C;
            --risk-low-bg: #E8F0ED;
            --risk-mid-bg: #F6EEDD;
            --risk-high-bg: #F6E7E4;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: var(--bg);
            color: var(--ink);
            font-family: 'Public Sans', system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
        }

        /* ---------- APP SHELL ---------- */
        .app-shell {
            min-height: 100vh;
            display: flex;
        }

        .app-sidebar {
            width: 212px;
            flex-shrink: 0;
            background: #fff;
            border-right: 1px solid var(--line-soft);
            padding: 22px 16px;
            display: flex;
            flex-direction: column;
            gap: 26px;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 0 6px;
        }

        .sidebar-brand .brand-mark {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font: 600 13px 'Newsreader', serif;
            flex-shrink: 0;
        }

        .sidebar-brand span:last-child {
            font: 600 14px 'Public Sans', sans-serif;
            color: var(--ink);
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .sidebar-nav a {
            padding: 9px 12px;
            border-radius: 7px;
            font: 500 13px 'Public Sans', sans-serif;
            color: var(--ink-muted);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-nav a.active {
            background: var(--primary-soft);
            font-weight: 600;
            color: var(--primary);
        }

        .sidebar-nav a:hover:not(.active) {
            background: #F4F6F5;
        }

        .sidebar-nav .badge {
            min-width: 17px;
            height: 17px;
            padding: 0 5px;
            border-radius: 9px;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font: 600 10px 'Public Sans', sans-serif;
        }

        .sidebar-help {
            margin-top: auto;
            padding: 13px;
            background: #F4F6F5;
            border-radius: 8px;
            font: 11.5px/1.55 'Public Sans', sans-serif;
            color: var(--ink-muted);
        }

        .sidebar-help a {
            text-decoration: none;
            font-weight: 600;
            color: var(--ink-muted);
        }

        .app-main {
            flex: 1;
            min-width: 0;
        }

        /* ---------- STEPPER (dipakai di skrining) ---------- */
        .stepper {
            display: flex;
            align-items: center;
            margin-bottom: 32px;
        }

        .stepper-step {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .stepper-step span:first-child {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font: 600 11.5px 'Public Sans', sans-serif;
            border: 1px solid var(--line);
            color: var(--ink-faintest);
        }

        .stepper-step span:last-child {
            font: 500 12.5px 'Public Sans', sans-serif;
            color: var(--ink-faintest);
        }

        .stepper-step.done span:first-child,
        .stepper-step.current span:first-child {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        .stepper-step.current span:last-child {
            font-weight: 600;
            color: var(--ink);
        }

        .stepper-line {
            width: 56px;
            height: 1px;
            background: var(--line);
            margin: 0 14px;
        }

        @media (max-width: 880px) {
            .app-shell {
                flex-direction: column;
            }

            .app-sidebar {
                width: 100%;
                flex-direction: row;
                align-items: center;
                gap: 16px;
                padding: 14px 18px;
                overflow-x: auto;
            }

            .sidebar-nav {
                flex-direction: row;
            }

            .sidebar-help {
                display: none;
            }
        }
    </style>
    @yield('head')
</head>

<body>
    <div class="app-shell">
        <aside class="app-sidebar">
            <div class="sidebar-brand"><span class="brand-mark" aria-hidden="true">A</span><span>Ampira</span></div>
            <nav class="sidebar-nav">
                <a href="{{ route('skrining.profil') }}"
                    class="{{ ($activeNav ?? '') === 'skrining' ? 'active' : '' }}">Skrining baru</a>
                <a href="{{ route('riwayat') }}" class="{{ ($activeNav ?? '') === 'riwayat' ? 'active' : '' }}">Riwayat</a>
                <a href="#" class="{{ ($activeNav ?? '') === 'chat' ? 'active' : '' }}">Chat psikolog<span
                        class="badge">2</span></a>
                <a href="#" class="{{ ($activeNav ?? '') === 'pengaturan' ? 'active' : '' }}">Pengaturan</a>
            </nav>
            <div class="sidebar-help">Butuh bantuan mengisi?<br><a href="#">Hubungi klinik</a></div>
        </aside>
        <main class="app-main">
            @yield('content')
        </main>
    </div>
</body>

</html>
