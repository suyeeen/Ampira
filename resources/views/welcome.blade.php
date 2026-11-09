<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Ampira — Skrining Dini Speech Delay Anak</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg: #F5F6FB;
            --bg-deep: #0B0D24;
            --bg-deep-2: #12153A;
            --ink: #12132B;
            --ink-soft: #4A4C6A;
            --line: #E2E3EF;
            --primary: #4338CA;
            --primary-soft: #EEECFB;
            --accent: #22D3C4;
            --accent-2: #A78BFA;
            --warm: #FF8A65;
            --white: #FFFFFF;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color-scheme: light;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --bg: #F5F6FB;
                --ink: #12132B;
            }
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: env(safe-area-inset-top, 0px);
        }

        body {
            background: var(--bg);
            color: var(--ink);
            padding-top: env(safe-area-inset-top, 0px);
            padding-bottom: env(safe-area-inset-bottom, 0px);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        img,
        canvas,
        svg {
            max-width: 100%;
            display: block;
        }

        .wrap {
            max-width: 1120px;
            margin: 0 auto;
            padding-inline: 24px;
        }

        h1,
        h2,
        h3 {
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.01em;
            line-height: 1.08;
        }

        a {
            color: inherit;
        }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(0 0 0 0);
        }

        /* ---------- NAV ---------- */
        nav {
            position: sticky;
            top: 0;
            z-index: 50;
            padding: max(14px, env(safe-area-inset-top)) 0 14px;
            background: rgba(245, 246, 251, 0.78);
            backdrop-filter: blur(10px);
            border-bottom: 0.5px solid var(--line);
        }

        nav .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 9px;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            font-size: 17px;
        }

        .brand-mark {
            width: 26px;
            height: 26px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            position: relative;
            flex: none;
        }

        .brand-mark::after {
            content: "";
            position: absolute;
            inset: 7px;
            border-radius: 3px;
            background: var(--white);
            opacity: 0.9;
        }

        .nav-links {
            display: flex;
            gap: 28px;
            font-size: 14.5px;
            color: var(--ink-soft);
        }

        .nav-links a {
            text-decoration: none;
            transition: color .2s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-cta {
            font-size: 14px;
            font-weight: 600;
            color: var(--white);
            background: var(--ink);
            padding: 9px 18px;
            border-radius: 100px;
            text-decoration: none;
            white-space: nowrap;
        }

        @media (max-width:720px) {
            .nav-links {
                display: none;
            }
        }

        /* ---------- HERO ---------- */
        .hero {
            position: relative;
            overflow: hidden;
            background: radial-gradient(120% 140% at 15% -10%, var(--bg-deep-2), var(--bg-deep) 65%);
            color: var(--white);
            padding: 76px 0 0;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 40px;
            align-items: center;
            padding-bottom: 36px;
        }

        @media (max-width:860px) {
            .hero-grid {
                grid-template-columns: 1fr;
                text-align: left;
            }
        }

        .eyebrow-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12.5px;
            color: #C9CCEE;
            background: rgba(255, 255, 255, 0.06);
            border: 0.5px solid rgba(255, 255, 255, 0.14);
            padding: 6px 13px 6px 8px;
            border-radius: 100px;
            margin-bottom: 22px;
        }

        .eyebrow-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 8px var(--accent);
        }

        .hero h1 {
            font-size: clamp(34px, 5vw, 52px);
            font-weight: 600;
            color: var(--white);
        }

        .hero h1 em {
            font-style: normal;
            background: linear-gradient(90deg, var(--accent), var(--accent-2));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero p.lead {
            margin-top: 20px;
            font-size: 16.5px;
            line-height: 1.7;
            color: #B9BCDB;
            max-width: 44ch;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            margin-top: 32px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--white);
            color: var(--bg-deep);
            font-weight: 600;
            font-size: 15px;
            padding: 13px 24px;
            border-radius: 100px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: transform .2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        .btn-ghost {
            color: #DEDFF5;
            font-weight: 500;
            font-size: 15px;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 100px;
            border: 0.5px solid rgba(255, 255, 255, 0.22);
            transition: border-color .2s;
        }

        .btn-ghost:hover {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .wave-stage {
            position: relative;
            height: 340px;
            transform-origin: center top;
            will-change: transform;
        }

        canvas#wave {
            width: 100%;
            height: 100%;
        }

        .hero-strip {
            border-top: 0.5px solid rgba(255, 255, 255, 0.1);
            padding: 22px 0;
        }

        .hero-strip .wrap {
            display: flex;
            gap: 44px;
            flex-wrap: wrap;
            font-size: 13px;
            color: #9EA1C7;
        }

        .hero-strip b {
            color: var(--white);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            display: block;
            font-weight: 600;
        }

        .strip-item {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .strip-item.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ---------- REVEAL ---------- */
        .reveal {
            clip-path: inset(0 100% 0 0);
            opacity: 0;
            transition: clip-path 0.9s cubic-bezier(.16, .9, .28, 1), opacity 0.5s ease;
        }

        .reveal.from-right {
            clip-path: inset(0 0 0 100%);
        }

        .reveal.is-visible {
            clip-path: inset(0 0 0 0);
            opacity: 1;
        }

        /* ---------- SECTION SHELLS ---------- */
        section {
            padding: 96px 0;
        }

        .kicker {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 14px;
        }

        .section-head {
            max-width: 640px;
            margin-bottom: 56px;
        }

        .section-head h2 {
            font-size: clamp(26px, 3.4vw, 36px);
            font-weight: 600;
        }

        .section-head p {
            margin-top: 14px;
            font-size: 16px;
            line-height: 1.7;
            color: var(--ink-soft);
        }

        /* ---------- WHY ---------- */
        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--line);
            border: 0.5px solid var(--line);
            border-radius: 20px;
            overflow: hidden;
        }

        @media (max-width:760px) {
            .why-grid {
                grid-template-columns: 1fr;
            }
        }

        .why-card {
            background: var(--white);
            padding: 34px 30px;
        }

        .why-num {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 15px;
            color: var(--accent-2);
            font-weight: 600;
            margin-bottom: 18px;
        }

        .why-card h3 {
            font-size: 19px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .why-card p {
            font-size: 14.5px;
            line-height: 1.65;
            color: var(--ink-soft);
        }

        /* ---------- HOW ---------- */
        .how {
            background: var(--white);
            border-radius: 28px;
            padding: 64px 8px;
        }

        .how-inner {
            max-width: 1040px;
            margin: 0 auto;
            padding-inline: 16px;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 36px;
            margin-top: 20px;
            position: relative;
        }

        @media (max-width:760px) {
            .steps {
                grid-template-columns: 1fr;
            }
        }

        .step {
            position: relative;
            padding-top: 8px;
        }

        /* Stagger the reveal of the three steps instead of all firing at once */
        .steps .step:nth-child(1) { transition-delay: 0s; }
        .steps .step:nth-child(2) { transition-delay: 0.25s; }
        .steps .step:nth-child(3) { transition-delay: 0.5s; }

        .step-ring {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-soft);
            color: var(--primary);
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 600;
            font-size: 17px;
            margin-bottom: 22px;
        }

        .step h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 9px;
        }

        .step p {
            font-size: 14.5px;
            color: var(--ink-soft);
            line-height: 1.65;
        }

        /* ---------- TRUST ---------- */
        .trust {
            background: linear-gradient(180deg, #F0EFFC, var(--bg));
            border-radius: 28px;
            padding: 58px 40px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 40px;
            align-items: center;
        }

        @media (max-width:800px) {
            .trust {
                grid-template-columns: 1fr;
                padding: 40px 24px;
            }
        }

        .trust h2 {
            font-size: clamp(24px, 3vw, 30px);
            font-weight: 600;
            margin-bottom: 16px;
        }

        .trust p {
            font-size: 15.5px;
            line-height: 1.75;
            color: var(--ink-soft);
        }

        .trust-badges {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .badge {
            background: var(--white);
            border: 0.5px solid var(--line);
            border-radius: 14px;
            padding: 16px 20px;
            font-size: 14px;
            color: var(--ink-soft);
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .badge b {
            display: block;
            color: var(--ink);
            font-size: 14.5px;
            margin-bottom: 2px;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
            margin-top: 5px;
            flex: none;
        }

        /* ---------- CTA ---------- */
        .cta {
            background: var(--bg-deep);
            color: var(--white);
            border-radius: 28px;
            padding: 72px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: "";
            position: absolute;
            inset: -40% -10% auto -10%;
            height: 340px;
            background: radial-gradient(closest-side, rgba(167, 139, 250, 0.35), transparent 70%);
            pointer-events: none;
        }

        .cta h2 {
            font-size: clamp(26px, 3.6vw, 38px);
            font-weight: 600;
            margin-bottom: 16px;
            position: relative;
        }

        .cta p {
            color: #B9BCDB;
            font-size: 16px;
            max-width: 52ch;
            margin: 0 auto 30px;
            position: relative;
            line-height: 1.7;
        }

        footer {
            padding: 44px 0 calc(44px + env(safe-area-inset-bottom, 0px));
            border-top: 0.5px solid var(--line);
        }

        footer .wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
            font-size: 13.5px;
            color: var(--ink-soft);
        }

        @media (prefers-reduced-motion: reduce) {
            .reveal {
                clip-path: none !important;
                opacity: 1 !important;
                transition: none !important;
            }

            .strip-item {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }

            .wave-stage {
                transform: none !important;
            }

            html {
                scroll-behavior: auto;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="wrap row">
            <div class="brand"><span class="brand-mark" aria-hidden="true"></span>Ampira</div>
            <div class="nav-links">
                <a href="#kenapa">Kenapa penting</a>
                <a href="#cara-kerja">Cara kerja</a>
                <a href="#tentang">Tentang</a>
            </div>
            <a class="nav-cta" href="{{ route('masuk') }}">Mulai skrining</a>
        </div>
    </nav>

    <header class="hero">
        <div class="wrap hero-grid">
            <div>
                <span class="eyebrow-pill"><span class="eyebrow-dot" aria-hidden="true"></span>Skrining dini, langkah
                    pertama yang tepat</span>
                <h1>Kenali tanda <em>speech delay</em> pada anak, sebelum terlambat menindaklanjuti.</h1>
                <p class="lead">Ampira membantu orang tua memahami pola bicara dan bahasa anak lewat kuesioner
                    sederhana, diolah dengan pendekatan Fuzzy Logic dan Certainty Factor yang dirancang bersama psikolog
                    anak.</p>
                <div class="hero-actions">
                    <a class="btn-primary" href="{{ route('masuk') }}">Mulai skrining</a>
                    <a class="btn-ghost" href="#kenapa">Pelajari lebih dulu</a>
                </div>
            </div>
            <div class="wave-stage" aria-hidden="true"><canvas id="wave"></canvas></div>
        </div>
        <div class="hero-strip">
            <div class="wrap">
                <div class="strip-item"><b><span class="count-up" data-target="3">0</span> langkah</b>dari kuesioner ke hasil</div>
                <div class="strip-item"><b>Rendah / Sedang / Tinggi</b>kategori tingkat indikasi</div>
                <div class="strip-item"><b>Berbasis web</b>diakses dari perangkat apa pun</div>
            </div>
        </div>
    </header>

    <section id="kenapa">
        <div class="wrap">
            <div class="section-head reveal">
                <p class="kicker">Kenapa ini penting</p>
                <h2>Semakin awal dikenali, semakin awal bisa ditindaklanjuti.</h2>
                <p>Banyak orang tua ragu apakah keterlambatan bicara anaknya perlu dikhawatirkan atau akan hilang dengan
                    sendirinya. Ampira membantu memberi gambaran awal yang lebih terarah, bukan menggantikan pemeriksaan
                    profesional.</p>
            </div>

            <div class="why-grid">
                <div class="why-card reveal">
                    <div class="why-num">01</div>
                    <h3>Mudah diakses</h3>
                    <p>Cukup isi kuesioner perilaku bicara anak dari rumah, tanpa perlu menunggu jadwal konsultasi untuk
                        gambaran awal.</p>
                </div>
                <div class="why-card reveal">
                    <div class="why-num">02</div>
                    <h3>Berbasis pengetahuan pakar</h3>
                    <p>Gejala, bobot, dan aturan penilaian disusun bersama psikolog anak, bukan asumsi teknis semata.
                    </p>
                </div>
                <div class="why-card reveal">
                    <div class="why-num">03</div>
                    <h3>Mengenali gejala penyerta</h3>
                    <p>Selain risiko speech delay, sistem turut menandai pola gejala yang sebaiknya dikonsultasikan
                        lebih lanjut ke tenaga profesional.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="cara-kerja">
        <div class="wrap">
            <div class="how">
                <div class="how-inner">
                    <div class="section-head reveal" style="margin-bottom:8px;">
                        <p class="kicker">Cara kerja</p>
                        <h2>Tiga langkah, dari jawaban orang tua ke hasil yang bisa ditindaklanjuti.</h2>
                    </div>
                    <div class="steps">
                        <div class="step reveal">
                            <div class="step-ring">01</div>
                            <h3>Isi kuesioner</h3>
                            <p>Orang tua menjawab pertanyaan seputar perilaku bicara dan bahasa anak sehari-hari.</p>
                        </div>
                        <div class="step reveal">
                            <div class="step-ring">02</div>
                            <h3>Sistem menganalisis</h3>
                            <p>Jawaban diolah untuk menghitung tingkat indikasi, berdasarkan aturan yang tervalidasi
                                pakar.</p>
                        </div>
                        <div class="step reveal">
                            <div class="step-ring">03</div>
                            <h3>Terima hasil</h3>
                            <p>Kategori tingkat indikasi ditampilkan, lengkap dengan saran langkah selanjutnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang">
        <div class="wrap">
            <div class="trust reveal from-right">
                <div>
                    <h2>Dikembangkan sebagai tugas akhir, dibangun dengan pendekatan klinis.</h2>
                    <p>Ampira adalah sistem pakar hybrid Fuzzy Logic dan Certainty Factor, dikembangkan sebagai
                        penelitian tugas akhir di Politeknik Negeri Jember, dengan basis pengetahuan yang disusun
                        bersama psikolog anak.</p>
                </div>
                <div class="trust-badges">
                    <div class="badge"><span class="badge-dot" aria-hidden="true"></span>
                        <div><b>Politeknik Negeri Jember</b>Program Studi Teknik Informatika</div>
                    </div>
                    <div class="badge"><span class="badge-dot" aria-hidden="true"></span>
                        <div><b>Disusun bersama psikolog anak</b>Basis pengetahuan tervalidasi klinis</div>
                    </div>
                    <div class="badge"><span class="badge-dot" aria-hidden="true"></span>
                        <div><b>Bukan alat diagnosis</b>Hasil skrining awal, tetap perlu konsultasi profesional</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="wrap">
            <div class="cta reveal">
                <h2>Mulai dengan memahami, bukan menebak.</h2>
                <p>Skrining ini langkah pertama yang sederhana untuk orang tua yang ingin gambaran awal lebih terarah
                    soal tumbuh kembang bicara anaknya.</p>
                <a class="btn-primary" href="{{ route('masuk') }}">Mulai skrining</a>
            </div>
        </div>
    </section>

    <footer>
        <div class="wrap">
            <div class="brand"><span class="brand-mark" aria-hidden="true"></span>Ampira</div>
            <div>Tugas akhir — Teknik Informatika, Politeknik Negeri Jember, 2026</div>
        </div>
    </footer>

    <script>
        const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Scroll reveal
        const els = document.querySelectorAll('.reveal');
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); }
            });
            // threshold 0 karena .reveal pakai clip-path: intersection ratio Chromium
            // dihitung dari area yang sudah di-clip (selalu 0), jadi threshold > 0
            // tidak akan pernah terpenuhi dan is-visible tidak pernah ditambahkan.
        }, { threshold: 0, rootMargin: '0px 0px -12% 0px' });
        // Delay arming the observer briefly: elements already in view on load (hero-strip,
        // "kenapa" section on tall/short viewports) would otherwise reveal before the user's
        // eyes settle on the page, making the animation invisible in practice.
        setTimeout(() => els.forEach(el => io.observe(el)), 250);

        // Hero-strip stats — fade in on first view, with a count-up for numeric values
        function animateCount(el, target, duration = 900) {
            const start = performance.now();
            function tick(now) {
                const p = Math.min(1, (now - start) / duration);
                const eased = 1 - Math.pow(1 - p, 3);
                el.textContent = Math.round(eased * target);
                if (p < 1) requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
        }
        const stripItems = document.querySelectorAll('.strip-item');
        const stripIo = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (!e.isIntersecting) return;
                e.target.classList.add('is-visible');
                const countEl = e.target.querySelector('.count-up');
                if (countEl) {
                    const target = Number(countEl.dataset.target);
                    reduce ? (countEl.textContent = target) : animateCount(countEl, target);
                }
                stripIo.unobserve(e.target);
            });
        }, { threshold: 0, rootMargin: '0px 0px -10% 0px' });
        stripItems.forEach((el, i) => {
            el.style.transitionDelay = reduce ? '0ms' : `${i * 120}ms`;
        });
        setTimeout(() => stripItems.forEach(el => stripIo.observe(el)), 250);

        // Waveform hero animation — bars pulsing like a voice waveform
        const canvas = document.getElementById('wave');
        const ctx = canvas.getContext('2d');
        let W, H, bars;
        function resize() {
            const rect = canvas.parentElement.getBoundingClientRect();
            W = canvas.width = rect.width * devicePixelRatio;
            H = canvas.height = rect.height * devicePixelRatio;
            canvas.style.width = rect.width + 'px';
            canvas.style.height = rect.height + 'px';
            const count = Math.max(24, Math.floor(rect.width / 14));
            bars = Array.from({ length: count }, (_, i) => ({
                phase: Math.random() * Math.PI * 2,
                speed: 0.02 + Math.random() * 0.03,
                base: 0.15 + Math.random() * 0.15
            }));
        }
        window.addEventListener('resize', resize);
        resize();

        // Waveform scroll parallax — shrinks and drifts up as the hero scrolls past,
        // layered on top of the idle bar animation rather than replacing it
        const heroEl = document.querySelector('.hero');
        const waveStage = document.querySelector('.wave-stage');
        let waveTicking = false;
        function updateWaveParallax() {
            waveTicking = false;
            if (reduce) return;
            const rect = heroEl.getBoundingClientRect();
            const progress = Math.min(1, Math.max(0, -rect.top / rect.height));
            waveStage.style.transform = `translateY(${-progress * 110}px) scale(${1 - progress * 0.4})`;
        }
        window.addEventListener('scroll', () => {
            if (!waveTicking) { waveTicking = true; requestAnimationFrame(updateWaveParallax); }
        }, { passive: true });
        updateWaveParallax();

        let t = 0;
        function draw() {
            ctx.clearRect(0, 0, W, H);
            const n = bars.length;
            const gap = W / n;
            const cx = W / 2, cy = H / 2;
            bars.forEach((b, i) => {
                const d = Math.abs(i - n / 2) / (n / 2);
                const amp = (0.35 + 0.65 * Math.sin((1 - d) * Math.PI / 2));
                const val = b.base + Math.sin(t * b.speed * 40 + b.phase) * 0.22 * amp + 0.18 * amp;
                const h = Math.max(H * 0.04, H * 0.42 * Math.max(0.05, val));
                const x = i * gap + gap * 0.28;
                const w = gap * 0.44;
                const grad = ctx.createLinearGradient(0, cy - h, 0, cy + h);
                grad.addColorStop(0, 'rgba(34,211,196,0.95)');
                grad.addColorStop(1, 'rgba(167,139,250,0.85)');
                ctx.fillStyle = grad;
                const r = w / 2;
                ctx.beginPath();
                ctx.moveTo(x, cy - h + r);
                ctx.arcTo(x, cy - h, x + w, cy - h, r);
                ctx.arcTo(x + w, cy - h, x + w, cy + h, r);
                ctx.arcTo(x + w, cy + h, x, cy + h, r);
                ctx.arcTo(x, cy + h, x, cy - h, r);
                ctx.closePath();
                ctx.fill();
            });
            if (!reduce) { t += 0.016; requestAnimationFrame(draw); }
        }
        draw();
    </script>

</body>

</html>
