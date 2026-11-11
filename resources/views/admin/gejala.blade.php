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
        flex: 1 1 280px;
        min-width: 0;
        background: var(--white);
        border: 2px solid var(--accent);
        border-radius: 16px;
        padding: 22px;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .ag-form h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 800;
    }

    .ag-form p {
        margin: 0;
        font-size: 14px;
        line-height: 1.5;
        color: var(--ink-muted);
    }

    .ag-form label {
        font-size: 14px;
        font-weight: 600;
    }

    .ag-form input {
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid var(--input-border);
        font: inherit;
        font-size: 15px;
    }

    .ag-row.editing {
        background: #F5F0FF;
    }
</style>
@endsection

@section('content')
<div class="panel-head">
    <div>
        <h1>Gejala dan bobot CF</h1>
        <p>Klik "Ubah" untuk mengisi bobot CF dari hasil validasi pakar.</p>
    </div>
    <button type="button" class="btn-accent">+ Tambah gejala</button>
</div>

<div class="stat-grid">
    <div class="stat-card"><span>Gejala Jalur A</span><strong>{{ $gejala->where('jalur', 'A')->count() }}</strong></div>
    <div class="stat-card"><span>Gejala Jalur B</span><strong>{{ $gejala->where('jalur', 'B')->count() }}</strong></div>
    <div class="stat-card"><span>CF sudah diisi</span><strong id="statTerisi">0 / {{ $gejala->count() }}</strong></div>
</div>

<div class="ag-wrap">
    <div class="ag-table-col table-wrap">
        <table>
            <thead>
                <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Gejala</th>
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
        <div style="display:flex;flex-direction:column;gap:8px">
            <label for="agCf">Bobot CF pakar (0 sampai 1)</label>
            <input id="agCf" type="number" min="0" max="1" step="0.05" placeholder="contoh: 0,8">
        </div>
        <div style="display:flex;gap:10px;flex-wrap:wrap">
            <button type="submit" class="btn-accent">Simpan</button>
            <button type="button" class="btn-outline" id="agBatal">Batal</button>
        </div>
        <p style="font-size:13px;color:var(--ink-muted)">Prototipe: perubahan belum disimpan ke database.</p>
    </form>
</div>

<script>
    const gejala = @json($gejala->map(fn ($g) => ['kode' => $g->kode, 'teks' => $g->pertanyaan, 'cf' => $g->cf_pakar]));
    let editing = null;

    const agBody = document.getElementById('agBody');
    const agForm = document.getElementById('agForm');
    const agFormTitle = document.getElementById('agFormTitle');
    const agFormTeks = document.getElementById('agFormTeks');
    const agCf = document.getElementById('agCf');
    const statTerisi = document.getElementById('statTerisi');

    function formatCf(v) {
        return v === null || v === undefined ? '—' : String(v).replace('.', ',');
    }

    function renderTable() {
        agBody.innerHTML = '';
        gejala.forEach((g, k) => {
            const tr = document.createElement('tr');
            tr.className = 'ag-row' + (k === editing ? ' editing' : '');
            tr.innerHTML = `
                <td style="font-weight:700">${g.kode}</td>
                <td>${g.teks}</td>
                <td style="font-weight:600">${formatCf(g.cf)}</td>
                <td style="text-align:right"><button type="button" class="btn-outline" data-k="${k}">Ubah</button></td>`;
            agBody.appendChild(tr);
        });
        statTerisi.textContent = `${gejala.filter(g => g.cf !== null && g.cf !== undefined).length} / ${gejala.length}`;
    }

    agBody.addEventListener('click', (e) => {
        const btn = e.target.closest('button[data-k]');
        if (!btn) return;
        editing = Number(btn.dataset.k);
        const g = gejala[editing];
        agFormTitle.textContent = `Ubah ${g.kode}`;
        agFormTeks.textContent = g.teks;
        agCf.value = g.cf !== null && g.cf !== undefined ? g.cf : '';
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
