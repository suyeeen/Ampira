<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Ampira — Masuk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #0E6E66;
            --primary-dark: #0A524C;
            --ink: #16212B;
            --ink-muted: #4B5A66;
            --line: #D9E1E6;
            --input-border: #C5D1D8;
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a {
            color: var(--primary);
        }

        a:hover {
            color: var(--primary-dark);
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

        .back-link {
            padding: 10px 14px;
            text-decoration: none;
            color: var(--ink-muted);
            font-weight: 500;
            font-size: 15px;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            padding: 64px 24px;
        }

        form {
            width: 100%;
            max-width: 440px;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 36px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
        }

        form>p.lead {
            margin: 0;
            font-size: 15px;
            color: var(--ink-muted);
            line-height: 1.5;
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

        .field input {
            padding: 13px 14px;
            border-radius: 10px;
            border: 1px solid var(--input-border);
            font: inherit;
            font-size: 15px;
        }

        .field input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .btn-primary {
            padding: 14px;
            border-radius: 12px;
            background: var(--primary);
            color: var(--white);
            border: 0;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .signup-line {
            margin: 0;
            font-size: 15px;
            color: var(--ink-muted);
            text-align: center;
        }

        .signup-line a {
            font-weight: 600;
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
            <a href="{{ route('welcome') }}" class="back-link">Kembali ke beranda</a>
        </div>
    </header>

    <main>
        <form onsubmit="event.preventDefault(); window.location.href='{{ route('skrining.profil') }}';">
            <div>
                <h1>Masuk ke akun Anda</h1>
                <p class="lead">Hasil skrining tersimpan di akun ini dan bisa Anda lihat kembali.</p>
            </div>
            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="nama@email.com" autocomplete="username">
            </div>
            <div class="field">
                <label for="sandi">Kata sandi</label>
                <input id="sandi" name="sandi" type="password" placeholder="Minimal 8 karakter"
                    autocomplete="current-password">
            </div>
            <button type="submit" class="btn-primary">Masuk</button>
            <p class="signup-line">Belum punya akun? <a href="#">Daftar di sini</a></p>
        </form>
    </main>

</body>

</html>
