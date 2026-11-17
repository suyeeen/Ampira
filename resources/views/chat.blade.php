@extends('layouts.app', ['activeNav' => 'chat'])

@section('title', 'Ampira — Chat psikolog')

@section('head')
<style>
    .ruang-chat {
        display: flex;
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: var(--radius-card);
        overflow: hidden;
        height: 640px;
    }

    .daftar-percakapan {
        flex: 0 0 320px;
        border-right: 1px solid var(--line);
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .cari-chip {
        background: var(--chip);
        border-radius: var(--radius-pill);
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--muted);
        font-size: 14px;
    }

    .percakapan-item {
        background: var(--brand-soft);
        border-radius: 14px;
        padding: 14px;
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .percakapan-item .av {
        width: 42px;
        height: 42px;
        border-radius: 999px;
        background: var(--deep);
        color: var(--lime);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex: none;
    }

    .percakapan-item strong {
        display: block;
        font-size: 15px;
        font-weight: 700;
    }

    .percakapan-item span {
        font-size: 13px;
        color: var(--muted);
    }

    .panel-percakapan {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
    }

    .chat-head {
        padding: 16px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid var(--line);
    }

    .chat-head .av {
        width: 42px;
        height: 42px;
        border-radius: 999px;
        background: var(--deep);
        color: var(--lime);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex: none;
    }

    .chat-head strong {
        display: block;
        font-size: 16px;
        font-weight: 700;
    }

    .chat-head span {
        font-size: 13px;
        color: var(--muted);
    }

    .chat-thread {
        flex: 1;
        padding: 24px;
        background: var(--bg);
        display: flex;
        flex-direction: column;
        gap: 14px;
        overflow-y: auto;
    }

    .msg-row {
        display: flex;
    }

    .msg-row.from-ortu {
        justify-content: flex-end;
    }

    .msg-row.from-psikolog {
        justify-content: flex-start;
    }

    .msg-bubble {
        max-width: 460px;
        padding: 12px 16px;
        border-radius: 16px;
        font-size: 15px;
        line-height: 1.55;
    }

    .msg-row.from-ortu .msg-bubble {
        background: var(--deep);
        color: #fff;
    }

    .msg-row.from-psikolog .msg-bubble {
        background: var(--surface);
        border: 1px solid var(--line);
    }

    .chat-form {
        padding: 14px 24px;
        border-top: 1px solid var(--line);
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .chat-form .input-chip {
        flex: 1;
        min-width: 0;
        background: var(--chip);
        border-radius: var(--radius-pill);
        padding: 13px 18px;
    }

    .chat-form .input-chip input {
        width: 100%;
        border: 0;
        background: transparent;
        font: inherit;
        font-size: 15px;
        outline: none;
    }

    @media (max-width: 900px) {
        .ruang-chat {
            flex-direction: column;
            height: auto;
        }

        .daftar-percakapan {
            flex: none;
            border-right: 0;
            border-bottom: 1px solid var(--line);
        }

        .chat-thread {
            max-height: 420px;
        }
    }
</style>
@endsection

@section('content')
<h1>Chat psikolog</h1>

<div class="ruang-chat">
    <div class="daftar-percakapan">
        <div class="cari-chip">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#56665F" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M11 19a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM21 21l-4.3-4.3" />
            </svg>
            Cari percakapan
        </div>
        <div class="percakapan-item">
            <span class="av" aria-hidden="true">P</span>
            <div>
                <strong>{{ $namaPsikolog }}</strong>
                <span>{{ Str::limit($pesan[count($pesan) - 1]['teks'] ?? '', 36) }}</span>
            </div>
        </div>
    </div>

    <div class="panel-percakapan">
        <div class="chat-head">
            <span class="av" aria-hidden="true">P</span>
            <div>
                <strong>{{ $namaPsikolog }}</strong>
                <span>Psikolog anak &middot; biasanya membalas dalam beberapa jam</span>
            </div>
        </div>

        <div class="chat-thread" id="chatThread" aria-live="polite">
            @foreach ($pesan as $m)
                <div class="msg-row from-{{ $m['dari'] }}">
                    <div class="msg-bubble">{{ $m['teks'] }}</div>
                </div>
            @endforeach
        </div>

        <form class="chat-form" id="chatForm">
            <label for="pesan" class="visually-hidden">Tulis pesan</label>
            <span class="input-chip">
                <input id="pesan" type="text" placeholder="Tulis pesan&hellip;" autocomplete="off">
            </span>
            <x-tombol variant="utama" type="submit">Kirim</x-tombol>
        </form>
    </div>
</div>

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
        row.innerHTML = `<div class="msg-bubble"></div>`;
        row.querySelector('.msg-bubble').textContent = teks;
        chatThread.appendChild(row);

        chatInput.value = '';
        chatThread.scrollTop = chatThread.scrollHeight;
    });
</script>
@endsection
