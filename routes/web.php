<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/masuk', function () {
    return view('auth.masuk');
})->name('masuk');

Route::get('/skrining/profil', function () {
    return view('skrining.profil');
})->name('skrining.profil');

Route::get('/skrining/kuesioner', function () {
    return view('skrining.kuesioner');
})->name('skrining.kuesioner');

Route::get('/hasil', function () {
    return view('hasil');
})->name('hasil');

Route::get('/riwayat', function () {
    return view('riwayat');
})->name('riwayat');
