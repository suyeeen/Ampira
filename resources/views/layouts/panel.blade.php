@php
    $isPakar = ($peran ?? 'pakar') === 'pakar';
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Ampira — Panel')</title>
    @include('partials.tokens')
    <style>
        .panel-shell {
            display: flex;
            flex-wrap: wrap;
            min-height: 100vh;
        }

        .panel-sidebar {
            flex: 1 1 264px;
            max-width: 100%;
            width: 264px;
            background: var(--deep);
            padding: 24px 16px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 24px;
        }

        .panel-top {
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .panel-brand {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 0 8px;
        }

        .panel-brand .logo-row {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #fff;
        }

        .panel-brand .mark {
            width: 36px;
            height: 36px;
            border-radius: 11px;
            background: var(--lime);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .panel-brand .wordmark {
            font-size: 19px;
            font-weight: 800;
            color: #fff;
        }

        .panel-role-chip {
            display: inline-flex;
            align-self: flex-start;
            background: var(--deep2);
            color: var(--lime);
            border-radius: var(--radius-pill);
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .panel-nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .panel-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            padding: 11px 14px;
            border-radius: 12px;
            color: var(--side-text);
            font-weight: 500;
            font-size: 15px;
        }

        .panel-nav a .titik {
            width: 8px;
            height: 8px;
            border-radius: 4px;
            background: var(--side-text);
            opacity: .5;
            flex: none;
        }

        .panel-nav a.active {
            background: var(--lime);
            color: var(--deep);
            font-weight: 700;
        }

        .panel-nav a.active .titik {
            background: var(--deep);
            opacity: 1;
        }

        .panel-account {
            background: var(--deep2);
            border-radius: 16px;
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .panel-account .row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-account .avatar {
            width: 36px;
            height: 36px;
            border-radius: 999px;
            background: var(--lime);
            color: var(--deep);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 13px;
            flex: none;
        }

        .panel-account .names {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .panel-account .names strong {
            color: #fff;
            font-size: 14px;
            font-weight: 700;
        }

        .panel-account .names span {
            color: var(--side-text);
            font-size: 12px;
        }

        .panel-account .note {
            color: var(--side-text);
            font-size: 12px;
            line-height: 1.5;
        }

        .panel-main {
            flex: 999 1 560px;
            min-width: 0;
            padding: 28px 40px 48px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .panel-head {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .panel-head h1 {
            margin: 0 0 4px;
            font-size: 28px;
            font-weight: 800;
        }

        .panel-head p {
            margin: 0;
            font-size: 14px;
            color: var(--muted);
        }

        .panel-head-tools {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-search {
            width: 240px;
            max-width: 100%;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: var(--radius-pill);
            padding: 10px 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            font-size: 14px;
        }

        .panel-icon-btn {
            width: 40px;
            height: 40px;
            border-radius: 999px;
            background: var(--surface);
            border: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .filter-group {
            display: flex;
            gap: 4px;
            padding: 4px;
            border-radius: var(--radius-pill);
            background: var(--chip);
        }

        .filter-group button {
            padding: 8px 16px;
            border-radius: var(--radius-pill);
            border: 0;
            font-size: 15px;
            font-weight: 600;
            background: transparent;
            color: var(--muted);
            font-family: inherit;
            cursor: pointer;
        }

        .filter-group button.active {
            background: var(--deep);
            color: #fff;
        }

        .stat-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .stat-card {
            flex: 1 1 200px;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: var(--radius-card);
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .stat-card.sorot {
            background: var(--deep);
            border-color: var(--deep);
        }

        .stat-card .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-card .top span {
            font-size: 13px;
            font-weight: 500;
            color: var(--muted);
        }

        .stat-card.sorot .top span {
            color: var(--side-text);
        }

        .stat-card .ic {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            background: var(--chip);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .stat-card.sorot .ic {
            background: var(--deep2);
        }

        .stat-card strong {
            font-size: 28px;
            font-weight: 800;
        }

        .stat-card.sorot strong {
            color: var(--lime);
        }

        @media (max-width: 900px) {
            .panel-shell {
                flex-direction: column;
                flex-wrap: nowrap;
            }

            .panel-sidebar {
                width: 100%;
                flex-direction: row;
                flex-wrap: wrap;
                align-items: center;
            }

            .panel-top {
                flex-direction: row;
                flex-wrap: wrap;
                align-items: center;
                gap: 16px;
            }

            .panel-nav {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .panel-account {
                display: none;
            }

            .panel-main {
                padding: 22px 18px;
            }

            .panel-head {
                flex-direction: column;
                align-items: stretch;
            }
        }

        @media (max-width: 560px) {
            .stat-card {
                flex: 1 1 100%;
            }
        }
    </style>
    @yield('head')
</head>

<body>
    <div class="panel-shell">
        <aside class="panel-sidebar">
            <div class="panel-top">
                <div class="panel-brand">
                    <a href="{{ route('demo.peran') }}" class="logo-row">
                        <span class="mark" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#051C12"
                                stroke-width="2" stroke-linecap="round">
                                <path d="M4 12h1M8 8v8M12 5v14M16 8v8M20 12h0" />
                            </svg>
                        </span>
                        <span class="wordmark">Ampira</span>
                    </a>
                    <span class="panel-role-chip">{{ $isPakar ? 'Panel pakar' : 'Panel admin' }}</span>
                </div>
                <nav aria-label="{{ $isPakar ? 'Menu pakar' : 'Menu admin' }}" class="panel-nav">
                    @if ($isPakar)
                        <a href="{{ route('pakar.gejala') }}"
                            class="{{ request()->routeIs('pakar.gejala') ? 'active' : '' }}"><span
                                class="titik"></span>Gejala dan bobot CF</a>
                        <a href="{{ route('pakar.pengguna') }}"
                            class="{{ request()->routeIs('pakar.pengguna') ? 'active' : '' }}"><span
                                class="titik"></span>Pengguna dan chat</a>
                        <a href="{{ route('demo.peran') }}"><span class="titik"></span>Keluar</a>
                    @else
                        <a href="{{ route('admin.ringkasan') }}"
                            class="{{ request()->routeIs('admin.ringkasan') ? 'active' : '' }}"><span
                                class="titik"></span>Ringkasan</a>
                        <a href="{{ route('admin.gejala') }}"
                            class="{{ request()->routeIs('admin.gejala') ? 'active' : '' }}"><span
                                class="titik"></span>Gejala dan bobot CF</a>
                        <a href="#"><span class="titik"></span>Batas himpunan fuzzy</a>
                        <a href="#"><span class="titik"></span>Kategori hasil</a>
                        <a href="#"><span class="titik"></span>Klaster Jalur B</a>
                        <a href="{{ route('admin.pengguna') }}"
                            class="{{ request()->routeIs('admin.pengguna') ? 'active' : '' }}"><span
                                class="titik"></span>Pengguna dan peran</a>
                        <a href="{{ route('demo.peran') }}"><span class="titik"></span>Keluar</a>
                    @endif
                </nav>
            </div>
            <div class="panel-account">
                <div class="row">
                    <span class="avatar" aria-hidden="true">{{ $isPakar ? 'P' : 'AD' }}</span>
                    <div class="names">
                        <strong>{{ $isPakar ? '[Nama psikolog]' : 'Admin Ampira' }}</strong>
                        <span>{{ $isPakar ? 'Pakar' : 'Admin' }}</span>
                    </div>
                </div>
                @if ($isPakar)
                    <p class="note">Akses hanya lihat. Perubahan basis pengetahuan dilakukan admin.</p>
                @endif
            </div>
        </aside>

        <main class="panel-main">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>

</html>
