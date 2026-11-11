@extends('layouts.panel', ['peran' => 'admin'])

@section('title', 'Ampira — Panel admin: pengguna dan peran')

@section('content')
<div class="panel-head">
    <div>
        <h1>Pengguna dan peran</h1>
        <p>Data contoh. Ubah peran lewat pilihan di kolom Peran.</p>
    </div>
    <div class="filter-group" role="group" aria-label="Filter peran" id="apFilterGroup">
        <button type="button" class="active" data-filter="Semua">Semua</button>
        <button type="button" data-filter="Orang tua">Orang tua</button>
        <button type="button" data-filter="Pakar">Pakar</button>
        <button type="button" data-filter="Admin">Admin</button>
    </div>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Peran</th>
                <th scope="col">Terdaftar</th>
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
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="font-weight:600">${u.nama}</td>
                    <td style="color:var(--ink-muted)">${u.email}</td>
                    <td>
                        <label class="visually-hidden" for="peran-${u.id}">Peran ${u.nama}</label>
                        <select id="peran-${u.id}" data-id="${u.id}" style="padding:8px 10px;border-radius:9px;border:1px solid var(--input-border);background:var(--white);font-size:14px">
                            <option value="Orang tua" ${u.peran === 'Orang tua' ? 'selected' : ''}>Orang tua</option>
                            <option value="Pakar" ${u.peran === 'Pakar' ? 'selected' : ''}>Pakar</option>
                            <option value="Admin" ${u.peran === 'Admin' ? 'selected' : ''}>Admin</option>
                        </select>
                    </td>
                    <td style="color:var(--ink-muted)">${u.tgl}</td>`;
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
