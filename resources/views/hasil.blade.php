<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Hasil skrining — Ampira</title>
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
            --line-soft: rgba(22, 33, 29, .1);
            --bg: #FBFCFB;
            --risk-low: #2F6F63;
            --risk-mid: #9A6B1C;
            --risk-high: #A3483C;
            --risk-mid-bg: #F6EEDD;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--bg);
            color: var(--ink);
            font-family: 'Public Sans', system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: var(--primary);
        }

        .hasil-wrap {
            max-width: 1180px;
            margin: 0 auto;
            padding: 40px 24px 64px;
        }

        .eyebrow {
            font: 600 11px ui-monospace, Menlo, monospace;
            letter-spacing: .06em;
            color: var(--ink-faintest);
            margin-bottom: 14px;
        }

        .hasil-cols {
            display: flex;
            gap: 44px;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .hasil-main {
            flex: 1;
            min-width: 320px;
        }

        .hasil-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .hasil-title .dot {
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: var(--risk-mid);
        }

        .hasil-title h1 {
            font: 500 42px/1.1 'Newsreader', serif;
            color: var(--ink);
        }

        .hasil-desc {
            margin: 0 0 26px;
            font: 15px/1.7 'Public Sans', sans-serif;
            color: var(--ink-soft);
            max-width: 52ch;
            text-wrap: pretty;
        }

        .confidence {
            max-width: 520px;
            margin-bottom: 34px;
        }

        .confidence .row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 9px;
        }

        .confidence .row span:first-child {
            font: 600 12px 'Public Sans', sans-serif;
            color: var(--ink-soft);
        }

        .confidence .row span:last-child {
            font: 500 20px 'Newsreader', serif;
            color: var(--ink);
        }

        .confidence .row small {
            font: 11px ui-monospace, Menlo, monospace;
            color: var(--ink-faintest);
            margin-left: 7px;
        }

        .confidence-bar {
            position: relative;
            height: 8px;
            border-radius: 4px;
            background: linear-gradient(90deg, #CFE0DA 0%, #E6D9BD 50%, #ECCFC9 100%);
        }

        .confidence-bar .marker {
            position: absolute;
            left: 78%;
            top: -4px;
            width: 3px;
            height: 16px;
            border-radius: 2px;
            background: var(--ink);
        }

        .confidence-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 7px;
            font: 11.5px 'Public Sans', sans-serif;
            color: var(--ink-faint);
        }

        .domains {
            display: flex;
            gap: 14px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }

        .domain-card {
            flex: 1;
            min-width: 160px;
            padding: 18px;
            background: #fff;
            border: 1px solid var(--line-soft);
            border-radius: 9px;
        }

        .domain-card .name {
            font: 600 12px 'Public Sans', sans-serif;
            color: var(--ink-soft);
            margin-bottom: 8px;
        }

        .domain-card .level {
            font: 500 24px 'Newsreader', serif;
            margin-bottom: 9px;
        }

        .domain-card .bar {
            height: 5px;
            background: #EEF1F0;
            border-radius: 3px;
        }

        .domain-card .bar span {
            display: block;
            height: 5px;
            border-radius: 3px;
        }

        .domain-card .cf {
            margin-top: 7px;
            font: 11px ui-monospace, Menlo, monospace;
            color: var(--ink-faintest);
        }

        .hasil-main h2 {
            margin: 0 0 14px;
            font: 500 22px 'Newsreader', serif;
            color: var(--ink);
        }

        .reco-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 620px;
        }

        .reco-item {
            display: flex;
            gap: 14px;
            padding: 15px 17px;
            background: #fff;
            border: 1px solid var(--line-soft);
            border-radius: 9px;
        }

        .reco-item .num {
            font: 600 11px ui-monospace, Menlo, monospace;
            color: var(--primary);
            padding-top: 2px;
        }

        .reco-item p {
            font: 13.5px/1.6 'Public Sans', sans-serif;
            color: var(--ink-soft);
        }

        .hasil-rail {
            width: 340px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .flag-card {
            padding: 22px;
            background: var(--risk-mid-bg);
            border: 1px solid rgba(154, 107, 28, .28);
            border-radius: 10px;
        }

        .flag-card .head {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 11px;
        }

        .flag-card .head .icon {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--risk-mid);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font: 600 13px 'Public Sans', sans-serif;
        }

        .flag-card .head span:last-child {
            font: 600 13px 'Public Sans', sans-serif;
            color: #7A5314;
        }

        .flag-card p {
            margin: 0 0 12px;
            font: 13px/1.65 'Public Sans', sans-serif;
            color: #5F4310;
        }

        .flag-card .note {
            padding: 11px 13px;
            background: rgba(255, 255, 255, .6);
            border-radius: 7px;
            font: 11.5px/1.55 'Public Sans', sans-serif;
            color: #7A5314;
        }

        .action-card {
            padding: 20px;
            background: #fff;
            border: 1px solid var(--line-soft);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .action-card button,
        .action-card a {
            padding: 12px;
            text-align: center;
            border-radius: 8px;
            font: 600 13.5px 'Public Sans', sans-serif;
            border: 1px solid var(--line);
            background: #fff;
            color: var(--ink-soft);
            cursor: pointer;
            text-decoration: none;
        }

        .action-card button.primary {
            border-color: var(--primary);
            background: var(--primary);
            color: #fff;
        }

        .action-card button.primary:hover {
            background: var(--primary-dark);
        }

        .summary-card {
            padding: 18px;
            background: #fff;
            border: 1px solid var(--line-soft);
            border-radius: 10px;
        }

        .summary-card .label {
            font: 600 11px ui-monospace, Menlo, monospace;
            letter-spacing: .06em;
            color: var(--ink-faintest);
            margin-bottom: 12px;
        }

        .summary-card .row {
            display: flex;
            justify-content: space-between;
            font: 12.5px 'Public Sans', sans-serif;
            color: var(--ink-soft);
            margin-bottom: 8px;
        }

        .summary-card .row span:last-child {
            font-family: ui-monospace, Menlo, monospace;
        }

        .summary-card a {
            display: inline-block;
            margin-top: 6px;
            font: 600 12.5px 'Public Sans', sans-serif;
            text-decoration: none;
        }

        .disclaimer {
            font: 11.5px/1.6 'Public Sans', sans-serif;
            color: var(--ink-faint);
        }

        @media (max-width: 980px) {
            .hasil-rail {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="hasil-wrap">
        <div class="eyebrow">HASIL SKRINING · ARUNA, 31 BULAN · 12 AGUSTUS 2026</div>

        <div class="hasil-cols">
            <div class="hasil-main">
                <div class="hasil-title">
                    <span class="dot" aria-hidden="true"></span>
                    <h1>Risiko sedang</h1>
                </div>
                <p class="hasil-desc">Pola jawaban Anda menunjukkan indikasi keterlambatan bicara dan bahasa yang
                    perlu dipantau. Disarankan konsultasi dengan psikolog anak dalam 4–6 minggu ke depan.</p>

                <div class="confidence">
                    <div class="row">
                        <span>Tingkat keyakinan sistem</span>
                        <span>78%<small>CF 0,78</small></span>
                    </div>
                    <div class="confidence-bar"><span class="marker" aria-hidden="true"></span></div>
                    <div class="confidence-labels"><span>Rendah</span><span>Sedang</span><span>Tinggi</span></div>
                </div>

                <div class="domains">
                    <div class="domain-card">
                        <div class="name">Bicara ekspresif</div>
                        <div class="level" style="color:var(--risk-high)">Tinggi</div>
                        <div class="bar"><span style="width:81%;background:var(--risk-high)"></span></div>
                        <div class="cf">CF 0,81</div>
                    </div>
                    <div class="domain-card">
                        <div class="name">Pemahaman reseptif</div>
                        <div class="level" style="color:var(--risk-low)">Rendah</div>
                        <div class="bar"><span style="width:42%;background:var(--risk-low)"></span></div>
                        <div class="cf">CF 0,42</div>
                    </div>
                    <div class="domain-card">
                        <div class="name">Artikulasi</div>
                        <div class="level" style="color:var(--risk-mid)">Sedang</div>
                        <div class="bar"><span style="width:66%;background:var(--risk-mid)"></span></div>
                        <div class="cf">CF 0,66</div>
                    </div>
                </div>

                <h2>Rekomendasi stimulasi di rumah</h2>
                <div class="reco-list">
                    <div class="reco-item">
                        <span class="num">01</span>
                        <p><b style="color:var(--ink)">Perluas satu kata menjadi dua.</b> Saat anak berkata “susu”,
                            jawab “mau susu” dan tunggu 5 detik agar ia menirukan.</p>
                    </div>
                    <div class="reco-item">
                        <span class="num">02</span>
                        <p><b style="color:var(--ink)">Batasi screen time menjadi &lt; 1 jam.</b> Ganti dengan
                            permainan bergantian yang memaksa pertukaran suara.</p>
                    </div>
                    <div class="reco-item">
                        <span class="num">03</span>
                        <p><b style="color:var(--ink)">Bacakan buku bergambar 10 menit/hari.</b> Beri nama benda dan
                            tunggu respons, jangan langsung menjawab sendiri.</p>
                    </div>
                </div>
            </div>

            <div class="hasil-rail">
                <div class="flag-card">
                    <div class="head"><span class="icon" aria-hidden="true">!</span><span>Flag rujukan — Jalur
                            B</span></div>
                    <p>4 dari 6 indikator klaster penyerta terpenuhi (kontak mata terbatas, permainan berulang,
                        respons nama). Pola ini menyerupai indikator awal kondisi lain di luar ranah bicara–bahasa.
                    </p>
                    <div class="note"><b>Bukan diagnosis.</b> Jalur B hanya menyarankan asesmen lanjutan oleh
                        psikolog anak.</div>
                </div>

                <div class="action-card">
                    <button type="button" class="primary">Jadwalkan konsultasi</button>
                    <button type="button">Unduh ringkasan (PDF)</button>
                    <button type="button">Bagikan ke psikolog</button>
                </div>

                <div class="summary-card">
                    <div class="label">RINGKASAN PERHITUNGAN</div>
                    <div class="row"><span>Gejala terjawab</span><span>24 / 24</span></div>
                    <div class="row"><span>Aturan terpicu</span><span>7 aturan</span></div>
                    <div class="row"><span>Defuzzifikasi (centroid)</span><span>63,4</span></div>
                    <div class="row"><span>CF gabungan</span><span>0,78</span></div>
                    <a href="{{ route('riwayat') }}">Lihat riwayat skrining &rarr;</a>
                </div>

                <p class="disclaimer">Ampira adalah alat skrining awal. Keputusan klinis tetap berada pada tenaga
                    profesional.</p>
            </div>
        </div>
    </div>

</body>

</html>
