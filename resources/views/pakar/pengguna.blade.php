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
        flex: 1 1 260px;
        min-width: 0;
        background: var(--white);
        border: 1px solid var(--line);
        border-radius: 16px;
        padding: 8px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .pu-list button {
        text-align: left;
        padding: 12px 14px;
        border-radius: 12px;
        border: 0;
        display: flex;
        flex-direction: column;
        gap: 4px;
        color: var(--ink);
        background: transparent;
        font-family: inherit;
        cursor: pointer;
    }

    .pu-list button.active {
        background: #E8EEFB;
    }

    .pu-list .row1 {
        display: flex;
        justify-content: space-between;
        gap: 8px;
    }

    .pu-list .row1 span:last-child {
        font-size: 12px;
        color: var(--ink-muted);
    }

    .pu-list .row2 {
        font-size: 13px;
        color: var(--ink-muted);
    }

    .pu-detail {
        flex: 999 1 420px;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .pu-summary {
        background: var(--white);
        border: 1px solid var(--line);
        border-radius: 16px;
        padding: 22px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        align-items: center;
    }

    .pu-summary h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 800;
    }

    .pu-summary .sub {
        font-size: 14px;
        color: var(--ink-muted);
    }

    .pu-chips {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .pu-chip {
        padding: 10px 14px;
        border-radius: 12px;
        background: #F1F5F7;
        display: flex;
        flex-direction: column;
    }

    .pu-chip span {
        font-size: 12px;
        color: var(--ink-muted);
    }

    .pu-chip strong {
        font-size: 16px;
    }

    .pu-chatcard {
        background: var(--white);
        border: 1px solid var(--line);
        border-radius: 16px;
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
        background: #FBFCFC;
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
    }

    .pu-msg.ortu .pu-bubble {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 16px 16px 16px 4px;
    }

    .pu-msg.pakar .pu-bubble {
        background: #1D4ED8;
        color: #fff;
        border-radius: 16px 16px 4px 16px;
    }

    .pu-msg.sys .pu-bubble {
        color: var(--ink-muted);
        font-size: 14px;
    }

    .pu-form {
        padding: 14px 20px;
        border-top: 1px solid var(--line-soft);
        display: flex;
        gap: 12px;
    }

    .pu-form input {
        flex: 1;
        min-width: 0;
        padding: 12px 14px;
        border-radius: 12px;
        border: 1px solid var(--input-border);
        font: inherit;
        font-size: 15px;
    }

    .pu-form button {
        padding: 12px 18px;
        border-radius: 12px;
        border: 0;
        background: #1D4ED8;
        color: #fff;
        font-weight: 700;
        font-size: 15px;
        font-family: inherit;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div>
    <h1 style="margin:0;font-size:28px;font-weight:800">Pengguna dan chat</h1>
    <p style="margin:0;font-size:15px;color:var(--ink-muted)">Data contoh. Pilih pengguna untuk melihat hasil
        skrining anak dan percakapannya.</p>
</div>

<div class="pu-wrap">
    <section aria-label="Daftar pengguna" class="pu-list" id="puList"></section>

    <section aria-label="Detail pengguna" class="pu-detail">
        <div class="pu-summary" id="puSummary"></div>
        <div class="pu-chatcard">
            <div class="pu-thread" id="puThread" aria-live="polite"></div>
            <form class="pu-form" id="puForm">
                <label for="puInput" class="visually-hidden">Balas pesan</label>
                <input id="puInput" type="text" placeholder="Balas ke orang tua&hellip;" autocomplete="off">
                <button type="submit">Kirim</button>
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
            btn.innerHTML = `<span class="row1"><strong style="font-size:15px">${p.ortu}</strong><span>${p.waktu}</span></span><span class="row2">${p.anak} &middot; ${p.kategori}</span>`;
            btn.addEventListener('click', () => { selected = k; puInput.value = ''; renderAll(); });
            puList.appendChild(btn);
        });
    }

    function renderSummary() {
        const p = data[selected];
        puSummary.innerHTML = `
            <div style="flex:1 1 220px;display:flex;flex-direction:column;gap:4px">
                <h2>${p.anak}</h2>
                <span class="sub">Orang tua: ${p.ortu}</span>
            </div>
            <div class="pu-chips">
                <div class="pu-chip"><span>Indikasi</span><strong>${p.kategori}</strong></div>
                <div class="pu-chip"><span>Keyakinan</span><strong>${p.cf}</strong></div>
                <div class="pu-chip"><span>Flag Jalur B</span><strong>${p.flag}</strong></div>
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
