@extends('layouts.panel', ['peran' => 'pakar'])

@section('title', 'Ampira — Panel pakar: gejala dan CF')

@section('content')
<div class="panel-head">
    <div>
        <h1>Gejala dan bobot CF</h1>
        <p>{{ $gejala->count() }} gejala &middot; nilai CF menunggu validasi pakar</p>
    </div>
    <div class="filter-group" role="group" aria-label="Filter jalur" id="filterGroup">
        <button type="button" class="active" data-filter="semua">Semua</button>
        <button type="button" data-filter="A">Jalur A</button>
        <button type="button" data-filter="B">Jalur B</button>
    </div>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th scope="col">Kode</th>
                <th scope="col">Gejala</th>
                <th scope="col">Jalur</th>
                <th scope="col">CF pakar</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody id="gejalaBody">
            @foreach ($gejala as $g)
                <tr data-jalur="{{ $g->jalur }}">
                    <td style="font-weight:700">{{ $g->kode }}</td>
                    <td>{{ $g->pertanyaan }}</td>
                    <td style="color:var(--ink-muted)">{{ $g->jalur }} &middot; {{ $g->jalur === 'A' ? 'gejala inti' : 'penyerta' }}</td>
                    <td style="color:var(--ink-muted)">{{ $g->cf_pakar ?? '—' }}</td>
                    <td><span class="status-pill">Menunggu validasi</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div
    style="display:flex;flex-wrap:wrap;gap:12px;align-items:center;padding:18px 20px;background:var(--white);border:1px solid var(--line);border-radius:16px">
    <p style="flex:1 1 320px;margin:0;font-size:15px;color:var(--ink-muted);line-height:1.5">Menemukan gejala yang
        kurang tepat atau bobot yang perlu diubah?</p>
    <button type="button" class="btn-accent" id="btnAjukan">Ajukan koreksi ke admin</button>
    <span role="status" id="ajukanStatus"
        style="display:none;flex:1 1 100%;font-size:14px;font-weight:600;color:#0A524C">Koreksi terkirim ke admin
        (contoh).</span>
</div>

<script>
    document.getElementById('filterGroup').addEventListener('click', (e) => {
        const btn = e.target.closest('button[data-filter]');
        if (!btn) return;
        document.querySelectorAll('#filterGroup button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        document.querySelectorAll('#gejalaBody tr').forEach(tr => {
            tr.style.display = (filter === 'semua' || tr.dataset.jalur === filter) ? '' : 'none';
        });
    });

    document.getElementById('btnAjukan').addEventListener('click', () => {
        document.getElementById('ajukanStatus').style.display = '';
    });
</script>
@endsection
