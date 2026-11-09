<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Ampira')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #0E6E66;
            --primary-dark: #0A524C;
            --primary-soft: #E3F2F0;
            --ink: #16212B;
            --ink-muted: #4B5A66;
            --line: #D9E1E6;
            --line-soft: #E6ECEF;
            --input-border: #C5D1D8;
            --bg: #F6F8F9;
            --white: #FFFFFF;
            --warn-bg: #FFF4E0;
            --warn-border: #F0D3A3;
            --warn-text: #5C3200;
            --warn-icon: #8A4B00;
            --low-bg: #E3F2F0;
            --low-text: #0A524C;
            --high-bg: #FDE7E7;
            --high-text: #8A1C1C;
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
            color: var(--primary);
        }

        a:hover {
            color: var(--primary-dark);
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 16px 24px;
        }

        /* ---------- HEADER ---------- */
        .app-header {
            background: var(--white);
            border-bottom: 1px solid var(--line);
        }

        .app-header .container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--ink);
        }

        .brand:hover {
            color: var(--ink);
        }

        .brand-mark {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 800;
        }

        .app-nav {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
        }

        .nav-link {
            padding: 10px 14px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--ink-muted);
            font-weight: 500;
            font-size: 15px;
        }

        .nav-link:hover {
            color: var(--ink);
        }

        .nav-link.active {
            background: var(--primary-soft);
            color: var(--primary-dark);
            font-weight: 600;
        }

        /* ---------- MAIN / STEPPER ---------- */
        main {
            max-width: {{ $maxWidth ?? '1120px' }};
            margin: 0 auto;
            padding: 48px 24px 64px;
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .stepper {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .stepper li {
            padding: 8px 14px;
            border-radius: 999px;
            background: var(--line-soft);
            color: var(--ink-muted);
        }

        .stepper li.current {
            background: var(--primary);
            color: var(--white);
        }

        .stepper li.done {
            background: var(--primary-soft);
            color: var(--primary-dark);
        }

        /* ---------- FORM ---------- */
        .card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 32px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .field label {
            font-size: 14px;
            font-weight: 600;
        }

        .field input,
        .field select {
            padding: 13px 14px;
            border-radius: 10px;
            border: 1px solid var(--input-border);
            font: inherit;
            font-size: 15px;
            width: 100%;
            background: var(--white);
            color: var(--ink);
        }

        .field input:focus,
        .field select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-soft);
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .radio-option {
            flex: 1 1 160px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 14px;
            border-radius: 10px;
            border: 1px solid var(--input-border);
            font-size: 15px;
        }

        .btn-primary,
        .btn-outline {
            padding: 14px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            text-align: center;
            border: 0;
            cursor: pointer;
            font-family: inherit;
            display: inline-block;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            color: var(--white);
        }

        .btn-outline {
            border: 1px solid var(--input-border);
            background: var(--white);
            color: var(--ink);
            font-weight: 600;
        }

        .btn-outline:hover {
            color: var(--ink);
            border-color: var(--ink-muted);
        }

        .btn-primary:disabled,
        .btn-outline:disabled {
            cursor: not-allowed;
            opacity: .45;
        }

        /* ---------- ALERTS ---------- */
        .alert-sample {
            margin: 0;
            padding: 12px 16px;
            border-radius: 10px;
            background: #EEF1F4;
            border: 1px dashed #9AA8B2;
            font-size: 14px;
            color: #3A4853;
        }

        .alert-warning {
            background: var(--warn-bg);
            border: 1px solid var(--warn-border);
            border-radius: 20px;
            padding: 28px 32px;
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .alert-warning h2 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
            color: var(--warn-text);
        }

        .alert-warning p {
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
            color: var(--warn-text);
        }

        /* ---------- BADGES ---------- */
        .badge {
            padding: 4px 12px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 14px;
        }

        .badge-rendah {
            background: var(--low-bg);
            color: var(--low-text);
        }

        .badge-sedang {
            background: var(--warn-bg);
            color: var(--warn-text);
        }

        .badge-tinggi {
            background: var(--high-bg);
            color: var(--high-text);
        }

        /* ---------- TABLE ---------- */
        .table-wrap {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 720px;
            border-collapse: collapse;
            font-size: 15px;
        }

        thead tr {
            background: #F1F5F7;
            text-align: left;
        }

        th {
            padding: 14px 20px;
            font-size: 13px;
            font-weight: 700;
            color: #3A4853;
        }

        td {
            padding: 16px 20px;
            border-top: 1px solid var(--line-soft);
        }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(0 0 0 0);
        }

        @media (max-width: 640px) {
            .app-header .container {
                padding: 14px 20px;
            }

            main {
                padding: 32px 18px 48px;
            }

            .card {
                padding: 22px;
            }
        }
    </style>
    @yield('head')
</head>

<body>
    <header class="app-header">
        <div class="container">
            <a href="{{ route('welcome') }}" class="brand">
                <span class="brand-mark" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                        stroke-linecap="round">
                        <path d="M4 12h2M8 8v8M12 5v14M16 8v8M20 12h0" />
                    </svg>
                </span>
                <span class="brand-name">Ampira</span>
            </a>
            <nav aria-label="Menu akun" class="app-nav">
                <a href="{{ route('skrining.profil') }}"
                    class="nav-link {{ ($activeNav ?? '') === 'skrining' ? 'active' : '' }}">Skrining baru</a>
                <a href="{{ route('riwayat') }}"
                    class="nav-link {{ ($activeNav ?? '') === 'riwayat' ? 'active' : '' }}">Riwayat</a>
                <a href="{{ route('welcome') }}" class="nav-link">Keluar</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
