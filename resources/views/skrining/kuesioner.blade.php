@extends('layouts.app', ['activeNav' => 'skrining', 'maxWidth' => '720px'])

@section('title', 'Ampira — Kuesioner')

@section('head')
<style>
    .q-card {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .q-meta {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        color: var(--ink-muted);
    }

    .q-progress {
        height: 6px;
        border-radius: 999px;
        background: var(--line-soft);
    }

    .q-progress span {
        display: block;
        height: 6px;
        border-radius: 999px;
        background: var(--primary);
        transition: width .2s ease;
    }

    .q-card h1 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        line-height: 1.4;
    }

    .q-card>p {
        margin: 0;
        font-size: 15px;
        color: var(--ink-muted);
    }

    .q-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .q-option {
        text-align: left;
        padding: 14px 18px;
        border-radius: 12px;
        font-size: 16px;
        color: var(--ink);
        border: 1px solid var(--input-border);
        background: var(--white);
        font-weight: 500;
        font-family: inherit;
        cursor: pointer;
    }

    .q-option.selected {
        border: 2px solid var(--primary);
        background: var(--primary-soft);
        font-weight: 700;
    }

    .q-footer {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding-top: 8px;
        border-top: 1px solid var(--line-soft);
    }

    .q-footer .btn-sm-outline,
    .q-footer .btn-sm-primary {
        padding: 12px 20px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 15px;
        font-family: inherit;
        text-decoration: none;
        cursor: pointer;
    }

    .q-footer .btn-sm-outline {
        border: 1px solid var(--input-border);
        background: var(--white);
        color: var(--ink);
        font-weight: 600;
    }

    .q-footer .btn-sm-primary {
        border: 0;
        background: var(--primary);
        color: var(--white);
    }

    .q-footer .btn-sm-primary:hover {
        background: var(--primary-dark);
        color: var(--white);
    }

    .q-footer button:disabled {
        cursor: not-allowed;
        opacity: .45;
    }

    .q-footer .q-terjawab {
        font-size: 14px;
        color: var(--ink-muted);
    }
</style>
@endsection

@section('content')
<ol aria-label="Tahapan skrining" class="stepper">
    <li class="done">1. Data anak</li>
    <li class="current">2. Kuesioner</li>
    <li>3. Hasil</li>
</ol>

<section aria-live="polite" class="card q-card">
    <div class="q-meta">
        <span id="q-counter"></span>
        <span id="q-bagian"></span>
    </div>
    <div class="q-progress"><span id="q-progress-fill"></span></div>
    <h1 id="q-text"></h1>
    <p>Pilih yang paling sesuai dengan keadaan anak sehari-hari.</p>
    <div role="group" aria-label="Pilihan jawaban" class="q-options" id="q-options"></div>
    <div class="q-footer">
        <button type="button" id="btn-prev" class="btn-sm-outline">Sebelumnya</button>
        <span class="q-terjawab" id="q-terjawab"></span>
        <button type="button" id="btn-next" class="btn-sm-primary">Berikutnya</button>
        <a href="{{ route('hasil') }}" id="btn-hasil" class="btn-sm-primary" style="display:none">Lihat hasil</a>
    </div>
</section>

<script>
    const pertanyaan = @json($pertanyaan);
    const pilihanJawaban = @json($pilihanJawaban);
    const total = pertanyaan.length;
    let i = 0;
    const jawaban = {};

    const elCounter = document.getElementById('q-counter');
    const elBagian = document.getElementById('q-bagian');
    const elProgress = document.getElementById('q-progress-fill');
    const elText = document.getElementById('q-text');
    const elOptions = document.getElementById('q-options');
    const elTerjawab = document.getElementById('q-terjawab');
    const btnPrev = document.getElementById('btn-prev');
    const btnNext = document.getElementById('btn-next');
    const btnHasil = document.getElementById('btn-hasil');

    function render() {
        const soal = pertanyaan[i];
        elCounter.textContent = `Pertanyaan ${i + 1} dari ${total}`;
        elBagian.textContent = soal.bagian === 'inti' ? 'Gejala inti bicara dan bahasa' : 'Gejala penyerta';
        elProgress.style.width = Math.round((i + 1) / total * 100) + '%';
        elText.textContent = soal.teks;

        elOptions.innerHTML = '';
        pilihanJawaban.forEach((label, k) => {
            const dipilih = jawaban[i] === k;
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = label;
            btn.className = 'q-option' + (dipilih ? ' selected' : '');
            btn.setAttribute('aria-pressed', dipilih ? 'true' : 'false');
            btn.addEventListener('click', () => { jawaban[i] = k; render(); });
            elOptions.appendChild(btn);
        });

        btnPrev.disabled = i === 0;
        elTerjawab.textContent = `${Object.keys(jawaban).length} dari ${total} terjawab`;

        const diAkhir = i === total - 1;
        btnNext.style.display = diAkhir ? 'none' : '';
        btnHasil.style.display = diAkhir ? '' : 'none';
    }

    btnPrev.addEventListener('click', () => { i = Math.max(0, i - 1); render(); });
    btnNext.addEventListener('click', () => { i = Math.min(total - 1, i + 1); render(); });

    render();
</script>
@endsection
