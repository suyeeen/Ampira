<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Ampira — Skrining dini keterlambatan bicara anak</title>
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
            --accent: #F0A94E;
            --ink: #16212B;
            --ink-muted: #4B5A66;
            --ink-faint: #7E8C96;
            --line: #D9E1E6;
            --line-soft: #E6ECEF;
            --input-border: #C5D1D8;
            --bg: #F6F8F9;
            --white: #FFFFFF;
            --warn-bg: #FFF4E0;
            --warn-border: #F0D3A3;
            --warn-text: #5C3200;
            --warn-icon: #8A4B00;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--ink);
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            overflow-x: hidden;
        }

        a {
            color: var(--primary);
        }

        a:hover {
            color: var(--primary-dark);
        }

        .container {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ---------- SCROLL PROGRESS ---------- */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0%;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            z-index: 1000;
            transition: width .1s linear;
        }

        /* ---------- NAV ---------- */
        .nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: transparent;
            transition: background .25s ease, box-shadow .25s ease, border-color .25s ease;
            border-bottom: 1px solid transparent;
        }

        .nav.is-scrolled {
            background: rgba(246, 248, 249, .92);
            backdrop-filter: blur(10px);
            border-color: var(--line);
            box-shadow: 0 1px 0 rgba(22, 33, 43, .02);
        }

        .nav .container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-top: 16px;
            padding-bottom: 16px;
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
            flex: none;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -.01em;
        }

        .nav-links {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            padding: 10px 14px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--ink-muted);
            font-weight: 500;
            font-size: 15px;
            position: relative;
        }

        .nav-link:hover {
            color: var(--ink);
        }

        .nav-link.is-active {
            color: var(--primary-dark);
            font-weight: 600;
        }

        .btn-outline-nav {
            padding: 10px 18px;
            border-radius: 10px;
            border: 1px solid var(--input-border);
            text-decoration: none;
            color: var(--ink);
            font-weight: 600;
            font-size: 15px;
            background: var(--white);
        }

        /* ---------- HERO ---------- */
        .hero {
            position: relative;
            overflow: hidden;
            padding-top: 28px;
        }

        .hero-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: .35;
            pointer-events: none;
            z-index: 0;
        }

        .hero-blob.b1 {
            width: 420px;
            height: 420px;
            background: var(--primary-soft);
            top: -160px;
            right: -80px;
            animation: drift1 16s ease-in-out infinite;
        }

        .hero-blob.b2 {
            width: 320px;
            height: 320px;
            background: #FCE7C8;
            bottom: -120px;
            left: -60px;
            animation: drift2 18s ease-in-out infinite;
        }

        @keyframes drift1 {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(-30px, 30px) scale(1.08);
            }
        }

        @keyframes drift2 {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(25px, -20px) scale(1.06);
            }
        }

        .hero-inner {
            position: relative;
            z-index: 1;
            max-width: 1160px;
            margin: 0 auto;
            padding: 56px 24px 72px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 48px;
        }

        .hero-copy {
            flex: 1 1 460px;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .eyebrow {
            align-self: flex-start;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 14px 7px 10px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary-dark);
            font-size: 13px;
            font-weight: 600;
        }

        .eyebrow .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--primary);
            animation: pulse 1.8s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .4;
                transform: scale(.7);
            }
        }

        .hero-copy h1 {
            margin: 0;
            font-size: 50px;
            line-height: 1.08;
            font-weight: 800;
            letter-spacing: -.02em;
        }

        .hero-copy h1 em {
            font-style: normal;
            color: var(--primary);
        }

        .hero-copy p.lead {
            margin: 0;
            font-size: 18px;
            line-height: 1.6;
            color: var(--ink-muted);
            max-width: 540px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-primary,
        .btn-outline {
            padding: 14px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            border: 0;
            cursor: pointer;
            font-family: inherit;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
            box-shadow: 0 10px 24px -10px rgba(14, 110, 102, .55);
            transition: transform .15s ease, box-shadow .15s ease, background .15s ease;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            color: var(--white);
            transform: translateY(-1px);
            box-shadow: 0 14px 28px -10px rgba(14, 110, 102, .6);
        }

        .btn-outline {
            border: 1px solid var(--input-border);
            background: var(--white);
            color: var(--ink);
            font-weight: 600;
        }

        .btn-outline:hover {
            color: var(--ink);
            border-color: var(--ink-faint);
        }

        .hero-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 28px;
            padding-top: 8px;
        }

        .hero-stats .stat b {
            display: block;
            font-size: 26px;
            font-weight: 800;
            color: var(--ink);
            font-variant-numeric: tabular-nums;
        }

        .hero-stats .stat span {
            font-size: 13px;
            color: var(--ink-faint);
        }

        /* ---------- HERO DEMO CARD ---------- */
        .hero-preview-wrap {
            flex: 1 1 380px;
            min-width: 0;
            display: flex;
            justify-content: center;
        }

        .hero-preview {
            width: 100%;
            max-width: 420px;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 26px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            box-shadow: 0 30px 60px -30px rgba(22, 33, 43, .25);
        }

        .hero-preview .meta {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: var(--ink-muted);
            font-weight: 600;
        }

        .progress-track {
            height: 6px;
            border-radius: 999px;
            background: var(--line-soft);
            overflow: hidden;
        }

        .progress-fill {
            height: 6px;
            border-radius: 999px;
            background: var(--primary);
            width: 20%;
            transition: width .5s cubic-bezier(.2, .8, .2, 1);
        }

        .hero-preview p.question {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            line-height: 1.4;
            min-height: 50px;
        }

        .hero-options {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .hero-options button {
            text-align: left;
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid var(--line);
            font-size: 15px;
            font-family: inherit;
            background: var(--white);
            color: var(--ink);
            cursor: pointer;
            transition: border-color .15s ease, background .15s ease, transform .1s ease;
        }

        .hero-options button:hover {
            border-color: var(--primary);
        }

        .hero-options button.picked {
            border: 2px solid var(--primary);
            background: var(--primary-soft);
            font-weight: 600;
            padding: 11px 15px;
        }

        .hero-preview-foot {
            font-size: 12.5px;
            color: var(--ink-faint);
            text-align: center;
        }

        /* ---------- REVEAL ---------- */
        .reveal {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity .6s ease, transform .6s cubic-bezier(.2, .8, .2, 1);
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ---------- SECTION SHELLS ---------- */
        section.block {
            background: var(--white);
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
        }

        .block-inner {
            max-width: 1160px;
            margin: 0 auto;
            padding: 80px 24px;
        }

        .block-head {
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-width: 640px;
            margin-bottom: 48px;
        }

        .kicker {
            font-size: 13px;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .block-head h2 {
            margin: 0;
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -.01em;
        }

        .block-head p {
            margin: 0;
            font-size: 17px;
            line-height: 1.6;
            color: var(--ink-muted);
        }

        /* ---------- STEPS TIMELINE ---------- */
        .steps {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .step {
            position: relative;
            display: flex;
            gap: 24px;
            padding-bottom: 44px;
        }

        .step:last-child {
            padding-bottom: 0;
        }

        .step-rail {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: none;
        }

        .step-num {
            width: 44px;
            height: 44px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 16px;
            flex: none;
            transition: background .3s ease, color .3s ease;
            z-index: 1;
        }

        .step.is-visible .step-num {
            background: var(--primary);
            color: var(--white);
        }

        .step-line {
            flex: 1;
            width: 2px;
            background: var(--line);
            margin-top: 4px;
            position: relative;
            overflow: hidden;
        }

        .step-line span {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0%;
            background: var(--primary);
            transition: height .8s cubic-bezier(.2, .8, .2, 1);
        }

        .step.is-visible .step-line span {
            height: 100%;
        }

        .step-body {
            padding-top: 6px;
        }

        .step-body h3 {
            margin: 0 0 8px;
            font-size: 20px;
            font-weight: 700;
        }

        .step-body p {
            margin: 0;
            font-size: 15.5px;
            line-height: 1.6;
            color: var(--ink-muted);
            max-width: 46ch;
        }

        /* ---------- BENEFITS ---------- */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .benefit-card {
            padding: 26px;
            background: var(--bg);
            border: 1px solid var(--line-soft);
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .benefit-card:hover {
            transform: translateY(-3px);
            border-color: var(--primary);
            box-shadow: 0 16px 32px -20px rgba(22, 33, 43, .25);
        }

        .benefit-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--primary-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .benefit-card strong {
            font-size: 16.5px;
        }

        .benefit-card span {
            font-size: 14.5px;
            color: var(--ink-muted);
            line-height: 1.55;
        }

        /* ---------- WARNING ---------- */
        .warning-section {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 24px 80px;
        }

        .warning-box {
            padding: 28px 32px;
            border-radius: 16px;
            background: var(--warn-bg);
            border: 1px solid var(--warn-border);
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: flex-start;
        }

        .warning-box strong {
            font-size: 17px;
            color: var(--warn-text);
        }

        .warning-box p {
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
            color: var(--warn-text);
        }

        /* ---------- ABOUT / METHOD FLOW ---------- */
        .about-section {
            background: var(--white);
            border-top: 1px solid var(--line);
        }

        .about-inner {
            max-width: 1160px;
            margin: 0 auto;
            padding: 80px 24px;
            display: flex;
            flex-wrap: wrap;
            gap: 56px;
        }

        .about-copy {
            flex: 1 1 360px;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .about-copy p {
            margin: 0;
            font-size: 16px;
            line-height: 1.7;
            color: var(--ink-muted);
        }

        .method-flow {
            flex: 1 1 420px;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .method-step {
            display: flex;
            gap: 18px;
            align-items: flex-start;
        }

        .method-step .dot-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: none;
        }

        .method-step .dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--primary);
            flex: none;
            transform: scale(0);
            transition: transform .3s ease;
        }

        .method-step.is-visible .dot {
            transform: scale(1);
        }

        .method-step .dot-line {
            width: 2px;
            flex: 1;
            background: var(--line);
            margin-top: 4px;
            min-height: 36px;
        }

        .method-card {
            flex: 1;
            padding: 18px 20px;
            background: var(--bg);
            border: 1px solid var(--line-soft);
            border-radius: 14px;
            margin-bottom: 24px;
        }

        .method-card strong {
            display: block;
            font-size: 15.5px;
            margin-bottom: 4px;
        }

        .method-card span {
            font-size: 14px;
            color: var(--ink-muted);
            line-height: 1.55;
        }

        /* ---------- CTA ---------- */
        .cta-band {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        }

        .cta-band::before,
        .cta-band::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08);
        }

        .cta-band::before {
            width: 260px;
            height: 260px;
            top: -100px;
            left: 10%;
        }

        .cta-band::after {
            width: 180px;
            height: 180px;
            bottom: -80px;
            right: 12%;
        }

        .cta-band-inner {
            position: relative;
            z-index: 1;
            max-width: 1160px;
            margin: 0 auto;
            padding: 64px 24px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .cta-copy {
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1 1 420px;
            min-width: 0;
        }

        .cta-copy h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
            color: var(--white);
        }

        .cta-copy p {
            margin: 0;
            font-size: 16px;
            color: var(--primary-soft);
        }

        .cta-band .btn-primary {
            background: var(--white);
            color: var(--primary-dark);
            box-shadow: 0 10px 24px -10px rgba(0, 0, 0, .35);
        }

        .cta-band .btn-primary:hover {
            background: var(--bg);
            color: var(--primary-dark);
        }

        /* ---------- FLOATING CTA ---------- */
        .floating-cta {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 90;
            opacity: 0;
            transform: translateY(16px) scale(.96);
            pointer-events: none;
            transition: opacity .25s ease, transform .25s ease;
        }

        .floating-cta.is-shown {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .floating-cta a {
            box-shadow: 0 16px 32px -12px rgba(14, 110, 102, .55);
        }

        footer {
            max-width: 1160px;
            margin: 0 auto;
            padding: 32px 24px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 12px;
            font-size: 14px;
            color: var(--ink-muted);
        }

        @media (max-width: 900px) {
            .benefits-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .hero-copy h1 {
                font-size: 34px;
            }

            .hero-stats {
                gap: 20px;
            }

            .block-inner,
            .about-inner {
                padding-left: 20px;
                padding-right: 20px;
            }

            .floating-cta {
                right: 16px;
                bottom: 16px;
            }

            .floating-cta a span {
                display: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            html,
            .reveal,
            .step-line span,
            .method-step .dot,
            .hero-blob {
                transition: none !important;
                animation: none !important;
            }

            .reveal {
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>
</head>

<body>

    <div class="scroll-progress" id="scrollProgress"></div>

    <nav class="nav" id="nav">
        <div class="container">
            <a href="#" class="brand">
                <span class="brand-mark" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                        stroke-linecap="round">
                        <path d="M4 12h2M8 8v8M12 5v14M16 8v8M20 12h0" />
                    </svg>
                </span>
                <span class="brand-name">Ampira</span>
            </a>
            <div class="nav-links" id="navLinks">
                <a href="#cara-kerja" class="nav-link" data-section="cara-kerja">Cara kerja</a>
                <a href="#manfaat" class="nav-link" data-section="manfaat">Manfaat</a>
                <a href="#tentang" class="nav-link" data-section="tentang">Tentang</a>
                <a href="{{ route('masuk') }}" class="btn-outline-nav">Masuk</a>
            </div>
        </div>
    </nav>

    <header class="hero">
        <span class="hero-blob b1" aria-hidden="true"></span>
        <span class="hero-blob b2" aria-hidden="true"></span>
        <div class="hero-inner">
            <div class="hero-copy">
                <span class="eyebrow"><span class="dot" aria-hidden="true"></span>Skrining awal, bukan diagnosis</span>
                <h1>Kenali tanda <em>keterlambatan bicara</em> anak lebih awal</h1>
                <p class="lead">Jawab pertanyaan singkat tentang kebiasaan bicara anak Anda. Ampira menghitung
                    tingkat keyakinan indikasi keterlambatan bicara dan memberi saran langkah berikutnya.</p>
                <div class="hero-actions">
                    <a href="{{ route('masuk') }}" class="btn-primary">Mulai skrining</a>
                    <a href="#cara-kerja" class="btn-outline">Lihat cara kerjanya</a>
                </div>
                <div class="hero-stats">
                    <div class="stat"><b data-count-to="3">0</b><span>langkah skrining</span></div>
                    <div class="stat"><b data-count-to="10">0</b><span>menit mengisi</span></div>
                    <div class="stat"><b data-count-to="17">0</b><span>pertanyaan perilaku</span></div>
                </div>
            </div>
            <div class="hero-preview-wrap">
                <div class="hero-preview" id="heroDemo">
                    <div class="meta"><span id="demoMeta">Pertanyaan 1 dari 3</span><span>Contoh interaktif</span>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" id="demoProgress"></div>
                    </div>
                    <p class="question" id="demoQuestion"></p>
                    <div class="hero-options" id="demoOptions"></div>
                    <p class="hero-preview-foot">Coba klik salah satu pilihan — ini contoh interaktif, bukan
                        kuesioner sesungguhnya.</p>
                </div>
            </div>
        </div>
    </header>

    <section id="cara-kerja" class="block">
        <div class="block-inner">
            <div class="block-head reveal">
                <span class="kicker">Cara kerja</span>
                <h2>Tiga langkah, sekitar 10 menit</h2>
                <p>Anda cukup menjawab berdasarkan apa yang Anda amati sehari-hari. Tidak ada jawaban benar atau
                    salah.</p>
            </div>
            <div class="steps">
                <div class="step">
                    <div class="step-rail">
                        <span class="step-num">1</span>
                        <span class="step-line"><span></span></span>
                    </div>
                    <div class="step-body">
                        <h3>Isi data anak</h3>
                        <p>Nama, tanggal lahir, dan jenis kelamin. Usia anak menentukan pertanyaan yang muncul.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-rail">
                        <span class="step-num">2</span>
                        <span class="step-line"><span></span></span>
                    </div>
                    <div class="step-body">
                        <h3>Jawab pertanyaan</h3>
                        <p>Pilih seberapa sering perilaku itu terjadi: tidak pernah, jarang, kadang, sering, atau
                            selalu.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-rail">
                        <span class="step-num">3</span>
                    </div>
                    <div class="step-body">
                        <h3>Baca hasil dan saran</h3>
                        <p>Ampira menampilkan kategori indikasi, tingkat keyakinan, dan langkah yang sebaiknya Anda
                            ambil.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="manfaat" class="block">
        <div class="block-inner">
            <div class="block-head reveal">
                <span class="kicker">Manfaat</span>
                <h2>Yang Anda terima setelah skrining</h2>
                <p>Hasil ditulis dengan bahasa sehari-hari supaya mudah dipahami dan bisa Anda bawa saat
                    berkonsultasi.</p>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card reveal">
                    <span class="benefit-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5" />
                        </svg>
                    </span>
                    <strong>Kategori indikasi</strong>
                    <span>Rendah, sedang, atau tinggi, berdasarkan jawaban gejala inti bicara dan bahasa.</span>
                </div>
                <div class="benefit-card reveal">
                    <span class="benefit-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5" />
                        </svg>
                    </span>
                    <strong>Tingkat keyakinan sistem</strong>
                    <span>Persentase yang menunjukkan seberapa kuat jawaban Anda mengarah ke kategori tersebut.</span>
                </div>
                <div class="benefit-card reveal">
                    <span class="benefit-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5" />
                        </svg>
                    </span>
                    <strong>Catatan rujukan bila perlu</strong>
                    <span>Jika ada tanda di luar bicara dan bahasa, Ampira menyarankan pemeriksaan lanjutan ke
                        psikolog.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="warning-section">
        <div class="warning-box reveal">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#8A4B00" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex:none">
                <circle cx="12" cy="12" r="10" />
                <path d="M12 8v5M12 16h.01" />
            </svg>
            <div style="flex:1 1 400px;min-width:0;display:flex;flex-direction:column;gap:6px">
                <strong>Penting diketahui</strong>
                <p>Ampira adalah alat skrining awal. Hasilnya tidak menggantikan pemeriksaan oleh psikolog, dokter
                    anak, atau terapis wicara. Jika Anda khawatir dengan perkembangan bicara anak, konsultasikan
                    langsung dengan tenaga profesional.</p>
            </div>
        </div>
    </section>

    <section id="tentang" class="about-section">
        <div class="about-inner">
            <div class="about-copy reveal">
                <span class="kicker">Tentang Ampira</span>
                <h2 style="margin:0;font-size:34px;font-weight:800;letter-spacing:-.01em">Metode di baliknya</h2>
                <p>Ampira dikembangkan sebagai penelitian skripsi di Program Studi D4 Teknik Informatika,
                    Politeknik Negeri Jember.</p>
                <p>Sistem ini menggabungkan metode Fuzzy Logic dan Certainty Factor. Fuzzy Logic membaca jawaban
                    yang tidak hitam-putih, seperti &ldquo;kadang&rdquo; atau &ldquo;sering&rdquo;. Certainty Factor
                    menghitung seberapa yakin jawaban tersebut mengarah pada indikasi keterlambatan bicara.</p>
                <p>Daftar gejala dan bobot keyakinannya disusun bersama psikolog anak.</p>
            </div>
            <div class="method-flow">
                <div class="method-step reveal">
                    <div class="dot-col">
                        <span class="dot"></span>
                        <span class="dot-line"></span>
                    </div>
                    <div class="method-card">
                        <strong>Jawaban Anda</strong>
                        <span>Setiap pertanyaan dijawab dengan skala: tidak pernah, jarang, kadang, sering, atau
                            selalu.</span>
                    </div>
                </div>
                <div class="method-step reveal">
                    <div class="dot-col">
                        <span class="dot"></span>
                        <span class="dot-line"></span>
                    </div>
                    <div class="method-card">
                        <strong>Fuzzy Logic</strong>
                        <span>Jawaban yang tidak hitam-putih diterjemahkan jadi derajat keanggotaan, bukan dibulatkan
                            kasar.</span>
                    </div>
                </div>
                <div class="method-step reveal">
                    <div class="dot-col">
                        <span class="dot"></span>
                        <span class="dot-line"></span>
                    </div>
                    <div class="method-card">
                        <strong>Certainty Factor</strong>
                        <span>Bobot keyakinan pakar digabungkan untuk menghitung seberapa kuat indikasinya.</span>
                    </div>
                </div>
                <div class="method-step reveal">
                    <div class="dot-col">
                        <span class="dot"></span>
                    </div>
                    <div class="method-card" style="margin-bottom:0">
                        <strong>Hasil &amp; saran</strong>
                        <span>Kategori indikasi dan langkah lanjutan ditampilkan dengan bahasa sehari-hari.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-band">
        <div class="cta-band-inner">
            <div class="cta-copy">
                <h2>Siap memulai skrining?</h2>
                <p>Gratis. Hasil tersimpan di akun Anda dan bisa dilihat kembali kapan saja.</p>
            </div>
            <a href="{{ route('masuk') }}" class="btn-primary">Mulai skrining</a>
        </div>
    </section>

    <footer>
        <span>&copy; 2026 Ampira &middot; Politeknik Negeri Jember</span>
        <span>Alat skrining awal, bukan alat diagnosis</span>
    </footer>

    <div class="floating-cta" id="floatingCta">
        <a href="{{ route('masuk') }}" class="btn-primary"><span>Mulai skrining</span>&rarr;</a>
    </div>

    <script>
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Scroll progress bar + nav scrolled state
        const scrollProgress = document.getElementById('scrollProgress');
        const nav = document.getElementById('nav');
        const floatingCta = document.getElementById('floatingCta');
        const heroHeight = () => document.querySelector('.hero').offsetHeight;
        const ctaBand = document.querySelector('.cta-band');

        function onScroll() {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            scrollProgress.style.width = (docHeight > 0 ? (scrollTop / docHeight) * 100 : 0) + '%';

            nav.classList.toggle('is-scrolled', scrollTop > 8);

            const pastHero = scrollTop > heroHeight() * 0.6;
            const ctaRect = ctaBand.getBoundingClientRect();
            const nearCta = ctaRect.top < window.innerHeight;
            floatingCta.classList.toggle('is-shown', pastHero && !nearCta);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        // Scroll-spy nav highlighting
        const sections = ['cara-kerja', 'manfaat', 'tentang'].map(id => document.getElementById(id)).filter(Boolean);
        const navLinks = document.querySelectorAll('.nav-link[data-section]');
        const spyIo = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                const link = document.querySelector(`.nav-link[data-section="${e.target.id}"]`);
                if (!link) return;
                if (e.isIntersecting) {
                    navLinks.forEach(l => l.classList.remove('is-active'));
                    link.classList.add('is-active');
                }
            });
        }, { threshold: 0, rootMargin: '-40% 0px -50% 0px' });
        sections.forEach(s => spyIo.observe(s));

        // Reveal on scroll (opacity + translateY, safe for IntersectionObserver ratio)
        const revealEls = document.querySelectorAll('.reveal, .step, .method-step');
        const revealIo = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('is-visible');
                    revealIo.unobserve(e.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -8% 0px' });
        setTimeout(() => revealEls.forEach(el => revealIo.observe(el)), 150);

        // Count-up stats
        function animateCount(el, target, duration = 1000) {
            const start = performance.now();
            function tick(now) {
                const p = Math.min(1, (now - start) / duration);
                const eased = 1 - Math.pow(1 - p, 3);
                el.textContent = Math.round(eased * target);
                if (p < 1) requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
        }
        const statEls = document.querySelectorAll('[data-count-to]');
        const statIo = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (!e.isIntersecting) return;
                const target = Number(e.target.dataset.countTo);
                reduceMotion ? (e.target.textContent = target) : animateCount(e.target, target);
                statIo.unobserve(e.target);
            });
        }, { threshold: 0 });
        setTimeout(() => statEls.forEach(el => statIo.observe(el)), 150);

        // Interactive hero demo card
        const demoData = [
            {
                q: 'Apakah anak berbicara lebih lambat daripada anak seumurannya?',
                opts: ['Tidak pernah', 'Jarang', 'Kadang', 'Sering', 'Selalu'],
                pick: 2,
            },
            {
                q: 'Apakah anak kesulitan memahami perkataan orang dewasa?',
                opts: ['Tidak pernah', 'Jarang', 'Kadang', 'Sering', 'Selalu'],
                pick: 1,
            },
            {
                q: 'Apakah anak kesulitan berteman atau ikut bermain bersama anak lain?',
                opts: ['Tidak pernah', 'Jarang', 'Kadang', 'Sering', 'Selalu'],
                pick: 0,
            },
        ];
        let demoIndex = 0;
        let demoTimer = null;
        const demoMeta = document.getElementById('demoMeta');
        const demoProgress = document.getElementById('demoProgress');
        const demoQuestion = document.getElementById('demoQuestion');
        const demoOptions = document.getElementById('demoOptions');

        function renderDemo(pickedOverride) {
            const d = demoData[demoIndex];
            demoMeta.textContent = `Pertanyaan ${demoIndex + 1} dari ${demoData.length}`;
            demoProgress.style.width = Math.round(((demoIndex + 1) / demoData.length) * 100) + '%';
            demoQuestion.textContent = d.q;
            demoOptions.innerHTML = '';
            const pickedIdx = pickedOverride ?? d.pick;
            d.opts.forEach((label, i) => {
                const btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = label;
                if (i === pickedIdx) btn.classList.add('picked');
                btn.addEventListener('click', () => {
                    clearTimeout(demoTimer);
                    renderDemo(i);
                    scheduleDemoAdvance(1800);
                });
                demoOptions.appendChild(btn);
            });
        }

        function scheduleDemoAdvance(delay = 3600) {
            clearTimeout(demoTimer);
            if (reduceMotion) return;
            demoTimer = setTimeout(() => {
                demoIndex = (demoIndex + 1) % demoData.length;
                renderDemo();
                scheduleDemoAdvance();
            }, delay);
        }

        renderDemo();
        scheduleDemoAdvance();
    </script>

</body>

</html>
