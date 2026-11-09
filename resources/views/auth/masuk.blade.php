<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Masuk — Ampira</title>
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
            --line: rgba(22, 33, 29, .12);
            --line-soft: rgba(22, 33, 29, .08);
            --bg: #FBFCFB;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            background: var(--bg);
            color: var(--ink);
            font-family: 'Public Sans', system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: var(--primary);
        }

        a:hover {
            color: var(--primary-dark);
        }

        .auth-shell {
            min-height: 100vh;
            display: flex;
        }

        /* ---------- BRAND PANEL ---------- */
        .auth-brand {
            flex: 0 0 420px;
            background: var(--primary);
            color: #fff;
            padding: 44px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand-mark-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-mark {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #fff;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font: 600 15px 'Newsreader', serif;
            flex-shrink: 0;
        }

        .brand-name {
            font: 600 15px 'Public Sans', sans-serif;
            letter-spacing: .02em;
        }

        .brand-copy h1 {
            margin: 0 0 16px;
            font: 400 40px/1.14 'Newsreader', serif;
            letter-spacing: -.01em;
            text-wrap: pretty;
        }

        .brand-copy p {
            font: 15px/1.65 'Public Sans', sans-serif;
            color: rgba(255, 255, 255, .78);
            max-width: 34ch;
        }

        .brand-foot {
            font: 12px/1.6 'Public Sans', sans-serif;
            color: rgba(255, 255, 255, .6);
            border-top: 1px solid rgba(255, 255, 255, .18);
            padding-top: 16px;
        }

        /* ---------- FORM PANEL ---------- */
        .auth-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 24px;
        }

        .auth-card {
            width: 100%;
            max-width: 380px;
        }

        .auth-tabs {
            display: flex;
            gap: 4px;
            padding: 4px;
            background: #F1F3F2;
            border-radius: 8px;
            margin-bottom: 32px;
            width: 260px;
            max-width: 100%;
        }

        .auth-tab {
            flex: 1;
            text-align: center;
            padding: 8px;
            border-radius: 6px;
            font: 600 13px 'Public Sans', sans-serif;
            border: 0;
            background: none;
            cursor: pointer;
            color: var(--ink-muted);
            font-weight: 500;
        }

        .auth-tab[aria-selected="true"] {
            background: #fff;
            color: var(--ink);
            font-weight: 600;
            box-shadow: 0 1px 2px rgba(22, 33, 29, .08);
        }

        .auth-card h2 {
            margin: 0 0 6px;
            font: 500 26px/1.2 'Newsreader', serif;
            color: var(--ink);
        }

        .auth-card>p {
            margin: 0 0 28px;
            font: 13.5px/1.5 'Public Sans', sans-serif;
            color: var(--ink-muted);
        }

        .auth-form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .field label {
            font: 600 12px 'Public Sans', sans-serif;
            color: var(--ink-soft);
        }

        .field input {
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 8px;
            font: 14px 'Public Sans', sans-serif;
            color: var(--ink);
            background: #fff;
            width: 100%;
        }

        .field input::placeholder {
            color: var(--ink-faint);
        }

        .field input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-soft);
        }

        .field-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font: 12.5px 'Public Sans', sans-serif;
        }

        .checkbox {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--ink-muted);
            cursor: pointer;
        }

        .checkbox input {
            width: 15px;
            height: 15px;
            accent-color: var(--primary);
        }

        .field-row a {
            text-decoration: none;
            font-weight: 600;
        }

        .btn-primary {
            margin-top: 6px;
            padding: 13px;
            text-align: center;
            background: var(--primary);
            color: #fff;
            border: 0;
            border-radius: 8px;
            font: 600 14px 'Public Sans', sans-serif;
            cursor: pointer;
            transition: background .15s ease;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 4px 0;
            font: 11px 'Public Sans', sans-serif;
            color: var(--ink-faint);
        }

        .divider span {
            flex: 1;
            height: 1px;
            background: var(--line);
        }

        .btn-outline {
            padding: 12px;
            text-align: center;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 8px;
            font: 600 13.5px 'Public Sans', sans-serif;
            color: var(--ink-soft);
            cursor: pointer;
            transition: border-color .15s ease, background .15s ease;
        }

        .btn-outline:hover {
            border-color: var(--primary);
            background: var(--primary-soft);
        }

        .auth-disclaimer {
            margin: 30px 0 0;
            font: 11.5px/1.6 'Public Sans', sans-serif;
            color: var(--ink-faint);
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 880px) {
            .auth-shell {
                flex-direction: column;
            }

            .auth-brand {
                flex: none;
                padding: 32px 28px;
                gap: 28px;
            }

            .brand-copy h1 {
                font-size: 30px;
            }

            .brand-copy p {
                max-width: none;
            }

            .auth-panel {
                padding: 40px 24px 56px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-shell">
        <div class="auth-brand">
            <div class="brand-mark-row">
                <span class="brand-mark" aria-hidden="true">A</span>
                <span class="brand-name">Ampira</span>
            </div>
            <div class="brand-copy">
                <h1>Skrining dini indikasi gangguan bicara &amp; bahasa anak</h1>
                <p>Jawab kuesioner perilaku sesuai pengamatan Anda di rumah. Sistem menghitung tingkat keyakinan
                    indikasi, bukan diagnosis.</p>
            </div>
            <div class="brand-foot">
                Sistem pakar hybrid Fuzzy Mamdani &amp; Certainty Factor<br>
                Klinik Psikologi Ekadya × Politeknik Negeri Jember
            </div>
        </div>

        <div class="auth-panel">
            <div class="auth-card">
                <div class="auth-tabs" role="tablist">
                    <button type="button" class="auth-tab" role="tab" aria-selected="true">Masuk</button>
                    <button type="button" class="auth-tab" role="tab" aria-selected="false">Daftar</button>
                </div>

                <h2>Selamat datang kembali</h2>
                <p>Masuk untuk melanjutkan skrining atau melihat riwayat.</p>

                <form class="auth-form"
                    onsubmit="event.preventDefault(); window.location.href='{{ route('skrining.profil') }}';">
                    <div class="field">
                        <label for="identity">Email atau nomor HP</label>
                        <input type="text" id="identity" name="identity" autocomplete="username"
                            placeholder="ibu.sari@gmail.com">
                    </div>
                    <div class="field">
                        <label for="password">Kata sandi</label>
                        <input type="password" id="password" name="password" autocomplete="current-password"
                            placeholder="••••••••">
                    </div>
                    <div class="field-row">
                        <label class="checkbox">
                            <input type="checkbox" name="remember">
                            Ingat saya di perangkat ini
                        </label>
                        <a href="#">Lupa sandi?</a>
                    </div>
                    <button type="submit" class="btn-primary">Masuk</button>
                    <div class="divider"><span></span>atau<span></span></div>
                    <button type="button" class="btn-outline">Masuk sebagai psikolog / pakar</button>
                </form>

                <p class="auth-disclaimer">Hasil Ampira adalah skrining awal dan tidak menggantikan pemeriksaan
                    tenaga profesional.</p>
            </div>
        </div>
    </div>

</body>

</html>
