@extends('layouts.app', ['activeNav' => 'beranda'])

@section('title', 'Ampira — Beranda')

@section('head')
<style>
    .hero-ajakan {
        flex: 1 1 520px;
        background: var(--deep);
        border-radius: var(--radius-hero);
        padding: 40px;
        display: flex;
        flex-direction: column;
        gap: 18px;
        color: #fff;
    }

    .hero-ajakan .chip {
        align-self: flex-start;
        background: var(--deep2);
        border-radius: var(--radius-pill);
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        color: var(--lime);
    }

    .hero-ajakan h2 {
        margin: 0;
        font-size: 32px;
        font-weight: 800;
        line-height: 1.2;
    }

    .hero-ajakan p {
        margin: 0;
        font-size: 16px;
        color: var(--side-text);
    }

    .hero-ajakan .baris-aksi {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 4px;
    }

    .hero-ajakan .baris-aksi span {
        font-size: 14px;
        color: var(--side-text);
    }

    .profil-anak {
        flex: 1 1 380px;
        max-width: 400px;
    }

    .profil-head {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .profil-head .avatar {
        width: 52px;
        height: 52px;
        border-radius: 999px;
        background: var(--lime-soft);
        color: var(--deep);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 20px;
        flex: none;
    }

    .profil-head strong {
        display: block;
        font-size: 18px;
        font-weight: 700;
    }

    .profil-head span {
        font-size: 14px;
        color: var(--muted);
    }

    .garis {
        height: 1px;
        background: var(--line);
        border: 0;
        margin: 0;
    }

    .row-3 {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
    }

    .langkah-card {
        flex: 1 1 260px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .langkah-card .num {
        width: 36px;
        height: 36px;
        border-radius: 999px;
        background: var(--lime-soft);
        color: var(--deep);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 15px;
    }

    .langkah-card strong {
        font-size: 17px;
        font-weight: 700;
    }

    .langkah-card p {
        margin: 0;
        font-size: 14px;
        color: var(--muted);
    }

    .ajakan-chat {
        flex: 1 1 380px;
        max-width: 400px;
        background: var(--brand-soft);
        border: 0;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .ajakan-chat strong {
        font-size: 17px;
        font-weight: 700;
    }

    .ajakan-chat p {
        margin: 0;
        font-size: 14px;
        color: var(--muted);
    }
</style>
@endsection

@section('content')
<div class="page-head">
    <div>
        <h1>Selamat siang, Orang tua A</h1>
        <p>Data contoh &middot; Pantau perkembangan bicara anak dan mulai skrining kapan saja.</p>
    </div>
    <x-tombol variant="sekunder">+ Tambah data anak</x-tombol>
</div>

<div class="row-3" style="align-items:stretch">
    <div class="hero-ajakan">
        <span class="chip">Skrining berikutnya</span>
        <h2>Sudah 1 bulan sejak skrining terakhir {{ $anak['nama'] }}.</h2>
        <p>Skrining ulang membantu Anda melihat perubahan. Butuh sekitar 10 menit.</p>
        <div class="baris-aksi">
            <x-tombol variant="aksen" href="{{ route('skrining.profil') }}">Mulai skrining</x-tombol>
            <span>17 pertanyaan &middot; 3 langkah</span>
        </div>
    </div>

    <div class="kartu profil-anak">
        <div class="profil-head">
            <span class="avatar" aria-hidden="true">{{ Str::substr($anak['nama'], -1) }}</span>
            <div>
                <strong>{{ $anak['nama'] }}</strong>
                <span>{{ $anak['usia'] }} &middot; {{ $anak['jenisKelamin'] }}</span>
            </div>
        </div>
        <hr class="garis">
        <div class="kv-row">
            <span class="k">Skrining terakhir</span>
            <span class="v">{{ $skriningTerakhir }}</span>
        </div>
        <div class="kv-row">
            <span class="k">Keyakinan indikasi</span>
            <span class="v">{{ $keyakinanPersen }}% &middot; {{ $kategori }}</span>
        </div>
        <div class="kv-row">
            <span class="k">Saran pemeriksaan</span>
            <x-lencana variant="peringatan">{{ $saranPemeriksaan }}</x-lencana>
        </div>
        <x-tombol variant="sekunder" href="{{ route('riwayat') }}" style="width:100%;margin-top:4px">Lihat
            riwayat</x-tombol>
    </div>
</div>

<div class="row-3">
    <div class="kartu langkah-card">
        <span class="num">1</span>
        <strong>Isi data anak</strong>
        <p>Usia anak menentukan pertanyaan yang muncul.</p>
    </div>
    <div class="kartu langkah-card">
        <span class="num">2</span>
        <strong>Jawab kuesioner</strong>
        <p>Pilih jawaban sesuai yang Anda amati sebulan terakhir.</p>
    </div>
    <div class="kartu langkah-card">
        <span class="num">3</span>
        <strong>Baca hasil dan saran</strong>
        <p>Lihat tingkat keyakinan indikasi dan langkah berikutnya.</p>
    </div>

    <div class="kartu ajakan-chat">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12a8 8 0 0 1-11.6 7.1L4 20l1-4.6A8 8 0 1 1 21 12z" />
        </svg>
        <strong>Ada pertanyaan tentang hasil?</strong>
        <p>[Nama psikolog] bisa dihubungi lewat chat.</p>
        <x-tombol variant="utama" href="{{ route('chat') }}">Chat psikolog</x-tombol>
    </div>
</div>
@endsection
