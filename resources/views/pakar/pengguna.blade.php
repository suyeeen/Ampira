@extends('layouts.panel', ['peran' => 'pakar'])

@section('title', 'Ampira — Panel pakar: pengguna dan chat')

@section('head')
<style>
    .pu-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        align-items: flex-start;
    }

    .pu-list {
        flex: 1 1 300px;
        min-width: 0;
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: var(--radius-card);
        padding: 10px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .pu-list button {
        text-align: left;
        padding: 12px;
        border-radius: 14px;
        border: 0;
        display: flex;
        gap: 12px;
        align-items: center;
        color: var(--ink);
        background: transparent;
        font-family: inherit;
        cursor: pointer;
    }

    .pu-list button.active {
        background: var(--brand-soft);
    }

    .pu-list .av {
        width: 38px;
        height: 38px;
        border-radius: 999px;
        background: var(--chip);
        color: var(--muted);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
        flex: none;
    }

    .pu-list button.active .av {
        background: var(--deep);
        color: var(--lime);
    }

    .pu-list .col {
        min-width: 0;
        flex: 1;
    }

    .pu-list .row1 {
        display: flex;
        justify-content: space-between;
        gap: 8px;
    }

    .pu-list .row1 span.w {
        font-size: 12px;
        color: var(--muted);
        flex: none;
    }

    .pu-list .row2 {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 4px;
    }

    .pu-list .row2 span {
        font-size: 13px;
        color: var(--muted);
    }

    .pu-detail {
        flex: 999 1 420px;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .pu-summary .head {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .pu-summary h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 800;
    }

    .pu-summary .sub {
        font-size: 13px;
        color: var(--muted);
    }

    .pu-chips {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 14px;
    }

    .pu-chip {
        padding: 10px 14px;
        border-radius: 12px;
        background: var(--chip);
        display: flex;
        flex-direction: column;
    }

    .pu-chip span {
        font-size: 12px;
        color: var(--muted);
    }

    .pu-chip strong {
        font-size: 16px;
    }

    .pu-chatcard {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: var(--radius-card);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .pu-thread {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        min-height: 220px;
        background: var(--bg);
    }

    .pu-msg {
        display: flex;
    }

    .pu-msg.ortu {
        justify-content: flex-start;
    }

    .pu-msg.pakar {
        justify-content: flex-end;
    }

    .pu-msg.sys {
        justify-content: center;
    }

    .pu-bubble {
        max-width: 440px;
        padding: 11px 15px;
        font-size: 15px;
        line-height: 1.5;
        border-radius: 16px;
    }

    .pu-msg.ortu .pu-bubble {
        background: var(--surface);
        border: 1px solid var(--line);
    }

    .pu-msg.pakar .pu-bubble {
        background: var(--deep);
        color: #fff;
    }

    .pu-msg.sys .pu-bubble {
        color: var(--muted);
        font-size: 14px;
    }

    .pu-form {
        padding: 14px 20px;
        border-top: 1px solid var(--line);
        display: flex;
        gap: 12px;
    }

    .pu-form .input-chip {
        flex: 1;
        min-width: 0;
        background: var(--chip);
        border-radius: var(--radius-pill);
        padding: 12px 16px;
    }

    .pu-form .input-chip input {
        width: 100%;
        border: 0;
        background: transparent;
        font: inherit;
        font-size: 15px;
        outline: none;
    }
</style>
@endsection

@section('content')
<div class="panel-head">
    <div>
        <h1>Pengguna dan chat</h1>
        <p>Data contoh &middot; Pilih pengguna untuk melihat hasil skrining dan percakapan.</p>
    </div>
</div>

<div class="pu-wrap">
    <section aria-label="Daftar pengguna" class="pu-list" id="puList"></section>

    <section aria-label="Detail pengguna" class="pu-detail">
        <div class="kartu pu-summary" id="puSummary"></div>
        <div class="pu-chatcard">
            <div class="pu-thread" id="puThread" aria-live="polite"></div>
            <form class="pu-form" id="puForm">
                <label for="puInput" class="visually-hidden">Balas pesan</label>
                <span class="input-chip"><input id="puInput" type="text" placeholder="Balas ke orang tua&hellip;"
                        autocomplete="off"></span>
                <x-tombol variant="utama" type="submit">Kirim</x-tombol>
            </form>
        </div>
    </section>
</div>

<script>
    const data = @json($pengguna);
    let selected = 0;

    const puList = document.getElementById('puList');
    const puSummary = document.getElementById('puSummary');
    const puThread = document.getElementById('puThread');
    const puForm = document.getElementById('puForm');
    const puInput = document.getElementById('puInput');

    function renderList() {
        puList.innerHTML = '';
        data.forEach((p, k) => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = k === selected ? 'active' : '';
            btn.setAttribute('aria-pressed', k === selected ? 'true' : 'false');
            btn.innerHTML = `
                <span class="av">${p.ortu.slice(-1)}</span>
                <span class="col">
                    <span class="row1"><strong style="font-size:14px;font-weight:700">${p.ortu}</strong><span class="w">${p.waktu}</span></span>
                    <span class="row2"><span>${p.anak}</span></span>
                </span>`;
            btn.addEventListener('click', () => { selected = k; puInput.value = ''; renderAll(); });
            puList.appendChild(btn);
        });
    }

    function renderSummary() {
        const p = data[selected];
        puSummary.innerHTML = `
            <div class="head">
                <div>
                    <h2>${p.anak}</h2>
                    <span class="sub">${p.ortu} &middot; aktif ${p.waktu} lalu</span>
                </div>
            </div>
            <div class="pu-chips">
                <div class="pu-chip"><span>Indikasi</span><strong>${p.kategori}</strong></div>
                <div class="pu-chip"><span>Keyakinan</span><strong>${p.cf}</strong></div>
                <div class="pu-chip"><span>Catatan rujukan</span><strong>${p.flag}</strong></div>
            </div>`;
    }

    function renderThread() {
        const p = data[selected];
        const chat = p.chat.length ? p.chat : [{ dari: 'sys', teks: 'Belum ada percakapan.' }];
        puThread.innerHTML = '';
        chat.forEach(m => {
            const row = document.createElement('div');
            row.className = 'pu-msg ' + m.dari;
            const bubble = document.createElement('div');
            bubble.className = 'pu-bubble';
            bubble.textContent = m.teks;
            row.appendChild(bubble);
            puThread.appendChild(row);
        });
        puThread.scrollTop = puThread.scrollHeight;
    }

    function renderAll() {
        renderList();
        renderSummary();
        renderThread();
    }

    puForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const teks = puInput.value.trim();
        if (!teks) return;
        data[selected].chat.push({ dari: 'pakar', teks });
        puInput.value = '';
        renderThread();
    });

    renderAll();
</script>
@endsection
