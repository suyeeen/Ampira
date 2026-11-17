@extends('layouts.app', ['activeNav' => 'skrining'])

@section('title', 'Ampira — Hasil skrining')

@section('head')
<style>
    .hasil-row {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        align-items: stretch;
    }

    .kartu-hasil {
        flex: 1 1 620px;
        background: var(--deep);
        color: #fff;
        border-radius: var(--radius-hero);
        padding: 40px;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .kartu-hasil .meta {
        font-size: 14px;
        color: var(--side-text);
    }

    .angka-besar {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .angka-besar .persen {
        font-size: 80px;
        font-weight: 800;
        color: var(--lime);
        line-height: 1;
    }

    .angka-besar .ket strong {
        display: block;
        font-size: 18px;
        font-weight: 700;
    }

    .angka-besar .ket span {
        font-size: 18px;
        color: var(--side-text);
    }

    .kategori-chip {
        align-self: flex-start;
        background: var(--lime);
        color: var(--deep);
        border-radius: var(--radius-pill);
        padding: 6px 14px;
        font-size: 14px;
        font-weight: 700;
    }

    .skala-track {
        height: 10px;
        background: var(--deep2);
        border-radius: 999px;
        overflow: hidden;
    }

    .skala-track span {
        display: block;
        height: 10px;
        background: var(--lime);
        border-radius: 999px;
    }

    .skala-label {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: var(--side-text);
    }

    .kartu-hasil>p.catatan {
        margin: 0;
        font-size: 14px;
        color: var(--side-text);
    }

    .jalur-b {
        flex: 1 1 380px;
        max-width: 420px;
        background: var(--warn-soft);
        border: 0;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .jalur-b .head {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .jalur-b .head strong {
        font-size: 18px;
        font-weight: 700;
        color: var(--warn);
    }

    .jalur-b p {
        margin: 0;
        font-size: 15px;
        line-height: 1.6;
    }

    .jalur-b .saran-box {
        background: var(--surface);
        border-radius: 14px;
        padding: 16px;
    }

    .jalur-b .saran-box span {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--muted);
        margin-bottom: 4px;
    }

    .jalur-b .saran-box strong {
        font-size: 15px;
        font-weight: 600;
    }

    .row-2 {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
    }

    .gejala-berpengaruh {
        flex: 1 1 500px;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .gejala-berpengaruh h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
    }

    .gb-row {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .gb-row .top {
        display: flex;
        justify-content: space-between;
        font-size: 15px;
    }

    .gb-row .top span.cf {
        font-weight: 600;
        color: var(--brand);
        font-size: 14px;
    }

    .gb-bar {
        height: 8px;
        background: var(--chip);
        border-radius: 999px;
        overflow: hidden;
    }

    .gb-bar span {
        display: block;
        height: 8px;
        background: var(--brand);
        border-radius: 999px;
    }

    .langkah-berikutnya {
        flex: 1 1 380px;
        max-width: 420px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .langkah-berikutnya h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
    }

    .langkah-berikutnya .baris {
        display: flex;
        gap: 10px;
        font-size: 14px;
        line-height: 1.5;
    }

    .langkah-berikutnya .aksi {
        display: flex;
        gap: 10px;
        margin-top: 4px;
        flex-wrap: wrap;
    }
</style>
@endsection

@section('content')
<h1>Hasil skrining</h1>

<div class="stepper">
    <div class="langkah selesai"><span class="bulat">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 6 9 17l-5-5" />
            </svg>
        </span><span class="label">Data anak</span></div>
    <span class="garis selesai"></span>
    <div class="langkah selesai"><span class="bulat">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 6 9 17l-5-5" />
            </svg>
        </span><span class="label">Kuesioner</span></div>
    <span class="garis selesai"></span>
    <div class="langkah sekarang"><span class="bulat">3</span><span class="label">Hasil</span></div>
</div>

<div class="hasil-row">
    <div class="kartu-hasil">
        <span class="meta">{{ $namaAnak }} &middot; {{ $usiaBulan }} bulan &middot; {{ $tanggalSkrining }}</span>
        <div class="angka-besar">
            <span class="persen">{{ $keyakinanPersen }}%</span>
            <div class="ket">
                <strong>Tingkat keyakinan indikasi</strong>
                <span>keterlambatan bicara</span>
            </div>
        </div>
        <span class="kategori-chip">Kategori: {{ $kategori }}</span>
        <div class="skala-track"><span style="width:{{ $keyakinanPersen }}%"></span></div>
        <div class="skala-label"><span>Rendah</span><span>Sedang</span><span>Tinggi</span></div>
        <p class="catatan">Angka ini menunjukkan seberapa yakin sistem bahwa ada indikasi. Ini bukan diagnosis.</p>
    </div>

    @if ($adaCatatanRujukan)
        <div class="kartu jalur-b">
            <div class="head">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#8A4B00" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 9v4M12 17h.01" />
                    <path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0z" />
                </svg>
                <strong>Perlu pemeriksaan lanjutan</strong>
            </div>
            <p>{{ $catatanRujukan }}</p>
            <div class="saran-box">
                <span>Saran</span>
                <strong>{{ $saran[0] ?? 'Konsultasikan dengan tenaga profesional.' }}</strong>
            </div>
            <x-tombol variant="utama" href="{{ route('chat') }}">Chat psikolog</x-tombol>
        </div>
    @endif
</div>

<div class="row-2">
    <div class="kartu gejala-berpengaruh">
        <h2>Jawaban yang paling berpengaruh</h2>
        @foreach ($jawabanBerpengaruh as $item)
            <div class="gb-row">
                <div class="top">
                    <span>{{ $item['pertanyaan'] }}</span>
                    <span class="cf">{{ $item['jawaban'] }}</span>
                </div>
                <div class="gb-bar"><span style="width:{{ 80 - $loop->index * 20 }}%"></span></div>
            </div>
        @endforeach
    </div>

    <div class="kartu langkah-berikutnya">
        <h2>Langkah berikutnya</h2>
        @foreach ($saran as $poin)
            <div class="baris">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex:none;margin-top:1px">
                    <path d="M20 6 9 17l-5-5" />
                </svg>
                <span>{{ $poin }}</span>
            </div>
        @endforeach
        <div class="aksi">
            <x-tombol variant="sekunder">Unduh hasil (PDF)</x-tombol>
            <x-tombol variant="sekunder" href="{{ route('skrining.profil') }}">Skrining ulang</x-tombol>
        </div>
    </div>
</div>
@endsection
