@extends('layouts.app', ['activeNav' => 'skrining', 'maxWidth' => '640px'])

@section('title', 'Ampira — Data anak')

@section('content')
<ol aria-label="Tahapan skrining" class="stepper">
    <li class="current">1. Data anak</li>
    <li>2. Kuesioner</li>
    <li>3. Hasil</li>
</ol>

<div style="display:flex;flex-direction:column;gap:8px">
    <h1 style="margin:0;font-size:30px;font-weight:800">Data anak</h1>
    <p style="margin:0;font-size:16px;color:var(--ink-muted);line-height:1.6">Usia anak dihitung dari tanggal
        lahir dan dipakai untuk memilih pertanyaan yang sesuai.</p>
</div>

<form class="card" style="display:flex;flex-direction:column;gap:22px"
    onsubmit="event.preventDefault(); window.location.href='{{ route('skrining.kuesioner') }}';">
    <div class="field">
        <label for="nama">Nama anak</label>
        <input id="nama" name="nama" type="text" placeholder="Nama panggilan juga boleh">
    </div>
    <div class="field">
        <label for="lahir">Tanggal lahir</label>
        <input id="lahir" name="lahir" type="date">
    </div>
    <fieldset style="margin:0;padding:0;border:0;display:flex;flex-direction:column;gap:10px">
        <legend style="font-size:14px;font-weight:600;padding:0;margin-bottom:10px">Jenis kelamin</legend>
        <div class="radio-group">
            <label class="radio-option"><input type="radio" name="jk" value="L"> Laki-laki</label>
            <label class="radio-option"><input type="radio" name="jk" value="P"> Perempuan</label>
        </div>
    </fieldset>
    <button type="submit" class="btn-primary">Lanjut ke kuesioner</button>
</form>
@endsection
