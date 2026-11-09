@extends('layouts.app', ['activeNav' => 'riwayat'])

@section('title', 'Riwayat skrining — Ampira')

@section('head')
<style>
    .riwayat-pad {
        padding: 34px 48px 48px;
        max-width: 760px;
    }

    .riwayat-pad h1 {
        margin: 0 0 6px;
        font: 500 28px 'Newsreader', serif;
        color: var(--ink);
    }

    .riwayat-pad>p {
        margin: 0 0 26px;
        font: 13.5px/1.6 'Public Sans', sans-serif;
        color: var(--ink-muted);
    }

    .trend-card {
        display: flex;
        align-items: flex-end;
        gap: 10px;
        height: 96px;
        padding: 18px;
        background: #fff;
        border: 1px solid var(--line-soft);
        border-radius: 9px;
        margin-bottom: 22px;
    }

    .trend-bar {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        gap: 7px;
        height: 100%;
    }

    .trend-bar .fill {
        border-radius: 4px;
    }

    .trend-bar span {
        font: 10.5px 'Public Sans', sans-serif;
        color: var(--ink-faint);
        text-align: center;
    }

    .trend-summary {
        width: 130px;
        padding-left: 16px;
        border-left: 1px solid var(--line-soft);
        align-self: center;
    }

    .trend-summary .label {
        font: 11.5px 'Public Sans', sans-serif;
        color: var(--ink-muted);
    }

    .trend-summary .value {
        font: 500 19px 'Newsreader', serif;
        color: var(--primary);
    }

    .riwayat-list {
        display: flex;
        flex-direction: column;
        gap: 9px;
    }

    .riwayat-row {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 15px 18px;
        background: #fff;
        border: 1px solid var(--line-soft);
        border-radius: 9px;
        text-decoration: none;
        color: inherit;
    }

    .riwayat-row:hover {
        border-color: var(--primary);
    }

    .riwayat-row .date {
        width: 78px;
        font: 12.5px 'Public Sans', sans-serif;
        color: var(--ink-muted);
    }

    .riwayat-row .desc {
        flex: 1;
        font: 600 13.5px 'Public Sans', sans-serif;
        color: var(--ink);
    }

    .riwayat-row .badge {
        padding: 5px 11px;
        border-radius: 20px;
        font: 600 11.5px 'Public Sans', sans-serif;
    }

    .riwayat-row .cf {
        width: 56px;
        text-align: right;
        font: 12.5px ui-monospace, Menlo, monospace;
        color: var(--ink-soft);
    }

    .riwayat-row .delta {
        padding: 5px 9px;
        border-radius: 5px;
        font: 11px ui-monospace, Menlo, monospace;
    }
</style>
@endsection

@section('content')
<div class="riwayat-pad">
    <h1>Riwayat skrining</h1>
    <p>Aruna Kirana · 4 skrining sejak Februari 2026</p>

    <div class="trend-card">
        <div class="trend-bar">
            <div class="fill" style="height:88%;background:var(--risk-high)"></div>
            <span>Feb</span>
        </div>
        <div class="trend-bar">
            <div class="fill" style="height:84%;background:var(--risk-high)"></div>
            <span>Apr</span>
        </div>
        <div class="trend-bar">
            <div class="fill" style="height:72%;background:var(--risk-mid)"></div>
            <span>Jun</span>
        </div>
        <div class="trend-bar">
            <div class="fill" style="height:66%;background:var(--risk-mid)"></div>
            <span>Agu</span>
        </div>
        <div class="trend-summary">
            <div class="label">Tren CF</div>
            <div class="value">&minus;0,10 turun</div>
        </div>
    </div>

    <div class="riwayat-list">
        <a href="{{ route('hasil') }}" class="riwayat-row">
            <span class="date">12 Agu</span>
            <span class="desc">31 bulan · 24 gejala</span>
            <span class="badge" style="background:var(--risk-mid-bg);color:#7A5314">Sedang</span>
            <span class="cf">0,78</span>
            <span class="delta" style="background:var(--primary-soft);color:var(--primary)">&darr;0,04</span>
        </a>
        <a href="{{ route('hasil') }}" class="riwayat-row">
            <span class="date">03 Jun</span>
            <span class="desc">29 bulan · 24 gejala</span>
            <span class="badge" style="background:var(--risk-mid-bg);color:#7A5314">Sedang</span>
            <span class="cf">0,82</span>
            <span class="delta" style="background:var(--primary-soft);color:var(--primary)">&darr;0,05</span>
        </a>
        <a href="{{ route('hasil') }}" class="riwayat-row">
            <span class="date">18 Apr</span>
            <span class="desc">27 bulan · 24 gejala</span>
            <span class="badge" style="background:#F6E7E4;color:#7E3529">Tinggi</span>
            <span class="cf">0,87</span>
            <span class="delta" style="background:#EEF1F0;color:var(--ink-muted)">&darr;0,02</span>
        </a>
        <a href="{{ route('hasil') }}" class="riwayat-row">
            <span class="date">09 Feb</span>
            <span class="desc">25 bulan · 24 gejala</span>
            <span class="badge" style="background:#F6E7E4;color:#7E3529">Tinggi</span>
            <span class="cf">0,89</span>
            <span class="delta" style="color:var(--ink-faintest)">awal</span>
        </a>
    </div>
</div>
@endsection
