@extends('layouts.app', ['activeNav' => 'riwayat'])

@section('title', 'Ampira — Riwayat skrining')

@section('head')
<style>
    .filter-group {
        display: flex;
        gap: 4px;
        padding: 4px;
        border-radius: var(--radius-pill);
        background: var(--chip);
    }

    .filter-group button {
        padding: 8px 16px;
        border-radius: var(--radius-pill);
        border: 0;
        font-size: 14px;
        font-weight: 600;
        background: transparent;
        color: var(--muted);
        font-family: inherit;
        cursor: pointer;
    }

    .filter-group button.active {
        background: var(--deep);
        color: #fff;
    }

    .riwayat-row .anak-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .riwayat-row .anak-cell .av {
        width: 30px;
        height: 30px;
        border-radius: 999px;
        background: var(--lime-soft);
        color: var(--deep);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 13px;
        flex: none;
    }

    .keyakinan-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .keyakinan-cell .bar {
        width: 110px;
        height: 8px;
        background: var(--chip);
        border-radius: 999px;
        overflow: hidden;
        flex: none;
    }

    .keyakinan-cell .bar span {
        display: block;
        height: 8px;
        background: var(--brand);
        border-radius: 999px;
    }
</style>
@endsection

@section('content')
<div class="page-head">
    <div>
        <h1>Riwayat skrining</h1>
        <p>Data contoh &middot; Bandingkan hasil dari waktu ke waktu.</p>
    </div>
    <div class="filter-group" id="filterAnak">
        <button type="button" class="active" data-f="semua">Semua anak</button>
        <button type="button" data-f="a">Anak A</button>
        <button type="button" data-f="b">Anak B</button>
    </div>
</div>

<div class="table-wrap table-scroll">
    <table>
        <thead>
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Anak</th>
                <th scope="col">Keyakinan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Saran pemeriksaan</th>
                <th scope="col"><span class="visually-hidden">Aksi</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $item)
                <tr class="riwayat-row">
                    <td>{{ $item['tanggal'] }}</td>
                    <td>
                        <div class="anak-cell">
                            <span class="av" aria-hidden="true">{{ Str::substr($item['anak'], -1) }}</span>
                            <span>{{ $item['anak'] }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="keyakinan-cell">
                            <span class="bar"><span style="width:{{ $item['keyakinan'] }}%"></span></span>
                            <span>{{ $item['keyakinan'] }}%</span>
                        </div>
                    </td>
                    <td>
                        @php
                            $varian = match (true) {
                                $item['kategori'] === 'Tinggi' => 'bahaya',
                                $item['kategori'] === 'Rendah' => 'aman',
                                default => 'brand',
                            };
                        @endphp
                        <x-lencana :variant="$varian">{{ $item['kategori'] }}</x-lencana>
                    </td>
                    <td>
                        @if ($item['rujukan'] === 'Ada')
                            <x-lencana variant="peringatan">Ada catatan</x-lencana>
                        @else
                            <x-lencana variant="netral">Tidak ada</x-lencana>
                        @endif
                    </td>
                    <td style="text-align:right">
                        <x-tombol variant="kecil" href="{{ route('hasil') }}">Lihat</x-tombol>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('filterAnak').addEventListener('click', (e) => {
        const btn = e.target.closest('button[data-f]');
        if (!btn) return;
        document.querySelectorAll('#filterAnak button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    });
</script>
@endsection
