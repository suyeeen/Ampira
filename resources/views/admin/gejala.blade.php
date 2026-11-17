@extends('layouts.panel', ['peran' => 'admin'])

@section('title', 'Ampira — Panel admin: kelola gejala dan CF')

@section('head')
<style>
    .ag-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        align-items: flex-start;
    }

    .ag-table-col {
        flex: 999 1 480px;
        min-width: 0;
    }

    .ag-form {
        flex: 1 1 320px;
        min-width: 0;
        background: var(--surface);
        border: 2px solid var(--brand);
        border-radius: var(--radius-card);
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .ag-form h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 800;
    }

    .ag-form>p {
        margin: 0;
        font-size: 14px;
        line-height: 1.5;
        color: var(--muted);
    }

    .ag-row.editing {
        background: var(--lime-soft);
    }
</style>
@endsection

@section('content')
@php
    $gejalaJs = $gejala
        ->map(function ($g) {
            return [
                'kode' => $g->kode,
                'teks' => $g->pertanyaan,
                'jalur' => $g->jalur,
                'klaster' => $g->klaster?->nama_klaster,
                'cf' => $g->cf_pakar,
            ];
        })
        ->values();
@endphp

<div class="panel-head">
    <div>
        <h1>Gejala dan bobot CF</h1>
        <p>Data contoh &middot; Isi bobot CF dari hasil validasi pakar.</p>
    </div>
</div>

<div class="panel-head" style="align-items:center">
    <div class="filter-group" id="filterGroup">
        <button type="button" class="active" data-filter="semua">Semua</button>
        <button type="button" data-filter="A">Jalur A</button>
        <button type="button" data-filter="B">Jalur B</button>
    </div>
    <div style="display:flex;gap:10px">
        <x-tombol variant="sekunder">Impor dari Excel</x-tombol>
        <x-tombol variant="utama">+ Tambah gejala</x-tombol>
    </div>
</div>

<div class="ag-wrap">
    <div class="ag-table-col table-wrap table-scroll">
        <table>
            <thead>
                <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Gejala</th>
                    <th scope="col">Klaster</th>
                    <th scope="col">CF pakar</th>
                    <th scope="col"><span class="visually-hidden">Aksi</span></th>
                </tr>
            </thead>
            <tbody id="agBody"></tbody>
        </table>
    </div>

    <form class="ag-form" id="agForm" style="display:none">
        <h2 id="agFormTitle"></h2>
        <p id="agFormTeks"></p>
        <x-isian label="Bobot CF pakar (0–1)" id="agCf" type="number" min="0" max="1" step="0.05"
            placeholder="contoh: 0,8" />
        <x-isian label="Catatan validasi" id="agCatatan" placeholder="Contoh: disetujui pakar" />
        <div style="display:flex;gap:10px">
            <x-tombol variant="utama" type="submit">Simpan</x-tombol>
            <x-tombol variant="sekunder" type="button" id="agBatal">Batal</x-tombol>
        </div>
        <p style="font-size:12px;color:var(--muted)">Prototipe: perubahan belum disimpan ke database.</p>
    </form>
</div>

<script>
    const gejala = @json($gejalaJs);
    let editing = null;

    const agBody = document.getElementById('agBody');
    const agForm = document.getElementById('agForm');
    const agFormTitle = document.getElementById('agFormTitle');
    const agFormTeks = document.getElementById('agFormTeks');
    const agCf = document.getElementById('agCf');
    const agCatatan = document.getElementById('agCatatan');

    function lencana(variant, label) {
        const styles = {
            netral: 'background:var(--chip);color:var(--muted)',
            peringatan: 'background:var(--warn-soft);color:var(--warn)',
        };
        return `<span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:999px;font-weight:600;font-size:12px;${styles[variant]}">${label}</span>`;
    }

    function formatCf(v) {
        return v === null || v === undefined ? '—' : String(v).replace('.', ',');
    }

    let activeFilter = 'semua';

    function renderTable() {
        agBody.innerHTML = '';
        gejala.forEach((g, k) => {
            if (activeFilter !== 'semua' && g.jalur !== activeFilter) return;
            const tr = document.createElement('tr');
            tr.dataset.jalur = g.jalur;
            tr.className = 'ag-row' + (k === editing ? ' editing' : '');
            tr.innerHTML = `
                <td style="font-weight:700">${g.kode}</td>
                <td>${g.teks}</td>
                <td>${g.klaster ? lencana('peringatan', g.klaster) : '<span style="color:var(--muted)">—</span>'}</td>
                <td style="color:var(--muted)">${formatCf(g.cf)}</td>
                <td style="text-align:right"><button type="button" data-k="${k}" style="padding:7px 14px;border-radius:999px;border:1px solid var(--line);background:var(--surface);font-weight:600;font-size:13px;cursor:pointer;font-family:inherit">Ubah</button></td>`;
            agBody.appendChild(tr);
        });
    }

    document.getElementById('filterGroup').addEventListener('click', (e) => {
        const btn = e.target.closest('button[data-filter]');
        if (!btn) return;
        document.querySelectorAll('#filterGroup button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        activeFilter = btn.dataset.filter;
        renderTable();
    });

    agBody.addEventListener('click', (e) => {
        const btn = e.target.closest('button[data-k]');
        if (!btn) return;
        editing = Number(btn.dataset.k);
        const g = gejala[editing];
        agFormTitle.textContent = `Ubah ${g.kode}`;
        agFormTeks.textContent = g.teks;
        agCf.value = g.cf !== null && g.cf !== undefined ? g.cf : '';
        agCatatan.value = '';
        agForm.style.display = 'flex';
        renderTable();
    });

    document.getElementById('agBatal').addEventListener('click', () => {
        editing = null;
        agForm.style.display = 'none';
        renderTable();
    });

    agForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const v = parseFloat(String(agCf.value).replace(',', '.'));
        if (isNaN(v) || v < 0 || v > 1) return;
        gejala[editing].cf = v.toFixed(2);
        editing = null;
        agForm.style.display = 'none';
        renderTable();
    });

    renderTable();
</script>
@endsection
