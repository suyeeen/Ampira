@extends('layouts.panel', ['peran' => 'pakar'])

@section('title', 'Ampira — Panel pakar: gejala dan CF')

@section('content')
@php
    $totalGejala = $gejala->count();
    $divalidasi = $gejala->where('cf_pakar', '!=', null)->count();
    $jalurA = $gejala->where('jalur', 'A')->count();
    $jalurB = $gejala->where('jalur', 'B')->count();
@endphp

<div class="panel-head">
    <div>
        <h1>Gejala dan bobot CF</h1>
        <p>{{ $totalGejala }} gejala dari basis pengetahuan, menunggu validasi Anda.</p>
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
        <div class="top"><span>Jumlah gejala</span>
            <span class="ic">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#C6F36B" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                </svg>
            </span>
        </div>
        <strong>{{ $totalGejala }}</strong>
    </div>
    <div class="stat-card">
        <div class="top"><span>Sudah divalidasi</span>
            <span class="ic">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0E6E66" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 6 9 17l-5-5" />
                </svg>
            </span>
        </div>
        <strong>{{ $divalidasi }}</strong>
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
        <strong>{{ $divalidasi }} / {{ $totalGejala }}</strong>
    </div>
</div>

<div class="panel-head" style="align-items:center">
    <div class="filter-group" id="filterGroup">
        <button type="button" class="active" data-filter="semua">Semua</button>
        <button type="button" data-filter="A">Jalur A</button>
        <button type="button" data-filter="B">Jalur B</button>
    </div>
    <span id="hitunganTampil" style="font-size:13px;color:var(--muted)">Menampilkan {{ $totalGejala }} dari
        {{ $totalGejala }} gejala</span>
</div>

<div class="table-wrap table-scroll">
    <table>
        <thead>
            <tr>
                <th scope="col">Kode</th>
                <th scope="col">Gejala</th>
                <th scope="col">Klaster</th>
                <th scope="col">CF pakar</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody id="gejalaBody">
            @foreach ($gejala as $g)
                <tr data-jalur="{{ $g->jalur }}">
                    <td style="font-weight:700">{{ $g->kode }}</td>
                    <td>{{ $g->pertanyaan }}</td>
                    <td>
                        @if ($g->klaster)
                            <x-lencana variant="peringatan">{{ $g->klaster->nama_klaster }}</x-lencana>
                        @else
                            <span style="color:var(--muted)">&mdash;</span>
                        @endif
                    </td>
                    <td style="color:var(--muted)">{{ $g->cf_pakar ?? '—' }}</td>
                    <td><x-lencana variant="netral">Menunggu validasi</x-lencana></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="kartu"
    style="display:flex;flex-wrap:wrap;gap:16px;align-items:center;padding:18px 24px">
    <div style="flex:1 1 320px">
        <strong style="display:block;font-size:15px;font-weight:700">Menemukan gejala yang kurang tepat?</strong>
        <span style="font-size:14px;color:var(--muted)">Kirim catatan ke admin. Admin yang mengubah basis
            pengetahuan.</span>
    </div>
    <x-tombol variant="utama" id="btnAjukan">Ajukan koreksi ke admin</x-tombol>
    <span role="status" id="ajukanStatus" style="display:none;flex:1 1 100%;font-size:14px;font-weight:600;color:var(--ok)">Koreksi
        terkirim ke admin (contoh).</span>
</div>

<script>
    const totalGejala = {{ $totalGejala }};
    document.getElementById('filterGroup').addEventListener('click', (e) => {
        const btn = e.target.closest('button[data-filter]');
        if (!btn) return;
        document.querySelectorAll('#filterGroup button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        let tampil = 0;
        document.querySelectorAll('#gejalaBody tr').forEach(tr => {
            const cocok = filter === 'semua' || tr.dataset.jalur === filter;
            tr.style.display = cocok ? '' : 'none';
            if (cocok) tampil++;
        });
        document.getElementById('hitunganTampil').textContent = `Menampilkan ${tampil} dari ${totalGejala} gejala`;
    });

    document.getElementById('btnAjukan').addEventListener('click', () => {
        document.getElementById('ajukanStatus').style.display = '';
    });
</script>
@endsection
