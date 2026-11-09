@extends('layouts.app', ['activeNav' => 'skrining'])

@section('title', 'Kuesioner — Ampira')

@section('head')
<style>
    .q-shell {
        display: flex;
        min-height: 100vh;
    }

    .q-main {
        flex: 1;
        padding: 34px 46px;
        display: flex;
        flex-direction: column;
        max-width: 780px;
    }

    .q-meta {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        margin-bottom: 10px;
    }

    .q-meta .part {
        font: 600 11px ui-monospace, Menlo, monospace;
        letter-spacing: .06em;
        color: var(--primary);
    }

    .q-meta .count {
        font: 12.5px 'Public Sans', sans-serif;
        color: var(--ink-muted);
    }

    .q-progress {
        height: 5px;
        background: #E4E8E6;
        border-radius: 3px;
        margin-bottom: 34px;
    }

    .q-progress span {
        display: block;
        width: 33%;
        height: 5px;
        background: var(--primary);
        border-radius: 3px;
    }

    .q-head {
        display: flex;
        gap: 16px;
        align-items: flex-start;
        margin-bottom: 8px;
    }

    .q-head .code {
        font: 600 11px ui-monospace, Menlo, monospace;
        color: var(--ink-faintest);
        padding-top: 12px;
    }

    .q-head h1 {
        margin: 0;
        font: 400 31px/1.32 'Newsreader', serif;
        color: var(--ink);
        max-width: 26ch;
        text-wrap: pretty;
    }

    .q-sub {
        margin: 0 0 26px 42px;
        font: 13.5px/1.6 'Public Sans', sans-serif;
        color: var(--ink-muted);
    }

    .q-scale {
        margin-left: 42px;
        display: flex;
        gap: 10px;
        max-width: 640px;
    }

    .q-scale button {
        flex: 1;
        padding: 16px 8px;
        text-align: center;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 9px;
        font: 500 12.5px/1.3 'Public Sans', sans-serif;
        color: var(--ink-muted);
        cursor: pointer;
    }

    .q-scale button.selected {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
        font-weight: 600;
    }

    .q-weights {
        margin: 16px 0 0 42px;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .q-weights span {
        padding: 6px 11px;
        background: #EEF1F0;
        border-radius: 5px;
        font: 11px ui-monospace, Menlo, monospace;
        color: #4D5C57;
    }

    .q-weights span.cf {
        background: var(--primary-soft);
        color: var(--primary);
    }

    .q-next {
        margin: 34px 0 0 42px;
        padding-top: 22px;
        border-top: 1px solid var(--line-soft);
        max-width: 640px;
    }

    .q-next .label {
        font: 600 11px ui-monospace, Menlo, monospace;
        letter-spacing: .06em;
        color: var(--ink-faintest);
        margin-bottom: 12px;
    }

    .q-next p {
        font: 14px/1.6 'Public Sans', sans-serif;
        color: #B3BCB8;
    }

    .q-actions {
        margin-top: auto;
        padding-top: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .q-actions .autosave {
        font: 12.5px 'Public Sans', sans-serif;
        color: var(--ink-faintest);
    }

    .q-actions .right {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .btn-outline,
    .btn-primary {
        padding: 12px 22px;
        border-radius: 8px;
        font: 600 13.5px 'Public Sans', sans-serif;
        border: 1px solid var(--line);
        background: #fff;
        color: var(--ink-muted);
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }

    .btn-primary {
        border-color: var(--primary);
        background: var(--primary);
        color: #fff;
        padding: 12px 26px;
    }

    .btn-primary:hover {
        background: var(--primary-dark);
    }

    .q-panel {
        width: 284px;
        flex-shrink: 0;
        border-left: 1px solid var(--line-soft);
        background: #fff;
        padding: 26px 22px;
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .q-panel .label {
        font: 600 11px ui-monospace, Menlo, monospace;
        letter-spacing: .06em;
        color: var(--ink-faintest);
    }

    .q-panel .cf-value {
        font: 500 34px 'Newsreader', serif;
        color: var(--ink);
    }

    .q-panel .cf-bar {
        height: 6px;
        background: #E4E8E6;
        border-radius: 3px;
        margin-top: 10px;
    }

    .q-panel .cf-bar span {
        display: block;
        width: 62%;
        height: 6px;
        background: var(--risk-mid);
        border-radius: 3px;
    }

    .q-panel .steps-label {
        font: 12px 'Public Sans', sans-serif;
        color: var(--ink-muted);
        margin-bottom: 9px;
    }

    .q-panel .steps-calc {
        font: 11.5px/1.8 ui-monospace, Menlo, monospace;
        color: #4D5C57;
    }

    .q-panel .note {
        padding: 14px;
        background: #F4F6F5;
        border-radius: 8px;
        font: 11.5px/1.6 'Public Sans', sans-serif;
        color: var(--ink-muted);
    }

    .q-panel .footnote {
        margin-top: auto;
        font: 11.5px/1.6 'Public Sans', sans-serif;
        color: var(--ink-faintest);
    }

    @media (max-width: 1000px) {
        .q-panel {
            display: none;
        }
    }

    @media (max-width: 640px) {
        .q-main {
            padding: 26px 22px;
            min-width: 0;
        }

        .q-head .code {
            padding-top: 4px;
        }

        .q-head h1 {
            font-size: 24px;
        }

        .q-sub,
        .q-scale,
        .q-weights,
        .q-next {
            margin-left: 0;
        }

        .q-scale {
            flex-wrap: wrap;
        }

        .q-scale button {
            flex: 1 1 calc(33.333% - 7px);
            min-width: 0;
        }

        .q-actions {
            flex-wrap: wrap;
            gap: 12px;
        }

        .q-actions .right {
            width: 100%;
            justify-content: space-between;
        }
    }
</style>
@endsection

@section('content')
<div class="q-shell">
    <div class="q-main">
        <div class="q-meta">
            <span class="part">BAGIAN 1 DARI 3 · GEJALA INTI BICARA–BAHASA</span>
            <span class="count">8 dari 24 pertanyaan</span>
        </div>
        <div class="q-progress"><span></span></div>

        <div class="q-head">
            <span class="code">G08</span>
            <h1>Anak belum menggabungkan dua kata menjadi satu frasa, misalnya &ldquo;mau susu&rdquo;.</h1>
        </div>
        <p class="q-sub">Seberapa sering Anda mengamati hal ini dalam dua minggu terakhir?</p>

        <div class="q-scale" role="radiogroup" aria-label="Frekuensi pengamatan">
            <button type="button" data-scale="tidak-pernah">Tidak<br>pernah</button>
            <button type="button" data-scale="jarang">Jarang</button>
            <button type="button" data-scale="kadang">Kadang</button>
            <button type="button" data-scale="sering" class="selected">Sering</button>
            <button type="button" data-scale="selalu">Selalu</button>
        </div>

        <div class="q-weights">
            <span>μ Sering = 0,75</span>
            <span>μ Selalu = 0,25</span>
            <span class="cf">CF pakar = 0,80</span>
        </div>

        <div class="q-next">
            <div class="label">BERIKUTNYA</div>
            <p>G09 · Anak tidak menoleh saat namanya dipanggil dari jarak dekat.<br>
                G10 · Pengucapan anak sulit dimengerti orang selain keluarga inti.</p>
        </div>

        <div class="q-actions">
            <a href="{{ route('skrining.profil') }}" class="btn-outline">&larr; Sebelumnya</a>
            <div class="right">
                <span class="autosave">Jawaban tersimpan otomatis</span>
                <a href="{{ route('hasil') }}" class="btn-primary">Lanjut &rarr;</a>
            </div>
        </div>
    </div>

    <aside class="q-panel">
        <div class="label">PANEL PERHITUNGAN · MODE PAKAR</div>
        <div>
            <div style="font:12px 'Public Sans',sans-serif;color:var(--ink-muted);margin-bottom:6px">CF gabungan
                sementara</div>
            <div class="cf-value">0,62</div>
            <div class="cf-bar"><span></span></div>
        </div>
        <div>
            <div class="steps-label">Langkah kombinasi</div>
            <div class="steps-calc">CF&#8321; = 0,80<br>CF&#8322; = 0,45 &rarr; 0,89<br>CF&#8323; = &minus;0,20 &rarr;
                0,72<br>CF&#8324; = 0,30 &rarr; <b style="color:var(--ink)">0,62</b></div>
        </div>
        <div class="note">Panel ini hanya tampil untuk akun pakar dan saat pengujian validitas — orang tua tidak
            melihat angka mentah.</div>
        <div class="footnote">Jalur B (gejala penyerta) diproses terpisah di Bagian 3.</div>
    </aside>
</div>

<script>
    document.querySelectorAll('.q-scale button').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.q-scale button').forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
        });
    });
</script>
@endsection
