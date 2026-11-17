@extends('layouts.panel', ['peran' => 'admin'])

@section('title', 'Ampira — Panel admin: ringkasan')

@section('head')
<style>
    .row-2 {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        align-items: stretch;
    }

    .grafik-card {
        flex: 1 1 560px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .grafik-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .grafik-head strong {
        font-size: 16px;
        font-weight: 700;
    }

    .batang-wrap {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        height: 220px;
        gap: 8px;
    }

    .batang-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        flex: 1;
    }

    .batang-col .nilai {
        font-size: 12px;
        font-weight: 600;
        color: var(--muted);
    }

    .batang-col .bar {
        width: 32px;
        border-radius: 10px;
        background: var(--brand);
    }

    .batang-col.terbaru .bar {
        background: var(--lime);
    }

    .batang-col .lbl {
        font-size: 12px;
        color: var(--muted);
    }

    .sebaran-card {
        flex: 1 1 360px;
        max-width: 400px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .sebaran-card strong.judul {
        font-size: 16px;
        font-weight: 700;
    }

    .sebaran-row {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .sebaran-row .top {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
    }

    .sebaran-bar {
        height: 8px;
        background: var(--chip);
        border-radius: 999px;
        overflow: hidden;
    }

    .sebaran-bar span {
        display: block;
        height: 8px;
        border-radius: 999px;
    }

    .tag-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
</style>
@endsection

@php
    $varianKategori = function ($kategori) {
        if ($kategori === 'Tinggi') {
            return 'bahaya';
        }
        if ($kategori === 'Rendah') {
            return 'aman';
        }

        return 'brand';
    };
@endphp

@section('content')
<div class="panel-head">
    <div>
        <h1>Ringkasan</h1>
        <p>Data contoh &middot; Gambaran pemakaian Ampira bulan ini.</p>
    </div>
    <div class="panel-head-tools">
        <span class="panel-search">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#56665F" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M11 19a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM21 21l-4.3-4.3" />
            </svg>
            Cari&hellip;
        </span>
        <button type="button" class="panel-icon-btn" aria-label="Notifikasi">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0B130F" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9M13.7 21a2 2 0 0 1-3.4 0" />
            </svg>
        </button>
    </div>
</div>

<div class="stat-grid">
    <div class="stat-card sorot">
        <div class="top"><span>Skrining bulan ini</span>
            <span class="ic">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#C6F36B" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18zM12 7v5l3 2" />
                </svg>
            </span>
        </div>
        <strong>{{ $skriningBulanIni }}</strong>
    </div>
    <div class="stat-card">
        <div class="top"><span>Pengguna terdaftar</span>
            <span class="ic">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM23 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8" />
                </svg>
            </span>
        </div>
        <strong>{{ $penggunaTerdaftar }}</strong>
    </div>
    <div class="stat-card">
        <div class="top"><span>Jumlah gejala</span>
            <span class="ic">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                </svg>
            </span>
        </div>
        <strong>{{ $totalGejala }}</strong>
    </div>
    <div class="stat-card">
        <div class="top"><span>Bobot CF terisi</span>
            <span class="ic">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 21v-7M4 10V3M12 21v-9M12 8V3M20 21v-5M20 12V3M1 14h6M9 8h6M17 16h6" />
                </svg>
            </span>
        </div>
        <strong>{{ $cfTerisi }} / {{ $totalGejala }}</strong>
    </div>
</div>

<div class="row-2">
    <div class="kartu grafik-card">
        <div class="grafik-head">
            <strong>Skrining per minggu</strong>
            <x-lencana variant="netral">8 minggu terakhir</x-lencana>
        </div>
        <div class="batang-wrap">
            @foreach ($skriningPerMinggu as $i => $v)
                <div class="batang-col {{ $loop->last ? 'terbaru' : '' }}">
                    <span class="nilai">{{ $v }}</span>
                    <span class="bar" style="height:{{ $v * 24 }}px"></span>
                    <span class="lbl">M{{ $i + 1 }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="kartu sebaran-card">
        <strong class="judul">Sebaran kategori hasil</strong>
        @php($totalAnak = collect($sebaranKategori)->sum('jumlah'))
        @foreach ($sebaranKategori as $s)
            <div class="sebaran-row">
                <div class="top"><span>{{ $s['label'] }}</span><strong>{{ $s['jumlah'] }} anak</strong></div>
                <div class="sebaran-bar"><span
                        style="width:{{ $totalAnak ? round(100 * $s['jumlah'] / $totalAnak) : 0 }}%;background:var(--{{ $s['warna'] }})"></span>
                </div>
            </div>
        @endforeach
        <hr class="garis" style="margin:4px 0">
        <strong style="font-size:14px;font-weight:700">Saran pemeriksaan Jalur B</strong>
        <div class="tag-wrap">
            @foreach ($saranJalurB as $tag)
                <x-lencana variant="peringatan">{{ $tag }}</x-lencana>
            @endforeach
        </div>
    </div>
</div>

<strong style="font-size:16px;font-weight:700">Skrining terbaru</strong>
<div class="table-wrap table-scroll">
    <table>
        <thead>
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Orang tua</th>
                <th scope="col">Anak</th>
                <th scope="col">Keyakinan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Saran pemeriksaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skriningTerbaru as $row)
                <tr>
                    <td>{{ $row['tanggal'] }}</td>
                    <td>{{ $row['ortu'] }}</td>
                    <td>{{ $row['anak'] }}</td>
                    <td style="font-weight:600">{{ $row['keyakinan'] }}</td>
                    <td>
                        <x-lencana :variant="$varianKategori($row['kategori'])">{{ $row['kategori'] }}</x-lencana>
                    </td>
                    <td>
                        @if ($row['saran'] === 'Tidak ada')
                            <x-lencana variant="netral">Tidak ada</x-lencana>
                        @else
                            <x-lencana variant="peringatan">{{ $row['saran'] }}</x-lencana>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
