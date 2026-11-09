<?php

use App\Models\Gejala;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/masuk', function () {
    return view('auth.masuk');
})->name('masuk');

Route::get('/skrining/profil', function () {
    return view('skrining.profil');
})->name('skrining.profil');

Route::get('/skrining/kuesioner', function () {
    $pertanyaan = Gejala::orderBy('urutan')
        ->get()
        ->map(fn (Gejala $gejala) => [
            'teks' => $gejala->pertanyaan,
            'bagian' => $gejala->jalur === 'A' ? 'inti' : 'penyerta',
        ])
        ->all();

    $pilihan = ['Tidak pernah', 'Jarang', 'Kadang', 'Sering', 'Selalu'];

    return view('skrining.kuesioner', [
        'pertanyaan' => $pertanyaan,
        'pilihanJawaban' => $pilihan,
    ]);
})->name('skrining.kuesioner');

Route::get('/hasil', function () {
    return view('hasil', [
        'namaAnak' => '[Nama anak]',
        'usiaBulan' => '[usia]',
        'tanggalSkrining' => '[tanggal skrining]',
        'kategori' => 'Sedang',
        'keyakinanPersen' => 62,
        'ringkasan' => 'Beberapa jawaban Anda mengarah pada tanda keterlambatan bicara. Hasil ini perlu dipastikan lewat pemeriksaan oleh tenaga profesional.',
        'adaCatatanRujukan' => true,
        'catatanRujukan' => 'Beberapa jawaban menunjukkan tanda di luar bicara dan bahasa, yaitu pada interaksi sosial. Kami menyarankan pemeriksaan lanjutan oleh psikolog anak.',
        'saran' => [
            '[Saran pakar untuk kategori sedang, poin 1]',
            '[Saran pakar untuk kategori sedang, poin 2]',
            '[Saran pakar untuk kategori sedang, poin 3]',
        ],
        'jawabanBerpengaruh' => [
            ['pertanyaan' => 'Berbicara lebih lambat daripada anak seumurannya', 'jawaban' => 'Sering'],
            ['pertanyaan' => 'Kesulitan memahami perkataan orang dewasa', 'jawaban' => 'Kadang'],
            ['pertanyaan' => 'Tidak merespons saat diajak berinteraksi', 'jawaban' => 'Kadang'],
        ],
    ]);
})->name('hasil');

Route::get('/riwayat', function () {
    $riwayat = [
        ['tanggal' => '[tanggal 3]', 'anak' => '[Nama anak]', 'kategori' => 'Sedang', 'keyakinan' => 62, 'rujukan' => 'Ada'],
        ['tanggal' => '[tanggal 2]', 'anak' => '[Nama anak]', 'kategori' => 'Rendah', 'keyakinan' => 48, 'rujukan' => 'Tidak ada'],
        ['tanggal' => '[tanggal 1]', 'anak' => '[Nama anak]', 'kategori' => 'Tinggi', 'keyakinan' => 81, 'rujukan' => 'Ada'],
    ];

    return view('riwayat', ['riwayat' => $riwayat]);
})->name('riwayat');
