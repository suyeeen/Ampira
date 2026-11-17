@props(['label' => '', 'placeholder' => ''])

<label style="display:flex;flex-direction:column;gap:8px;width:100%">
    @if ($label)
        <span style="font-size:14px;font-weight:600;color:var(--ink)">{{ $label }}</span>
    @endif
    <input placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
                'class' => 'isian-input',
                'style' => 'padding:13px 16px;border-radius:var(--radius-input);border:1px solid var(--line);background:var(--surface);font:inherit;font-size:15px;color:var(--ink);width:100%',
            ]) }}>
</label>
