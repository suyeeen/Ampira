@extends('layouts.app', ['activeNav' => 'skrining'])

@section('title', 'Data anak — Ampira')

@section('head')
<style>
    .page-pad {
        padding: 36px 48px;
        max-width: 900px;
    }

    .page-pad h1 {
        margin: 0 0 8px;
        font: 500 30px/1.2 'Newsreader', serif;
        color: var(--ink);
    }

    .page-pad>p {
        margin: 0 0 30px;
        font: 14px/1.6 'Public Sans', sans-serif;
        color: var(--ink-muted);
        max-width: 56ch;
    }

    .profil-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 24px;
        max-width: 660px;
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

    .field input,
    .field select {
        padding: 12px 14px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        font: 14px 'Public Sans', sans-serif;
        color: var(--ink);
        width: 100%;
    }

    .field input:focus,
    .field select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-soft);
    }

    .gender-toggle {
        display: flex;
        gap: 8px;
    }

    .gender-toggle label {
        flex: 1;
        text-align: center;
        padding: 11px;
        border: 1px solid var(--line);
        border-radius: 8px;
        font: 500 13px 'Public Sans', sans-serif;
        color: var(--ink-muted);
        background: #fff;
        cursor: pointer;
    }

    .gender-toggle label {
        position: relative;
    }

    .gender-toggle input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
    }

    .gender-toggle input:checked+span {
        display: block;
    }

    .gender-toggle label:has(input:checked) {
        border-color: var(--primary);
        background: var(--primary-soft);
        color: var(--primary);
        font-weight: 600;
    }

    .history-field {
        grid-column: 1 / -1;
        display: flex;
        flex-direction: column;
        gap: 9px;
    }

    .history-field>span {
        font: 600 12px 'Public Sans', sans-serif;
        color: var(--ink-soft);
    }

    .history-field>span i {
        font-weight: 400;
        color: var(--ink-faintest);
        font-style: normal;
    }

    .chip-group {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .chip {
        display: inline-flex;
        align-items: center;
        position: relative;
    }

    .chip input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
    }

    .chip span {
        padding: 8px 13px;
        border: 1px solid var(--line);
        border-radius: 20px;
        font: 500 12.5px 'Public Sans', sans-serif;
        color: var(--ink-muted);
        cursor: pointer;
    }

    .chip label:has(input:checked) span {
        border-color: var(--primary);
        background: var(--primary-soft);
        color: var(--primary);
    }

    .rule-note {
        margin-top: 28px;
        max-width: 660px;
        display: flex;
        gap: 14px;
        padding: 16px 18px;
        background: var(--primary-soft);
        border-radius: 9px;
        align-items: flex-start;
    }

    .rule-note .i {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: var(--primary);
        color: #fff;
        flex: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font: 600 12px 'Public Sans', sans-serif;
    }

    .rule-note p {
        font: 12.5px/1.6 'Public Sans', sans-serif;
        color: #255F54;
    }

    .form-actions {
        margin-top: 30px;
        display: flex;
        gap: 12px;
        max-width: 660px;
    }

    .btn-outline,
    .btn-primary {
        padding: 12px 26px;
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
    }

    .btn-primary:hover {
        background: var(--primary-dark);
    }

    @media (max-width: 640px) {
        .page-pad {
            padding: 24px 20px;
        }

        .profil-grid {
            grid-template-columns: 1fr;
        }

        .stepper-line {
            width: 24px;
            margin: 0 8px;
        }
    }
</style>
@endsection

@section('content')
<div class="page-pad">
    <div class="stepper">
        <div class="stepper-step current"><span>1</span><span>Profil anak</span></div>
        <div class="stepper-line"></div>
        <div class="stepper-step"><span>2</span><span>Kuesioner</span></div>
        <div class="stepper-line"></div>
        <div class="stepper-step"><span>3</span><span>Hasil</span></div>
    </div>

    <h1>Data anak</h1>
    <p>Usia anak menentukan himpunan aturan (rule base) yang dipakai, karena patokan milestone berbeda per kelompok
        usia.</p>

    <form onsubmit="event.preventDefault(); window.location.href='{{ route('skrining.kuesioner') }}';">
        <div class="profil-grid">
            <div class="field">
                <label for="nama">Nama anak</label>
                <input type="text" id="nama" name="nama" placeholder="Aruna Kirana">
            </div>
            <div class="field">
                <label for="lahir">Tanggal lahir</label>
                <input type="date" id="lahir" name="lahir">
            </div>
            <div class="field">
                <span style="font:600 12px 'Public Sans',sans-serif;color:var(--ink-soft);margin-bottom:7px;display:block">Jenis
                    kelamin</span>
                <div class="gender-toggle">
                    <label><input type="radio" name="gender" value="perempuan" checked><span>Perempuan</span></label>
                    <label><input type="radio" name="gender" value="laki-laki"><span>Laki-laki</span></label>
                </div>
            </div>
            <div class="field">
                <label for="bahasa">Bahasa utama di rumah</label>
                <input type="text" id="bahasa" name="bahasa" placeholder="Indonesia + Jawa">
            </div>
            <div class="history-field">
                <span>Riwayat yang relevan <i>— pilih bila ada</i></span>
                <div class="chip-group">
                    <label class="chip"><input type="checkbox" name="riwayat[]" value="prematur" checked><span>Lahir
                            prematur</span></label>
                    <label class="chip"><input type="checkbox" name="riwayat[]"
                            value="infeksi-telinga"><span>Pernah infeksi telinga berulang</span></label>
                    <label class="chip"><input type="checkbox" name="riwayat[]" value="keluarga"><span>Ada anggota
                            keluarga terlambat bicara</span></label>
                    <label class="chip"><input type="checkbox" name="riwayat[]" value="screentime"><span>Screen time
                            &gt; 3 jam/hari</span></label>
                </div>
            </div>
        </div>

        <div class="rule-note">
            <span class="i" aria-hidden="true">i</span>
            <p><b>Usia 31 bulan</b> — kuesioner yang dipakai: kelompok 24–36 bulan, 24 pertanyaan gejala inti dan 6
                pertanyaan gejala penyerta.</p>
        </div>

        <div class="form-actions">
            <a href="{{ route('masuk') }}" class="btn-outline">Kembali</a>
            <button type="submit" class="btn-primary">Mulai kuesioner</button>
        </div>
    </form>
</div>
@endsection
