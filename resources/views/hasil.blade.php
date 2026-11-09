@extends('layouts.app', ['activeNav' => '', 'maxWidth' => '880px'])

@section('title', 'Ampira — Hasil skrining')

@section('head')
<style>
    .hasil-badge {
        align-self: flex-start;
        padding: 8px 18px;
        border-radius: 999px;
        font-size: 22px;
        font-weight: 800;
    }

    .hasil-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 32px;
    }

    .hasil-grid>div {
        flex: 1 1 260px;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .hasil-grid h2 {
        margin: 0;
        font-size: 15px;
        font-weight: 600;
        color: var(--ink-muted);
    }

    .hasil-grid p {
        margin: 0;
        font-size: 16px;
        line-height: 1.6;
    }

    .confidence-value {
        font-size: 44px;
        font-weight: 800;
        line-height: 1;
    }

    .confidence-track {
        height: 10px;
        border-radius: 999px;
        background: var(--line-soft);
    }

    .confidence-fill {
        height: 10px;
        border-radius: 999px;
        background: var(--primary);
    }

    .confidence-note {
        font-size: 14px;
        color: var(--ink-muted);
        line-height: 1.5;
    }

    .jawaban-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 8px;
        padding: 14px 0;
        border-bottom: 1px solid var(--line-soft);
        font-size: 15px;
    }

    .jawaban-row:last-child {
        border-bottom: 0;
    }

    .saran-list {
        margin: 0;
        padding-left: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        font-size: 16px;
        line-height: 1.6;
    }

    .hasil-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .hasil-actions a {
        padding: 14px 22px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 16px;
    }

    .hasil-actions .btn-primary {
        background: var(--primary);
        color: var(--white);
        font-weight: 700;
    }

    .hasil-actions .btn-outline {
        border: 1px solid var(--input-border);
        background: var(--white);
        color: var(--ink);
        font-weight: 600;
    }
</style>
@endsection

@section('content')
<ol aria-label="Tahapan skrining" class="stepper">
    <li class="done">1. Data anak</li>
    <li class="done">2. Kuesioner</li>
    <li class="current">3. Hasil</li>
</ol>

<p class="alert-sample">Contoh tampilan. Angka dan saran menunggu basis pengetahuan yang divalidasi pakar.</p>

<div style="display:flex;flex-direction:column;gap:6px">
    <h1 style="margin:0;font-size:30px;font-weight:800">Hasil skrining</h1>
    <p style="margin:0;font-size:15px;color:var(--ink-muted)">{{ $namaAnak }} &middot; {{ $usiaBulan }} bulan
        &middot; {{ $tanggalSkrining }}</p>
</div>

<section aria-labelledby="judul-jalur-a" class="card hasil-grid">
    <div>
        <h2 id="judul-jalur-a">Indikasi keterlambatan bicara</h2>
        <span class="hasil-badge badge-{{ strtolower($kategori) }}">{{ $kategori }}</span>
        <p>{{ $ringkasan }}</p>
    </div>
    <div>
        <h2>Tingkat keyakinan sistem</h2>
        <span class="confidence-value">{{ $keyakinanPersen }}%</span>
        <div class="confidence-track" role="img" aria-label="Tingkat keyakinan {{ $keyakinanPersen }} persen">
            <div class="confidence-fill" style="width:{{ $keyakinanPersen }}%"></div>
        </div>
        <p class="confidence-note">Seberapa kuat jawaban Anda mengarah ke kategori di samping. Semakin tinggi,
            semakin kuat.</p>
    </div>
</section>

@if ($adaCatatanRujukan)
    <section aria-labelledby="judul-rujukan" class="alert-warning">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#8A4B00" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex:none">
            <path d="M12 9v4M12 17h.01" />
            <path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z" />
        </svg>
        <div style="display:flex;flex-direction:column;gap:6px">
            <h2 id="judul-rujukan">Catatan rujukan</h2>
            <p>{{ $catatanRujukan }}</p>
        </div>
    </section>
@endif

<section aria-labelledby="judul-saran" class="card" style="display:flex;flex-direction:column;gap:16px">
    <h2 id="judul-saran" style="margin:0;font-size:20px;font-weight:700">Saran langkah berikutnya</h2>
    <ul class="saran-list">
        @foreach ($saran as $poin)
            <li>{{ $poin }}</li>
        @endforeach
    </ul>
</section>

<section aria-labelledby="judul-jawaban" class="card" style="display:flex;flex-direction:column;gap:16px">
    <h2 id="judul-jawaban" style="margin:0;font-size:20px;font-weight:700">Jawaban yang paling berpengaruh</h2>
    <div style="display:flex;flex-direction:column">
        @foreach ($jawabanBerpengaruh as $item)
            <div class="jawaban-row">
                <span>{{ $item['pertanyaan'] }}</span>
                <strong>{{ $item['jawaban'] }}</strong>
            </div>
        @endforeach
    </div>
</section>

<p style="margin:0;font-size:14px;line-height:1.6;color:var(--ink-muted)">Ampira adalah alat skrining awal, bukan
    alat diagnosis. Keputusan klinis tetap berada pada psikolog, dokter anak, atau terapis wicara.</p>

<div class="hasil-actions">
    <a href="{{ route('riwayat') }}" class="btn-primary">Lihat riwayat</a>
    <a href="{{ route('skrining.profil') }}" class="btn-outline">Mulai skrining baru</a>
</div>
@endsection
