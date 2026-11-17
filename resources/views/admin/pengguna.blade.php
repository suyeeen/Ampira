@extends('layouts.panel', ['peran' => 'admin'])

@section('title', 'Ampira — Panel admin: pengguna dan peran')

@section('head')
<style>
    .peran-select {
        appearance: none;
        -webkit-appearance: none;
        width: 150px;
        background: var(--surface) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2356665F' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E") no-repeat right 10px center;
        border: 1px solid var(--line);
        border-radius: 10px;
        padding: 8px 32px 8px 12px;
        font: inherit;
        font-size: 14px;
        font-weight: 500;
        color: var(--ink);
    }

    .nama-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .nama-cell .av {
        width: 32px;
        height: 32px;
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
</style>
@endsection

@section('content')
<div class="panel-head">
    <div>
        <h1>Pengguna dan peran</h1>
        <p>Data contoh &middot; Atur peran setiap akun.</p>
    </div>
</div>

<div class="panel-head" style="align-items:center">
    <div class="filter-group" id="apFilterGroup">
        <button type="button" class="active" data-filter="Semua">Semua</button>
        <button type="button" data-filter="Orang tua">Orang tua</button>
        <button type="button" data-filter="Pakar">Pakar</button>
        <button type="button" data-filter="Admin">Admin</button>
    </div>
    <x-tombol variant="utama">+ Undang pengguna</x-tombol>
</div>

<div class="table-wrap table-scroll">
    <table>
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Peran</th>
                <th scope="col">Terdaftar</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody id="apBody"></tbody>
    </table>
</div>

<script>
    const pengguna = @json($pengguna);
    let filter = 'Semua';

    const apBody = document.getElementById('apBody');

    function renderRows() {
        apBody.innerHTML = '';
        pengguna
            .filter(u => filter === 'Semua' || u.peran === filter)
            .forEach(u => {
                const inisial = u.nama.replace(/[\[\]]/g, '').slice(0, 1);
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td><span class="nama-cell"><span class="av">${inisial}</span><span style="font-weight:600">${u.nama}</span></span></td>
                    <td style="color:var(--muted)">${u.email}</td>
                    <td>
                        <label class="visually-hidden" for="peran-${u.id}">Peran ${u.nama}</label>
                        <select id="peran-${u.id}" data-id="${u.id}" class="peran-select">
                            <option value="Orang tua" ${u.peran === 'Orang tua' ? 'selected' : ''}>Orang tua</option>
                            <option value="Pakar" ${u.peran === 'Pakar' ? 'selected' : ''}>Pakar</option>
                            <option value="Admin" ${u.peran === 'Admin' ? 'selected' : ''}>Admin</option>
                        </select>
                    </td>
                    <td style="color:var(--muted)">${u.tgl}</td>
                    <td><span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:999px;font-weight:600;font-size:12px;background:var(--ok-soft);color:var(--ok)">Aktif</span></td>`;
                apBody.appendChild(tr);
            });
    }

    document.getElementById('apFilterGroup').addEventListener('click', (e) => {
        const btn = e.target.closest('button[data-filter]');
        if (!btn) return;
        document.querySelectorAll('#apFilterGroup button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        filter = btn.dataset.filter;
        renderRows();
    });

    apBody.addEventListener('change', (e) => {
        const select = e.target.closest('select[data-id]');
        if (!select) return;
        const u = pengguna.find(p => p.id === select.dataset.id);
        if (u) u.peran = select.value;
    });

    renderRows();
</script>
@endsection
