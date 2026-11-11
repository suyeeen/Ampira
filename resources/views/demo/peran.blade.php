<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Ampira — Pilih peran</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #0E6E66;
            --ink: #16212B;
            --ink-muted: #4B5A66;
            --line: #D9E1E6;
            --bg: #F6F8F9;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--ink);
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
        }

        a {
            color: var(--primary);
        }

        a:hover {
            color: #0A524C;
        }

        header {
            background: var(--white);
            border-bottom: 1px solid var(--line);
        }

        header .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 16px 24px;
            display: flex;
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

        .brand-mark {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 800;
        }

        .demo-pill {
            padding: 6px 12px;
            border-radius: 999px;
            background: #FFF4E0;
            color: #5C3200;
            font-size: 13px;
            font-weight: 700;
        }

        main {
            max-width: 1120px;
            margin: 0 auto;
            padding: 56px 24px 64px;
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .intro {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 680px;
        }

        .intro h1 {
            margin: 0;
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -.01em;
        }

        .intro p {
            margin: 0;
            font-size: 17px;
            line-height: 1.6;
            color: var(--ink-muted);
        }

        .role-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }

        .role-card {
            flex: 1 1 300px;
            min-width: 0;
            text-decoration: none;
            color: var(--ink);
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 28px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .role-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px -20px rgba(22, 33, 43, .25);
        }

        .role-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .role-card h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
        }

        .role-card p {
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
            color: var(--ink-muted);
        }

        .role-card .go {
            margin-top: auto;
            font-weight: 700;
        }

        .note {
            margin: 0;
            padding: 14px 18px;
            border-radius: 12px;
            background: #EEF1F4;
            border: 1px dashed #9AA8B2;
            font-size: 14px;
            line-height: 1.6;
            color: #3A4853;
        }
    </style>
</head>

<body>

    <header>
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
            <span class="demo-pill">Mode demo</span>
        </div>
    </header>

    <main>
        <div class="intro">
            <h1>Masuk sebagai</h1>
            <p>Pilih peran untuk melihat tampilan masing-masing. Di sistem sebenarnya, peran ditentukan otomatis
                dari akun yang masuk.</p>
        </div>

        <div class="role-grid">
            <a href="{{ route('skrining.profil') }}" class="role-card">
                <span class="role-icon" style="background:#E3F2F0">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="7" r="4" />
                        <path d="M2 21v-1a6 6 0 0 1 12 0v1" />
                        <circle cx="18" cy="10" r="2.5" />
                        <path d="M15 21v-.5a4 4 0 0 1 7 0v.5" />
                    </svg>
                </span>
                <h2>Orang tua</h2>
                <p>Mengisi data anak, menjawab kuesioner, melihat hasil dan riwayat, serta chat dengan psikolog.</p>
                <span class="go" style="color:#0E6E66">Lihat tampilan &rarr;</span>
            </a>
            <a href="{{ route('pakar.gejala') }}" class="role-card">
                <span class="role-icon" style="background:#E8EEFB">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#1D4ED8" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3a4 4 0 0 1 4 4v1a4 4 0 0 1-8 0V7a4 4 0 0 1 4-4Z" />
                        <path d="M4 21a8 8 0 0 1 16 0" />
                        <path d="M16 15l-4 3-4-3" />
                    </svg>
                </span>
                <h2>Psikolog / pakar</h2>
                <p>Melihat gejala dan bobot CF (hanya lihat), memantau data anak tiap pengguna, dan membalas chat
                    orang tua.</p>
                <span class="go" style="color:#1D4ED8">Lihat tampilan &rarr;</span>
            </a>
            <a href="{{ route('admin.gejala') }}" class="role-card">
                <span class="role-icon" style="background:#F1ECFB">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#6D28D9" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3" />
                        <path
                            d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1a1.7 1.7 0 0 0-1.1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1a1.7 1.7 0 0 0 1.5-1.1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8V9a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.1a1.7 1.7 0 0 0-1.5 1Z" />
                    </svg>
                </span>
                <h2>Admin</h2>
                <p>Satu-satunya peran yang mengubah gejala, bobot CF, batas fuzzy, kategori hasil, dan akun
                    pengguna.</p>
                <span class="go" style="color:#6D28D9">Lihat tampilan &rarr;</span>
            </a>
        </div>

        <p class="note">Tampilan peran pakar dan admin adalah usulan pengembangan dan belum tersambung ke
            database — semua interaksi hanya berjalan di browser.</p>
    </main>

</body>

</html>
