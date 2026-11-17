@props(['variant' => 'utama', 'href' => null])

@php
    $styles = [
        'utama' => 'background:var(--deep);color:#fff;border:1px solid var(--deep);padding:12px 22px;font-size:15px;',
        'sekunder' => 'background:var(--surface);color:var(--ink);border:1px solid var(--line);padding:12px 22px;font-size:15px;',
        'aksen' => 'background:var(--lime);color:var(--deep);border:1px solid var(--lime);padding:12px 22px;font-size:15px;',
        'kecil' => 'background:var(--surface);color:var(--ink);border:1px solid var(--line);padding:7px 14px;font-size:13px;',
    ];
    $style = 'display:inline-flex;align-items:center;justify-content:center;gap:8px;border-radius:var(--radius-pill);font-weight:600;cursor:pointer;font-family:inherit;text-decoration:none;white-space:nowrap;line-height:1.3;'
        . ($styles[$variant] ?? $styles['utama']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['style' => $style]) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'style' => $style]) }}>{{ $slot }}</button>
@endif
