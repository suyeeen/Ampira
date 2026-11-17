<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Ampira — Masuk</title>
    @include('partials.tokens')
    <style>
        body {
            min-height: 100vh;
        }

        .masuk-shell {
            min-height: 100vh;
            display: flex;
            flex-wrap: wrap;
        }

        .masuk-kiri {
            flex: 1 1 560px;
            min-width: 0;
            background: var(--deep);
            color: #fff;
            padding: 52px 64px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 32px;
        }

        .brand-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-row .mark {
            width: 36px;
            height: 36px;
            border-radius: 11px;
            background: var(--lime);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-row .wordmark {
            font-size: 19px;
            font-weight: 800;
        }

        .masuk-mid {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .masuk-chip {
            align-self: flex-start;
            background: var(--deep2);
            border-radius: var(--radius-pill);
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 600;
            color: var(--lime);
        }

        .masuk-mid h1 {
            margin: 0;
            font-size: 44px;
            font-weight: 800;
            line-height: 1.15;
        }

        .masuk-mid>p {
            margin: 0;
            font-size: 17px;
            line-height: 1.55;
            color: var(--side-text);
        }

        .fitur-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .fitur-list .baris {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .fitur-list .dot {
            width: 26px;
            height: 26px;
            border-radius: 999px;
            background: var(--deep2);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .fitur-list span.teks {
            font-size: 15px;
            font-weight: 500;
        }

        .masuk-note {
            background: var(--deep2);
            border-radius: 16px;
            padding: 18px;
            display: flex;
            gap: 12px;
            font-size: 14px;
            color: var(--side-text);
            line-height: 1.55;
        }

        .masuk-kanan {
            flex: 1 1 400px;
            min-width: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
        }

        .kartu-masuk {
            width: 100%;
            max-width: 440px;
            background: var(--surface);
            border-radius: var(--radius-hero);
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            box-shadow: var(--shadow-card);
        }

        .kartu-masuk h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
        }

        .kartu-masuk>p {
            margin: 0;
            font-size: 15px;
            color: var(--muted);
        }

        .baris-ingat {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 14px;
        }

        .baris-ingat label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--ink);
        }

        .baris-ingat a {
            font-weight: 600;
        }

        .pembatas {
            height: 1px;
            background: var(--line);
            border: 0;
            margin: 0;
        }

        .teks-tengah {
            margin: 0;
            font-size: 14px;
            color: var(--muted);
            text-align: center;
        }

        .teks-tengah a {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="masuk-shell">
        <div class="masuk-kiri">
            <div class="brand-row">
                <span class="mark" aria-hidden="true">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#051C12" stroke-width="2"
                        stroke-linecap="round">
                        <path d="M4 12h1M8 8v8M12 5v14M16 8v8M20 12h0" />
                    </svg>
                </span>
                <span class="wordmark">Ampira</span>
            </div>
            <div class="masuk-mid">
                <span class="masuk-chip">Skrining awal untuk orang tua</span>
                <h1>Kenali tanda keterlambatan bicara anak, dari rumah.</h1>
                <p>Jawab pertanyaan singkat tentang cara anak berbicara dan berinteraksi. Ampira menghitung tingkat
                    keyakinan indikasi dengan metode Fuzzy dan Certainty Factor.</p>
                <div class="fitur-list">
                    @foreach (['Untuk anak usia 12–60 bulan', 'Hasil keluar setelah kuesioner selesai', 'Bisa konsultasi dengan psikolog lewat chat'] as $fitur)
                        <div class="baris">
                            <span class="dot" aria-hidden="true">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#C6F36B"
                                    stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </span>
                            <span class="teks">{{ $fitur }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="masuk-note">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#C6F36B" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex:none">
                    <path d="M12 9v4M12 17h.01" />
                    <path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z" />
                </svg>
                <span>Hasil skrining bukan diagnosis. Untuk kepastian, konsultasikan dengan tenaga profesional.</span>
            </div>
        </div>

        <div class="masuk-kanan">
            <form class="kartu-masuk"
                onsubmit="event.preventDefault(); window.location.href='{{ route('beranda') }}';">
                <div>
                    <h2>Masuk ke akun</h2>
                    <p>Satu akun untuk orang tua, pakar, dan admin.</p>
                </div>
                <x-isian label="Email" type="email" name="email" placeholder="nama@email.com"
                    autocomplete="username" />
                <x-isian label="Kata sandi" type="password" name="sandi" placeholder="••••••••"
                    autocomplete="current-password" />
                <div class="baris-ingat">
                    <label><input type="checkbox" name="ingat"> Ingat saya</label>
                    <a href="#">Lupa kata sandi?</a>
                </div>
                <x-tombol variant="utama" type="submit" style="width:100%">Masuk</x-tombol>
                <hr class="pembatas">
                <p class="teks-tengah">Belum punya akun? <a href="#">Daftar sebagai orang tua</a></p>
                <p class="teks-tengah"><a href="{{ route('demo.peran') }}">Lihat demo semua peran &rarr;</a></p>
            </form>
        </div>
    </div>

</body>

</html>
