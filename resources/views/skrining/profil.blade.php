@extends('layouts.app', ['activeNav' => 'skrining'])

@section('title', 'Ampira — Data anak')

@section('head')
<style>
    .profil-row {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        align-items: flex-start;
    }

    .form-anak {
        flex: 1 1 560px;
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .form-anak h2 {
        margin: 0 0 4px;
        font-size: 24px;
        font-weight: 800;
    }

    .form-anak>p.lead {
        margin: 0;
        font-size: 15px;
        color: var(--muted);
    }

    .grid-2 {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .grid-2>* {
        flex: 1 1 240px;
        min-width: 0;
    }

    .jk-label {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }

    .jk-toggle {
        display: inline-flex;
        gap: 4px;
        background: var(--chip);
        border-radius: var(--radius-pill);
        padding: 4px;
    }

    .jk-toggle label {
        padding: 8px 18px;
        border-radius: var(--radius-pill);
        font-size: 14px;
        font-weight: 600;
        color: var(--muted);
        cursor: pointer;
    }

    .jk-toggle input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
    }

    .jk-toggle label:has(input:checked) {
        background: var(--deep);
        color: #fff;
    }

    .usia-box {
        background: var(--brand-soft);
        border-radius: 16px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .usia-box .col span {
        display: block;
        font-size: 13px;
        color: var(--muted);
    }

    .usia-box .col strong {
        font-size: 24px;
        font-weight: 800;
        color: var(--brand);
    }

    .usia-box p {
        margin: 0;
        font-size: 14px;
        flex: 1 1 260px;
    }

    .cek-paham {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }

    .cek-paham input {
        width: 20px;
        height: 20px;
        accent-color: var(--brand);
    }

    .form-aksi {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .tips-card {
        flex: 1 1 320px;
        max-width: 360px;
        background: var(--lime-soft);
        border: 0;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .tips-card h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
    }

    .tips-card .baris {
        display: flex;
        gap: 10px;
        font-size: 14px;
        line-height: 1.5;
    }
</style>
@endsection

@section('content')
<h1>Skrining baru</h1>

<div class="stepper">
    <div class="langkah sekarang"><span class="bulat">1</span><span class="label">Data anak</span></div>
    <span class="garis"></span>
    <div class="langkah"><span class="bulat">2</span><span class="label">Kuesioner</span></div>
    <span class="garis"></span>
    <div class="langkah"><span class="bulat">3</span><span class="label">Hasil</span></div>
</div>

<div class="profil-row">
    <form class="kartu form-anak"
        onsubmit="event.preventDefault(); window.location.href='{{ route('skrining.kuesioner') }}';">
        <div>
            <h2>Data anak</h2>
            <p class="lead">Data ini dipakai untuk menyesuaikan pertanyaan dengan usia anak.</p>
        </div>

        <div class="grid-2">
            <x-isian label="Nama panggilan anak" name="nama" placeholder="Contoh: Adik" />
            <x-isian label="Tanggal lahir" name="tanggal_lahir" type="date" id="tanggalLahir" />
        </div>

        <div>
            <span class="jk-label">Jenis kelamin</span>
            <div class="jk-toggle">
                <label><input type="radio" name="jk" value="L" checked> Laki-laki</label>
                <label><input type="radio" name="jk" value="P"> Perempuan</label>
            </div>
        </div>

        <div class="usia-box">
            <div class="col">
                <span>Usia anak saat ini</span>
                <strong id="usiaOutput">&mdash;</strong>
            </div>
            <p>Masuk rentang sasaran 12&ndash;60 bulan. Usia dihitung otomatis dari tanggal lahir.</p>
        </div>

        <label class="cek-paham">
            <input type="checkbox" required>
            Saya memahami bahwa hasil skrining bukan diagnosis.
        </label>

        <div class="form-aksi">
            <x-tombol variant="sekunder" href="{{ route('beranda') }}">Batal</x-tombol>
            <x-tombol variant="utama" type="submit">Lanjut ke kuesioner &rarr;</x-tombol>
        </div>
    </form>

    <div class="kartu tips-card">
        <h3>Tips mengisi</h3>
        @foreach (['Isi saat Anda tidak terburu-buru.', 'Jawab berdasarkan yang Anda lihat sendiri, bukan cerita orang lain.', 'Kalau anak diasuh orang lain, tanyakan juga pendapat pengasuhnya.'] as $tip)
            <div class="baris">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex:none;margin-top:1px">
                    <path d="M20 6 9 17l-5-5" />
                </svg>
                <span>{{ $tip }}</span>
            </div>
        @endforeach
    </div>
</div>

<script>
    const tanggalLahir = document.getElementById('tanggalLahir');
    const usiaOutput = document.getElementById('usiaOutput');

    function hitungUsiaBulan(tgl) {
        const lahir = new Date(tgl);
        if (isNaN(lahir)) return null;
        const now = new Date();
        let bulan = (now.getFullYear() - lahir.getFullYear()) * 12 + (now.getMonth() - lahir.getMonth());
        if (now.getDate() < lahir.getDate()) bulan--;
        return Math.max(0, bulan);
    }

    tanggalLahir.addEventListener('change', () => {
        const bulan = hitungUsiaBulan(tanggalLahir.value);
        usiaOutput.textContent = bulan === null ? '—' : bulan + ' bulan';
    });
</script>
@endsection
