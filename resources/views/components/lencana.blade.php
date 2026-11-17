@props(['variant' => 'netral'])

@php
    $styles = [
        'netral' => 'background:var(--chip);color:var(--muted);',
        'brand' => 'background:var(--brand-soft);color:var(--brand);',
        'peringatan' => 'background:var(--warn-soft);color:var(--warn);',
        'aman' => 'background:var(--ok-soft);color:var(--ok);',
        'bahaya' => 'background:var(--danger-soft);color:var(--danger);',
    ];
    $style = 'display:inline-flex;align-items:center;padding:4px 10px;border-radius:var(--radius-pill);font-weight:600;font-size:12px;line-height:1.3;white-space:nowrap;'
        . ($styles[$variant] ?? $styles['netral']);
@endphp

<span {{ $attributes->merge(['style' => $style]) }}>{{ $slot }}</span>
