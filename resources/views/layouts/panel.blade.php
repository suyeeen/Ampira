@php
    $isPakar = ($peran ?? 'pakar') === 'pakar';
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Ampira — Panel')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --brand: #0E6E66;
            --accent: {{ $isPakar ? '#1D4ED8' : '#6D28D9' }};
            --accent-dark: {{ $isPakar ? '#1E3A8A' : '#4C1D95' }};
            --ink: #16212B;
            --ink-muted: #4B5A66;
            --line: #D9E1E6;
            --line-soft: #E6ECEF;
            --input-border: #C5D1D8;
            --bg: #F6F8F9;
            --white: #FFFFFF;
            --warn-bg: #FFF4E0;
            --warn-text: #5C3200;
            --sidebar-bg: {{ $isPakar ? '#FFFFFF' : '#16212B' }};
            --sidebar-text: {{ $isPakar ? '#16212B' : '#FFFFFF' }};
            --sidebar-muted: {{ $isPakar ? '#3A4853' : '#C9D2D9' }};
            --sidebar-active-bg: {{ $isPakar ? '#E8EEFB' : '#2E3A46' }};
            --sidebar-label: {{ $isPakar ? '#1D4ED8' : '#C4B5FD' }};
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--ink);
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            min-height: 100vh;
        }

        a {
            color: inherit;
        }

        button,
        select {
            font: inherit;
            cursor: pointer;
        }

        .panel-shell {
            display: flex;
            flex-wrap: wrap;
            min-height: 100vh;
        }

        .panel-sidebar {
            flex: 1 1 240px;
            max-width: 100%;
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            padding: 20px 16px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 20px;
            @if ($isPakar)
                border-right: 1px solid var(--line);
            @endif
        }

        .panel-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--sidebar-text);
            padding: 0 8px;
        }

        .panel-brand .mark {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--brand);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .panel-brand .names {
            display: flex;
            flex-direction: column;
        }

        .panel-brand .names span:first-child {
            font-size: 18px;
            font-weight: 800;
        }

        .panel-brand .names span:last-child {
            font-size: 12px;
            font-weight: 600;
            color: var(--sidebar-label);
        }

        .panel-nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .panel-nav a {
            padding: 11px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--sidebar-muted);
            font-weight: 500;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .panel-nav a.active {
            background: var(--sidebar-active-bg);
            color: {{ $isPakar ? '#1E3A8A' : '#FFFFFF' }};
            font-weight: 700;
        }

        .panel-nav a .badge {
            padding: 0 8px;
            border-radius: 999px;
            background: var(--accent);
            color: #FFFFFF;
            font-size: 12px;
            font-weight: 700;
            line-height: 22px;
        }

        .panel-access-note {
            margin-top: auto;
            padding: 14px;
            border-radius: 12px;
            background: #F1F5F7;
            font-size: 13px;
            line-height: 1.5;
            color: #3A4853;
        }

        .panel-access-note strong {
            display: block;
            color: var(--ink);
        }

        .panel-main {
            flex: 999 1 560px;
            min-width: 0;
            padding: 32px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .panel-head {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
        }

        .panel-head h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
        }

        .panel-head p {
            margin: 0;
            font-size: 15px;
            color: var(--ink-muted);
        }

        .filter-group {
            display: flex;
            gap: 6px;
            padding: 4px;
            border-radius: 12px;
            background: var(--line-soft);
        }

        .filter-group button {
            padding: 8px 14px;
            border-radius: 9px;
            border: 0;
            font-size: 14px;
            font-weight: 600;
            background: transparent;
            color: var(--ink-muted);
        }

        .filter-group button.active {
            background: var(--white);
            color: var(--ink);
        }

        .stat-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        .stat-card {
            flex: 1 1 160px;
            padding: 18px;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 14px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .stat-card span {
            font-size: 13px;
            color: var(--ink-muted);
        }

        .stat-card strong {
            font-size: 26px;
        }

        .table-wrap {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 16px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 560px;
            border-collapse: collapse;
            font-size: 15px;
        }

        thead tr {
            background: #F1F5F7;
            text-align: left;
        }

        th {
            padding: 12px 18px;
            font-size: 13px;
            color: #3A4853;
        }

        td {
            padding: 12px 18px;
            border-top: 1px solid var(--line-soft);
        }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(0 0 0 0);
        }

        .btn-accent,
        .btn-outline {
            padding: 11px 18px;
            border-radius: 12px;
            border: 0;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-accent {
            background: var(--accent);
            color: #FFFFFF;
        }

        .btn-outline {
            border: 1px solid var(--input-border);
            background: var(--white);
            color: var(--ink);
            font-weight: 600;
        }

        .status-pill {
            padding: 3px 10px;
            border-radius: 999px;
            background: var(--warn-bg);
            color: var(--warn-text);
            font-size: 13px;
            font-weight: 600;
        }

        @media (max-width: 900px) {
            .panel-shell {
                flex-direction: column;
            }

            .panel-sidebar {
                flex-direction: row;
                flex-wrap: wrap;
                align-items: center;
                width: 100%;
                border-right: 0;
                border-bottom: 1px solid var(--line);
                gap: 12px;
            }

            .panel-nav {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .panel-access-note {
                display: none;
            }

            .panel-main {
                padding: 22px 18px;
            }
        }

        @media (max-width: 560px) {
            .panel-head {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                justify-content: space-between;
            }
        }
    </style>
    @yield('head')
</head>

<body>
    <div class="panel-shell">
        <aside class="panel-sidebar">
            <a href="{{ route('demo.peran') }}" class="panel-brand">
                <span class="mark" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                        stroke-linecap="round">
                        <path d="M4 12h2M8 8v8M12 5v14M16 8v8M20 12h0" />
                    </svg>
                </span>
                <span class="names">
                    <span>Ampira</span>
                    <span>{{ $isPakar ? 'Panel pakar' : 'Panel admin' }}</span>
                </span>
            </a>
            <nav aria-label="{{ $isPakar ? 'Menu pakar' : 'Menu admin' }}" class="panel-nav">
                @if ($isPakar)
                    <a href="{{ route('pakar.gejala') }}"
                        class="{{ request()->routeIs('pakar.gejala') ? 'active' : '' }}">Gejala dan bobot CF</a>
                    <a href="{{ route('pakar.pengguna') }}"
                        class="{{ request()->routeIs('pakar.pengguna') ? 'active' : '' }}">Pengguna dan chat
                        <span class="badge">2</span></a>
                @else
                    <a href="{{ route('admin.gejala') }}"
                        class="{{ request()->routeIs('admin.gejala') ? 'active' : '' }}">Gejala dan bobot CF</a>
                    <a href="#">Batas himpunan fuzzy</a>
                    <a href="#">Kategori hasil</a>
                    <a href="#">Klaster Jalur B</a>
                    <a href="{{ route('admin.pengguna') }}"
                        class="{{ request()->routeIs('admin.pengguna') ? 'active' : '' }}">Pengguna dan peran</a>
                @endif
                <a href="{{ route('demo.peran') }}">Keluar</a>
            </nav>
            @if ($isPakar)
                <div class="panel-access-note">
                    <strong>Akses: hanya lihat</strong>Perubahan basis pengetahuan dilakukan oleh admin.
                </div>
            @endif
        </aside>

        <main class="panel-main">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>

</html>
