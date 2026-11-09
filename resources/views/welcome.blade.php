<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Ampira — Skrining dini keterlambatan bicara anak</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #0E6E66;
            --primary-dark: #0A524C;
            --primary-soft: #E3F2F0;
            --accent: #14897B;
            --ink: #16212B;
            --ink-muted: #4B5A66;
            --ink-faint: #7E8C96;
            --line: #D9E1E6;
            --bg: #F6F8F9;
            --white: #FFFFFF;
            --warn-bg: #FFF4E0;
            --warn-border: #F0D3A3;
            --warn-text: #5C3200;
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

        em {
            font-style: italic;
            color: var(--accent);
            font-weight: 500;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 32px;
        }

        /* ---------- NAV ---------- */
        .nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(251, 248, 243, 0);
            border-bottom: 1px solid transparent;
            transition: background .25s ease, border-color .25s ease;
        }

        .nav.is-scrolled {
            background: rgba(251, 248, 243, .92);
            backdrop-filter: blur(10px);
            border-color: var(--line);
        }

        .nav .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding-top: 22px;
            padding-bottom: 22px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--ink);
            font-weight: 700;
            font-size: 15px;
            letter-spacing: .02em;
            text-transform: uppercase;
        }

        .brand-mark {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--ink-muted);
            font-weight: 500;
            font-size: 14.5px;
            transition: color .15s ease;
        }

        .nav-link:hover,
        .nav-link.is-active {
            color: var(--ink);
        }

        .btn-outline-nav {
            padding: 10px 20px;
            border-radius: 999px;
            border: 1px solid var(--ink);
            text-decoration: none;
            color: var(--ink);
            font-weight: 600;
            font-size: 14px;
        }

        .btn-outline-nav:hover {
            background: var(--ink);
            color: var(--white);
        }

        /* ---------- CHAPTER RAIL (desktop side nav) ---------- */
        .chapter-rail {
            position: fixed;
            right: 36px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 90;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .chapter-rail a {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .06em;
            color: var(--ink-faint);
        }

        .chapter-rail a .bar {
            width: 18px;
            height: 1px;
            background: var(--ink-faint);
            transition: width .2s ease, background .2s ease;
        }

        .chapter-rail a span.lbl {
            opacity: 0;
            transform: translateX(-6px);
            transition: opacity .2s ease, transform .2s ease;
            white-space: nowrap;
        }

        .chapter-rail a:hover span.lbl,
        .chapter-rail a.is-active span.lbl {
            opacity: 1;
            transform: translateX(0);
        }

        .chapter-rail a.is-active {
            color: var(--accent);
        }

        .chapter-rail a.is-active .bar {
            width: 30px;
            background: var(--accent);
        }

        @media (max-width: 1100px) {
            .chapter-rail {
                display: none;
            }
        }

        /* ---------- HERO ---------- */
        .hero-wrap {
            position: relative;
            min-height: 150vh;
            display: flex;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 32px;
            gap: 24px;
        }

        .hero-visual-stage {
            flex: 1 1 46%;
            position: relative;
            z-index: 1;
        }

        .hero-copy {
            flex: 1 1 54%;
            min-width: 0;
            padding-top: 64px;
            position: relative;
            z-index: 1;
        }

        .hero-deco {
            position: absolute;
            pointer-events: none;
            z-index: 0;
        }

        .hero-deco.ring {
            width: 340px;
            height: 340px;
            border-radius: 50%;
            border: 1px solid var(--line);
            top: 20px;
            right: 2vw;
        }

        .hero-deco.dots {
            width: 160px;
            height: 160px;
            top: 480px;
            left: -10px;
            background-image: radial-gradient(var(--line) 1.5px, transparent 1.5px);
            background-size: 18px 18px;
            opacity: .8;
        }

        @media (max-width: 1100px) {
            .hero-deco {
                display: none;
            }
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12.5px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--primary-dark);
            margin-bottom: 28px;
        }

        .hero-eyebrow .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent);
        }

        .hero-copy h1 {
            margin: 0;
            font-size: 76px;
            line-height: 1.02;
            font-weight: 800;
            letter-spacing: -.02em;
            max-width: 15ch;
        }

        .hero-copy h1 em {
            display: block;
        }

        .hero-lead {
            margin: 28px 0 0;
            font-size: 19px;
            line-height: 1.65;
            color: var(--ink-muted);
            max-width: 46ch;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 36px;
        }

        .btn-primary,
        .btn-outline {
            padding: 15px 26px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            font-size: 15.5px;
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
            box-shadow: 0 14px 28px -12px rgba(14, 110, 102, .5);
            transition: transform .15s ease, box-shadow .15s ease, background .15s ease;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            color: var(--white);
            transform: translateY(-1px);
        }

        .btn-outline {
            border: 1px solid var(--ink);
            background: transparent;
            color: var(--ink);
            font-weight: 600;
        }

        .btn-outline:hover {
            background: var(--ink);
            color: var(--white);
        }

        .hero-stats-row {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-top: 56px;
            padding-top: 28px;
            border-top: 1px solid var(--line);
            max-width: 46ch;
        }

        .hero-stats-row .stat b {
            display: block;
            font-size: 15px;
            font-weight: 800;
            color: var(--ink);
        }

        .hero-stats-row .stat span {
            font-size: 12.5px;
            color: var(--ink-faint);
        }

        /* Sticky demo visual, Cyclemon-style pinned panel */
        .hero-visual-stage {
            position: sticky;
            top: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        .hero-visual {
            pointer-events: auto;
            width: min(380px, 86vw);
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 22px;
            padding: 26px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            box-shadow: 0 40px 70px -32px rgba(36, 31, 24, .3);
            position: absolute;
            right: 7vw;
            top: 50%;
            transform: translateY(-50%);
        }

        .hero-visual .cap {
            font-size: 11px;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--ink-faint);
            font-weight: 700;
        }

        .hero-visual .meta {
            display: flex;
            justify-content: space-between;
            font-size: 12.5px;
            color: var(--ink-muted);
            font-weight: 600;
        }

        .progress-track {
            height: 5px;
            border-radius: 999px;
            background: var(--line);
            overflow: hidden;
        }

        .progress-fill {
            height: 5px;
            border-radius: 999px;
            background: var(--primary);
            width: 20%;
            transition: width .5s cubic-bezier(.2, .8, .2, 1);
        }

        .hero-visual .question {
            margin: 0;
            font-size: 17.5px;
            font-weight: 700;
            line-height: 1.4;
            min-height: 48px;
        }

        .hero-visual-options {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .hero-visual-options button {
            text-align: left;
            padding: 11px 14px;
            border-radius: 10px;
            border: 1px solid var(--line);
            font-size: 14px;
            font-family: inherit;
            background: var(--white);
            color: var(--ink);
            cursor: pointer;
            transition: border-color .15s ease, background .15s ease;
        }

        .hero-visual-options button:hover {
            border-color: var(--primary);
        }

        .hero-visual-options button.picked {
            border: 2px solid var(--primary);
            background: var(--primary-soft);
            font-weight: 600;
            padding: 10px 13px;
        }

        @media (max-width: 1100px) {
            .hero-wrap {
                min-height: 0;
            }

            .hero-visual-stage {
                position: static;
                height: auto;
                margin: 48px 0 0;
            }

            .hero-visual {
                position: static;
                transform: none;
                margin: 0 auto;
            }
        }

        /* ---------- CHAPTERS ---------- */
        .chapter {
            position: relative;
            border-top: 1px solid var(--line);
            overflow: hidden;
        }

        .chapter.tint-soft {
            background: var(--primary-soft);
        }

        .chapter-numeral {
            position: absolute;
            top: -0.12em;
            font-size: 320px;
            font-weight: 800;
            line-height: 1;
            color: var(--ink);
            opacity: .04;
            z-index: 0;
            pointer-events: none;
            user-select: none;
        }

        .chapter-numeral.left {
            left: -40px;
        }

        .chapter-numeral.right {
            right: -40px;
        }

        .chapter-inner {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 120px 32px;
            display: flex;
            flex-wrap: wrap;
            gap: 64px;
            align-items: center;
        }

        .chapter-inner.reverse {
            flex-direction: row-reverse;
        }

        .chapter-text {
            flex: 1 1 440px;
            min-width: 0;
        }

        .chapter-eyebrow {
            font-size: 12.5px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--primary-dark);
            margin-bottom: 18px;
        }

        .chapter-text h2 {
            margin: 0 0 20px;
            font-size: 42px;
            line-height: 1.12;
            font-weight: 800;
            letter-spacing: -.015em;
        }

        .chapter-text h2 em {
            display: block;
        }

        .chapter-text>p {
            margin: 0;
            font-size: 17px;
            line-height: 1.7;
            color: var(--ink-muted);
            max-width: 46ch;
        }

        .chapter-visual {
            flex: 1 1 420px;
            min-width: 0;
        }

        /* ---------- STEP LIST (chapter 01) ---------- */
        .step-list {
            display: flex;
            flex-direction: column;
        }

        .step-row {
            display: flex;
            gap: 22px;
            padding: 26px 0;
            border-top: 1px solid var(--line);
        }

        .step-row:last-child {
            border-bottom: 1px solid var(--line);
        }

        .step-row .n {
            font-size: 14px;
            font-weight: 800;
            color: var(--accent);
            flex: none;
            padding-top: 2px;
        }

        .step-row h3 {
            margin: 0 0 6px;
            font-size: 18px;
            font-weight: 700;
        }

        .step-row p {
            margin: 0;
            font-size: 14.5px;
            line-height: 1.6;
            color: var(--ink-muted);
        }

        .step-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 28px;
        }

        .tag {
            padding: 8px 15px;
            border-radius: 999px;
            border: 1px solid var(--line);
            font-size: 13px;
            font-weight: 600;
            color: var(--ink-muted);
            background: var(--white);
        }

        /* ---------- RESULT PREVIEW CARD (chapter 02) ---------- */
        .preview-card {
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 30px 60px -32px rgba(36, 31, 24, .25);
        }

        .preview-card .cap {
            font-size: 11px;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--ink-faint);
            font-weight: 700;
            margin-bottom: 18px;
        }

        .preview-badge {
            display: inline-block;
            padding: 7px 16px;
            border-radius: 999px;
            background: var(--warn-bg);
            color: var(--warn-text);
            font-weight: 800;
            font-size: 18px;
            margin-bottom: 16px;
        }

        .preview-card .confidence-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            font-size: 13px;
            color: var(--ink-muted);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .preview-card .confidence-row b {
            font-size: 22px;
            color: var(--ink);
        }

        .preview-bar {
            height: 8px;
            border-radius: 999px;
            background: var(--line);
            overflow: hidden;
            margin-bottom: 22px;
        }

        .preview-bar span {
            display: block;
            height: 8px;
            border-radius: 999px;
            background: var(--primary);
        }

        .preview-tags {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .preview-tags .row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 13.5px;
            color: var(--ink-muted);
            line-height: 1.5;
        }

        .preview-tags svg {
            flex: none;
            margin-top: 2px;
        }

        /* ---------- WARNING STRIP ---------- */
        .warning-strip {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 32px 120px;
        }

        .warning-box {
            padding: 26px 30px;
            border-radius: 18px;
            background: var(--warn-bg);
            border: 1px solid var(--warn-border);
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: flex-start;
        }

        .warning-box strong {
            font-size: 16px;
            color: var(--warn-text);
        }

        .warning-box p {
            margin: 0;
            font-size: 14.5px;
            line-height: 1.6;
            color: var(--warn-text);
        }

        /* ---------- METHOD FLOW (chapter 03) ---------- */
        .method-flow {
            display: flex;
            flex-direction: column;
        }

        .method-row {
            display: flex;
            gap: 20px;
            padding: 24px 0;
            border-top: 1px solid var(--line);
        }

        .method-row:last-child {
            border-bottom: 1px solid var(--line);
        }

        .method-row .n {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid var(--ink);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 800;
            flex: none;
            transition: background .25s ease, color .25s ease, border-color .25s ease;
        }

        .method-row.is-visible .n {
            background: var(--ink);
            color: var(--white);
        }

        .method-row h3 {
            margin: 0 0 4px;
            font-size: 16.5px;
            font-weight: 700;
        }

        .method-row p {
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
            color: var(--ink-muted);
        }

        /* ---------- REVEAL ---------- */
        .reveal {
            opacity: 0;
            transform: translateY(26px);
            transition: opacity .7s ease, transform .7s cubic-bezier(.2, .8, .2, 1);
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ---------- CLOSING CTA ---------- */
        .closing {
            position: relative;
            overflow: hidden;
            background: linear-gradient(160deg, var(--primary-dark), var(--accent));
        }

        .closing::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08);
            top: -180px;
            right: -100px;
        }

        .closing-inner {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
            padding: 140px 32px;
            text-align: center;
        }

        .closing-inner .chapter-eyebrow {
            color: rgba(255, 255, 255, .75);
            justify-content: center;
            display: flex;
        }

        .closing-inner h2 {
            margin: 0 0 24px;
            font-size: 48px;
            line-height: 1.12;
            font-weight: 800;
            color: var(--white);
            letter-spacing: -.015em;
        }

        .closing-inner p {
            margin: 0 auto 36px;
            font-size: 17px;
            line-height: 1.6;
            color: rgba(255, 255, 255, .85);
            max-width: 46ch;
        }

        .closing .btn-primary {
            background: var(--white);
            color: var(--primary-dark);
            box-shadow: 0 16px 30px -14px rgba(0, 0, 0, .35);
        }

        .closing .btn-primary:hover {
            background: var(--bg);
            color: var(--primary-dark);
        }

        /* ---------- FOOTER ---------- */
        footer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 32px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 12px;
            font-size: 13.5px;
            color: var(--ink-faint);
        }

        /* ---------- FLOATING CTA ---------- */
        .floating-cta {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 95;
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

        @media (max-width: 900px) {
            .hero-copy h1 {
                font-size: 44px;
            }

            .chapter-text h2 {
                font-size: 30px;
            }

            .chapter-inner,
            .chapter-inner.reverse {
                flex-direction: column;
            }

            .chapter-inner {
                padding: 72px 24px;
                gap: 36px;
            }

            .chapter-numeral {
                font-size: 160px;
            }

            .closing-inner {
                padding: 88px 24px;
            }

            .closing-inner h2 {
                font-size: 32px;
            }

            .hero-wrap {
                padding: 0 20px;
                flex-direction: column;
            }

            .hero-copy {
                padding-top: 40px;
            }

            .nav .container {
                padding-top: 16px;
                padding-bottom: 16px;
            }

            .nav-links {
                gap: 14px;
            }

            .nav-link {
                display: none;
            }

            .floating-cta a span {
                display: none;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            html,
            .reveal,
            .method-row .n {
                transition: none !important;
            }

            .reveal {
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>
</head>

<body>

    <nav class="nav" id="nav">
        <div class="container">
            <a href="#" class="brand">
                <span class="brand-mark" aria-hidden="true">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.4"
                        stroke-linecap="round">
                        <path d="M4 12h2M8 8v8M12 5v14M16 8v8M20 12h0" />
                    </svg>
                </span>
                Ampira
            </a>
            <div class="nav-links">
                <a href="#cara-kerja" class="nav-link" data-section="cara-kerja">Cara kerja</a>
                <a href="#manfaat" class="nav-link" data-section="manfaat">Manfaat</a>
                <a href="#metode" class="nav-link" data-section="metode">Metode</a>
                <a href="{{ route('masuk') }}" class="btn-outline-nav">Masuk</a>
            </div>
        </div>
    </nav>

    <div class="chapter-rail" id="chapterRail">
        <a href="#hero" data-section="hero"><span class="bar"></span><span class="lbl">00 Awal</span></a>
        <a href="#cara-kerja" data-section="cara-kerja"><span class="bar"></span><span class="lbl">01 Cara kerja</span></a>
        <a href="#manfaat" data-section="manfaat"><span class="bar"></span><span class="lbl">02 Manfaat</span></a>
        <a href="#metode" data-section="metode"><span class="bar"></span><span class="lbl">03 Metode</span></a>
        <a href="#mulai" data-section="mulai"><span class="bar"></span><span class="lbl">04 Mulai</span></a>
    </div>

    <header class="hero-wrap" id="hero">
        <span class="hero-deco ring" data-parallax="0.1" aria-hidden="true"></span>
        <span class="hero-deco dots" data-parallax="-0.12" aria-hidden="true"></span>
        <div class="hero-copy">
            <span class="hero-eyebrow"><span class="dot"></span>Skrining awal &middot; bukan diagnosis</span>
            <h1>Kenali tanda<em>keterlambatan bicara,</em>lebih awal.</h1>
            <p class="hero-lead">Jawab pertanyaan singkat tentang kebiasaan bicara anak Anda. Ampira menghitung
                tingkat keyakinan indikasi keterlambatan bicara dan memberi saran langkah berikutnya.</p>
            <div class="hero-actions">
                <a href="{{ route('masuk') }}" class="btn-primary">Mulai skrining</a>
                <a href="#cara-kerja" class="btn-outline">Lihat cara kerjanya</a>
            </div>
            <div class="hero-stats-row">
                <div class="stat"><b data-count-to="3">0</b><span>langkah skrining</span></div>
                <div class="stat"><b data-count-to="10">0</b><span>menit mengisi</span></div>
                <div class="stat"><b data-count-to="17">0</b><span>pertanyaan perilaku</span></div>
            </div>
        </div>
        <div class="hero-visual-stage">
            <div class="hero-visual" id="heroDemo">
                <div class="cap">Contoh interaktif</div>
                <div class="meta"><span id="demoMeta">Pertanyaan 1 dari 3</span></div>
                <div class="progress-track">
                    <div class="progress-fill" id="demoProgress"></div>
                </div>
                <p class="question" id="demoQuestion"></p>
                <div class="hero-visual-options" id="demoOptions"></div>
            </div>
        </div>
    </header>

    <section id="cara-kerja" class="chapter">
        <span class="chapter-numeral left" data-parallax="-0.15" aria-hidden="true">01</span>
        <div class="chapter-inner">
            <div class="chapter-text reveal">
                <div class="chapter-eyebrow">01 / Cara kerja</div>
                <h2>Tiga langkah,<em>sekitar 10 menit.</em></h2>
                <p>Anda cukup menjawab berdasarkan apa yang Anda amati sehari-hari. Tidak ada jawaban benar atau
                    salah.</p>
                <div class="step-tags">
                    <span class="tag">Data anak</span>
                    <span class="tag">17 pertanyaan</span>
                    <span class="tag">Hasil &amp; saran</span>
                </div>
            </div>
            <div class="chapter-visual reveal">
                <div class="step-list">
                    <div class="step-row">
                        <span class="n">01</span>
                        <div>
                            <h3>Isi data anak</h3>
                            <p>Nama, tanggal lahir, dan jenis kelamin. Usia anak menentukan pertanyaan yang muncul.
                            </p>
                        </div>
                    </div>
                    <div class="step-row">
                        <span class="n">02</span>
                        <div>
                            <h3>Jawab pertanyaan</h3>
                            <p>Pilih seberapa sering perilaku itu terjadi: tidak pernah, jarang, kadang, sering,
                                atau selalu.</p>
                        </div>
                    </div>
                    <div class="step-row">
                        <span class="n">03</span>
                        <div>
                            <h3>Baca hasil dan saran</h3>
                            <p>Ampira menampilkan kategori indikasi, tingkat keyakinan, dan langkah yang sebaiknya
                                Anda ambil.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="manfaat" class="chapter tint-soft">
        <span class="chapter-numeral right" data-parallax="-0.15" aria-hidden="true">02</span>
        <div class="chapter-inner reverse">
            <div class="chapter-text reveal">
                <div class="chapter-eyebrow">02 / Manfaat</div>
                <h2>Yang Anda terima<em>setelah skrining.</em></h2>
                <p>Hasil ditulis dengan bahasa sehari-hari supaya mudah dipahami dan bisa Anda bawa saat
                    berkonsultasi.</p>
                <div class="step-tags">
                    <span class="tag">Kategori indikasi</span>
                    <span class="tag">Tingkat keyakinan</span>
                    <span class="tag">Catatan rujukan</span>
                </div>
            </div>
            <div class="chapter-visual reveal">
                <div class="preview-card">
                    <div class="cap">Pratinjau hasil</div>
                    <span class="preview-badge">Risiko sedang</span>
                    <div class="confidence-row"><span>Tingkat keyakinan sistem</span><b>62%</b></div>
                    <div class="preview-bar"><span style="width:62%"></span></div>
                    <div class="preview-tags">
                        <div class="row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0E6E66"
                                stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                            <span>Kategori indikasi: rendah, sedang, atau tinggi.</span>
                        </div>
                        <div class="row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0E6E66"
                                stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                            <span>Saran langkah berikutnya yang bisa dibawa ke konsultasi.</span>
                        </div>
                        <div class="row">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0E6E66"
                                stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                            <span>Catatan rujukan bila ada tanda di luar bicara dan bahasa.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="warning-strip">
        <div class="warning-box reveal">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#8A4B00" stroke-width="2"
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
    </div>

    <section id="metode" class="chapter">
        <span class="chapter-numeral left" data-parallax="-0.15" aria-hidden="true">03</span>
        <div class="chapter-inner">
            <div class="chapter-text reveal">
                <div class="chapter-eyebrow">03 / Metode</div>
                <h2>Fuzzy Logic<em>bertemu Certainty Factor.</em></h2>
                <p>Ampira dikembangkan sebagai penelitian skripsi di Program Studi D4 Teknik Informatika,
                    Politeknik Negeri Jember. Daftar gejala dan bobot keyakinannya disusun bersama psikolog
                    anak.</p>
            </div>
            <div class="chapter-visual reveal">
                <div class="method-flow">
                    <div class="method-row">
                        <span class="n">1</span>
                        <div>
                            <h3>Jawaban Anda</h3>
                            <p>Setiap pertanyaan dijawab dengan skala: tidak pernah, jarang, kadang, sering, atau
                                selalu.</p>
                        </div>
                    </div>
                    <div class="method-row">
                        <span class="n">2</span>
                        <div>
                            <h3>Fuzzy Logic</h3>
                            <p>Jawaban yang tidak hitam-putih diterjemahkan jadi derajat keanggotaan, bukan
                                dibulatkan kasar.</p>
                        </div>
                    </div>
                    <div class="method-row">
                        <span class="n">3</span>
                        <div>
                            <h3>Certainty Factor</h3>
                            <p>Bobot keyakinan pakar digabungkan untuk menghitung seberapa kuat indikasinya.</p>
                        </div>
                    </div>
                    <div class="method-row">
                        <span class="n">4</span>
                        <div>
                            <h3>Hasil &amp; saran</h3>
                            <p>Kategori indikasi dan langkah lanjutan ditampilkan dengan bahasa sehari-hari.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="mulai" class="closing">
        <div class="closing-inner">
            <div class="chapter-eyebrow">04 / Mulai</div>
            <h2>Siap mengenali tanda<br>lebih awal?</h2>
            <p>Gratis. Hasil tersimpan di akun Anda dan bisa dilihat kembali kapan saja.</p>
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

        // Nav scrolled state + floating CTA + scroll progress rail
        const nav = document.getElementById('nav');
        const floatingCta = document.getElementById('floatingCta');
        const heroWrap = document.getElementById('hero');
        const closing = document.getElementById('mulai');

        function onScroll() {
            const scrollTop = window.scrollY;
            nav.classList.toggle('is-scrolled', scrollTop > 8);

            const heroBottom = heroWrap.getBoundingClientRect().bottom + scrollTop;
            const closingTop = closing.getBoundingClientRect().top + scrollTop;
            const pastHero = scrollTop > heroBottom - window.innerHeight * 0.6;
            const nearClosing = scrollTop + window.innerHeight > closingTop;
            floatingCta.classList.toggle('is-shown', pastHero && !nearClosing);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        // Parallax: background numerals and hero decorations drift at a different
        // rate than the foreground content as you scroll past them.
        const parallaxEls = Array.from(document.querySelectorAll('[data-parallax]'));
        let parallaxTicking = false;
        function updateParallax() {
            parallaxTicking = false;
            if (reduceMotion) return;
            const vh = window.innerHeight;
            parallaxEls.forEach(el => {
                const speed = Number(el.dataset.parallax);
                const rect = el.getBoundingClientRect();
                const center = rect.top + rect.height / 2;
                const offset = (center - vh / 2) * speed;
                el.style.transform = `translateY(${offset}px)`;
            });
        }
        window.addEventListener('scroll', () => {
            if (!parallaxTicking) { parallaxTicking = true; requestAnimationFrame(updateParallax); }
        }, { passive: true });
        updateParallax();

        // Chapter rail + nav scroll-spy
        const spyTargets = ['hero', 'cara-kerja', 'manfaat', 'metode', 'mulai']
            .map(id => document.getElementById(id))
            .filter(Boolean);
        const railLinks = document.querySelectorAll('.chapter-rail a[data-section]');
        const navLinks = document.querySelectorAll('.nav-link[data-section]');

        const spyIo = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (!e.isIntersecting) return;
                const id = e.target.id;
                railLinks.forEach(l => l.classList.toggle('is-active', l.dataset.section === id));
                navLinks.forEach(l => l.classList.toggle('is-active', l.dataset.section === id));
            });
        }, { threshold: 0, rootMargin: '-45% 0px -50% 0px' });
        spyTargets.forEach(s => spyIo.observe(s));

        // Reveal on scroll
        const revealEls = document.querySelectorAll('.reveal, .method-row');
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
            { q: 'Apakah anak berbicara lebih lambat daripada anak seumurannya?', opts: ['Tidak pernah', 'Jarang', 'Kadang', 'Sering', 'Selalu'], pick: 2 },
            { q: 'Apakah anak kesulitan memahami perkataan orang dewasa?', opts: ['Tidak pernah', 'Jarang', 'Kadang', 'Sering', 'Selalu'], pick: 1 },
            { q: 'Apakah anak kesulitan berteman atau ikut bermain bersama anak lain?', opts: ['Tidak pernah', 'Jarang', 'Kadang', 'Sering', 'Selalu'], pick: 0 },
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
