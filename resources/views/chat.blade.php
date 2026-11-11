@extends('layouts.app', ['activeNav' => 'chat', 'maxWidth' => '820px'])

@section('title', 'Ampira — Chat psikolog')

@section('head')
<style>
    .chat-card {
        background: var(--white);
        border: 1px solid var(--line);
        border-radius: 20px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .chat-head {
        padding: 18px 24px;
        border-bottom: 1px solid var(--line-soft);
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .chat-avatar {
        width: 44px;
        height: 44px;
        border-radius: 999px;
        background: #E8EEFB;
        color: #1D4ED8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        flex: none;
    }

    .chat-head h1 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
    }

    .chat-head span {
        font-size: 13px;
        color: var(--ink-muted);
    }

    .chat-banner {
        margin: 0;
        padding: 12px 24px;
        background: #F1F5F7;
        font-size: 13px;
        line-height: 1.5;
        color: #3A4853;
    }

    .chat-thread {
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        min-height: 380px;
        background: #FBFCFC;
    }

    .chat-thread-label {
        align-self: center;
        font-size: 12px;
        font-weight: 600;
        color: var(--ink-muted);
    }

    .msg-row {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .msg-row.from-ortu {
        align-items: flex-end;
    }

    .msg-row.from-psikolog {
        align-items: flex-start;
    }

    .msg-bubble {
        max-width: 520px;
        padding: 12px 16px;
        font-size: 15px;
        line-height: 1.55;
    }

    .msg-row.from-ortu .msg-bubble {
        background: var(--primary);
        color: #fff;
        border-radius: 16px 16px 4px 16px;
    }

    .msg-row.from-psikolog .msg-bubble {
        background: #fff;
        color: var(--ink);
        border: 1px solid var(--line);
        border-radius: 16px 16px 16px 4px;
    }

    .msg-time {
        font-size: 12px;
        color: var(--ink-muted);
    }

    .chat-form {
        padding: 16px 24px;
        border-top: 1px solid var(--line-soft);
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .chat-form input {
        flex: 1;
        min-width: 0;
        padding: 13px 16px;
        border-radius: 12px;
        border: 1px solid var(--input-border);
        font: inherit;
        font-size: 15px;
    }

    .chat-form input:focus {
        outline: none;
        border-color: var(--primary);
    }

    .chat-form button {
        padding: 13px 20px;
        border-radius: 12px;
        border: 0;
        background: var(--primary);
        color: #fff;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        font-family: inherit;
    }
</style>
@endsection

@section('content')
<section class="chat-card">
    <div class="chat-head">
        <span class="chat-avatar" aria-hidden="true">P</span>
        <div>
            <h1>{{ $namaPsikolog }}</h1>
            <span>Psikolog anak &middot; biasanya membalas dalam beberapa jam</span>
        </div>
    </div>
    <p class="chat-banner">Psikolog dapat melihat hasil skrining anak Anda. Untuk keadaan darurat, hubungi klinik
        secara langsung.</p>

    <div class="chat-thread" id="chatThread" aria-live="polite">
        <span class="chat-thread-label">Contoh percakapan</span>
        @foreach ($pesan as $m)
            <div class="msg-row from-{{ $m['dari'] }}">
                <div class="msg-bubble">{{ $m['teks'] }}</div>
                <span class="msg-time">{{ $m['waktu'] }}</span>
            </div>
        @endforeach
    </div>

    <form class="chat-form" id="chatForm">
        <label for="pesan" class="visually-hidden">Tulis pesan</label>
        <input id="pesan" type="text" placeholder="Tulis pesan&hellip;" autocomplete="off">
        <button type="submit">Kirim</button>
    </form>
</section>

<script>
    const chatThread = document.getElementById('chatThread');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('pesan');

    chatForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const teks = chatInput.value.trim();
        if (!teks) return;

        const row = document.createElement('div');
        row.className = 'msg-row from-ortu';
        row.innerHTML = `<div class="msg-bubble"></div><span class="msg-time">Baru saja</span>`;
        row.querySelector('.msg-bubble').textContent = teks;
        chatThread.appendChild(row);

        chatInput.value = '';
        chatThread.scrollTop = chatThread.scrollHeight;
    });
</script>
@endsection
