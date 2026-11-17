@extends('layouts.app', ['activeNav' => 'skrining'])

@section('title', 'Ampira — Kuesioner')

@section('head')
<style>
    .q-row {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        align-items: flex-start;
    }

    .q-card {
        flex: 1 1 560px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .q-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .q-meta span.count {
        font-size: 14px;
        font-weight: 600;
        color: var(--muted);
    }

    .q-progress {
        height: 8px;
        background: var(--chip);
        border-radius: 999px;
        overflow: hidden;
    }

    .q-progress span {
        display: block;
        height: 8px;
        background: var(--brand);
        border-radius: 999px;
        transition: width .3s ease;
    }

    .q-card h2 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        line-height: 1.3;
    }

    .q-card>p.sub {
        margin: 0;
        font-size: 15px;
        color: var(--muted);
    }

    .q-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .q-option {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 16px 18px;
        border-radius: 14px;
        border: 1px solid var(--line);
        background: var(--surface);
        cursor: pointer;
        text-align: left;
        font-family: inherit;
    }

    .q-option .radio {
        width: 22px;
        height: 22px;
        border-radius: 999px;
        border: 1px solid var(--line);
        background: var(--surface);
        display: flex;
        align-items: center;
        justify-content: center;
        flex: none;
    }

    .q-option .radio .titik {
        width: 10px;
        height: 10px;
        border-radius: 999px;
        background: var(--brand);
        display: none;
    }

    .q-option span.lbl {
        font-size: 16px;
        font-weight: 600;
    }

    .q-option.selected {
        border-color: var(--brand);
        border-width: 2px;
        background: var(--brand-soft);
    }

    .q-option.selected .radio {
        border-color: var(--brand);
        border-width: 2px;
    }

    .q-option.selected .radio .titik {
        display: block;
    }

    .q-nav {
        display: flex;
        justify-content: space-between;
    }

    .q-side {
        flex: 0 0 340px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .daftar-card h3 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
    }

    .nomor-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 14px;
    }

    .nomor-grid button {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        border: 0;
        font-size: 14px;
        font-weight: 700;
        font-family: inherit;
        cursor: pointer;
        background: var(--chip);
        color: var(--muted);
    }

    .nomor-grid button.done {
        background: var(--brand);
        color: #fff;
    }

    .nomor-grid button.current {
        background: var(--deep);
        color: var(--lime);
    }

    .legenda {
        display: flex;
        gap: 16px;
        margin-top: 16px;
        flex-wrap: wrap;
    }

    .legenda .it {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--muted);
    }

    .legenda .dot {
        width: 10px;
        height: 10px;
        border-radius: 3px;
    }

    .catatan-card {
        background: var(--warn-soft);
        border: 0;
    }

    .catatan-card strong {
        display: block;
        color: var(--warn);
        font-size: 15px;
        margin-bottom: 6px;
    }

    .catatan-card p {
        margin: 0;
        font-size: 14px;
    }

    @media (max-width: 1100px) {
        .q-side {
            flex: 1 1 100%;
        }
    }
</style>
@endsection

@section('content')
<h1>Skrining baru</h1>

<div class="stepper">
    <div class="langkah selesai"><span class="bulat">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 6 9 17l-5-5" />
            </svg>
        </span><span class="label">Data anak</span></div>
    <span class="garis selesai"></span>
    <div class="langkah sekarang"><span class="bulat">2</span><span class="label">Kuesioner</span></div>
    <span class="garis"></span>
    <div class="langkah"><span class="bulat">3</span><span class="label">Hasil</span></div>
</div>

<div class="q-row">
    <section aria-live="polite" class="kartu q-card">
        <div class="q-meta">
            <x-lencana variant="brand" id="qBagian">Bicara dan bahasa</x-lencana>
            <span class="count" id="qCounter">Pertanyaan 1 dari 17</span>
        </div>
        <div class="q-progress"><span id="qProgressFill"></span></div>
        <h2 id="qText"></h2>
        <p class="sub">Jawab sesuai yang Anda amati dalam 1 bulan terakhir.</p>
        <div class="q-options" id="qOptions"></div>
        <div class="q-nav">
            <x-tombol variant="sekunder" id="btnPrev">&larr; Sebelumnya</x-tombol>
            <x-tombol variant="utama" id="btnNext">Berikutnya &rarr;</x-tombol>
            <x-tombol variant="utama" href="{{ route('hasil') }}" id="btnHasil" style="display:none">Lihat
                hasil</x-tombol>
        </div>
    </section>

    <aside class="q-side">
        <div class="kartu daftar-card">
            <h3>Daftar pertanyaan</h3>
            <div class="nomor-grid" id="nomorGrid"></div>
            <div class="legenda">
                <span class="it"><span class="dot" style="background:var(--brand)"></span>Terjawab</span>
                <span class="it"><span class="dot" style="background:var(--deep)"></span>Sekarang</span>
                <span class="it"><span class="dot" style="background:var(--chip)"></span>Belum</span>
            </div>
        </div>
        <div class="kartu catatan-card">
            <strong>Ragu menjawab?</strong>
            <p>Pilih jawaban yang paling mendekati. Anda masih bisa mengubahnya sebelum menyimpan.</p>
        </div>
    </aside>
</div>

<script>
    const pertanyaan = @json($pertanyaan);
    const pilihanJawaban = @json($pilihanJawaban);
    const total = pertanyaan.length;
    let i = 0;
    const jawaban = {};

    const qBagian = document.getElementById('qBagian');
    const qCounter = document.getElementById('qCounter');
    const qProgressFill = document.getElementById('qProgressFill');
    const qText = document.getElementById('qText');
    const qOptions = document.getElementById('qOptions');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');
    const btnHasil = document.getElementById('btnHasil');
    const nomorGrid = document.getElementById('nomorGrid');

    function render() {
        const soal = pertanyaan[i];
        qBagian.textContent = soal.bagian === 'inti' ? 'Gejala inti bicara dan bahasa' : 'Gejala penyerta';
        qCounter.textContent = `Pertanyaan ${i + 1} dari ${total}`;
        qProgressFill.style.width = Math.round(((i + 1) / total) * 100) + '%';
        qText.textContent = soal.teks;

        qOptions.innerHTML = '';
        pilihanJawaban.forEach((label, k) => {
            const dipilih = jawaban[i] === k;
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'q-option' + (dipilih ? ' selected' : '');
            btn.innerHTML = '<span class="radio"><span class="titik"></span></span><span class="lbl"></span>';
            btn.querySelector('.lbl').textContent = label;
            btn.addEventListener('click', () => { jawaban[i] = k; render(); });
            qOptions.appendChild(btn);
        });

        btnPrev.disabled = i === 0;
        const diAkhir = i === total - 1;
        btnNext.style.display = diAkhir ? 'none' : '';
        btnHasil.style.display = diAkhir ? '' : 'none';

        renderGrid();
    }

    function renderGrid() {
        nomorGrid.innerHTML = '';
        for (let k = 0; k < total; k++) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = k + 1;
            if (k === i) btn.className = 'current';
            else if (jawaban[k] !== undefined) btn.className = 'done';
            btn.addEventListener('click', () => { i = k; render(); });
            nomorGrid.appendChild(btn);
        }
    }

    btnPrev.addEventListener('click', () => { i = Math.max(0, i - 1); render(); });
    btnNext.addEventListener('click', () => { i = Math.min(total - 1, i + 1); render(); });

    render();
</script>
@endsection
