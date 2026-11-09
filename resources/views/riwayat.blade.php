@extends('layouts.app', ['activeNav' => 'riwayat'])

@section('title', 'Ampira — Riwayat skrining')

@section('content')
<div style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:16px">
    <div style="display:flex;flex-direction:column;gap:6px">
        <h1 style="margin:0;font-size:30px;font-weight:800">Riwayat skrining</h1>
        <p style="margin:0;font-size:15px;color:var(--ink-muted)">Semua skrining yang pernah Anda lakukan, dari
            yang terbaru.</p>
    </div>
    <a href="{{ route('skrining.profil') }}" class="btn-primary" style="padding:12px 20px;font-size:15px">Mulai
        skrining baru</a>
</div>

<p class="alert-sample">Contoh tampilan. Baris di bawah berisi data contoh.</p>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Anak</th>
                <th scope="col">Indikasi</th>
                <th scope="col">Keyakinan</th>
                <th scope="col">Catatan rujukan</th>
                <th scope="col"><span class="visually-hidden">Aksi</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayat as $item)
                <tr>
                    <td>{{ $item['tanggal'] }}</td>
                    <td>{{ $item['anak'] }}</td>
                    <td><span class="badge badge-{{ strtolower($item['kategori']) }}">{{ $item['kategori'] }}</span>
                    </td>
                    <td style="font-weight:600">{{ $item['keyakinan'] }}%</td>
                    <td>{{ $item['rujukan'] }}</td>
                    <td style="text-align:right"><a href="{{ route('hasil') }}" style="font-weight:600">Lihat
                            hasil</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
