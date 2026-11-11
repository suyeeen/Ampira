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

Route::get('/demo/peran', function () {
    return view('demo.peran');
})->name('demo.peran');

Route::get('/chat', function () {
    $pesan = [
        ['dari' => 'psikolog', 'teks' => 'Selamat sore, Bu. Saya sudah membaca hasil skrining anak Ibu. Di rumah, anak lebih sering menunjuk atau bersuara saat menginginkan sesuatu?', 'waktu' => 'Kemarin, 16.10'],
        ['dari' => 'ortu', 'teks' => 'Lebih sering menunjuk, Bu. Kadang menarik tangan saya.', 'waktu' => 'Kemarin, 16.24'],
        ['dari' => 'psikolog', 'teks' => 'Baik. Coba tunggu sebentar sebelum memberi, sambil menyebut nama bendanya. Nanti kita bahas saat konsultasi.', 'waktu' => 'Kemarin, 16.31'],
    ];

    return view('chat', ['namaPsikolog' => '[Nama psikolog]', 'pesan' => $pesan]);
})->name('chat');

Route::get('/pakar/gejala', function () {
    $gejala = Gejala::orderBy('urutan')->get();

    return view('pakar.gejala', ['gejala' => $gejala]);
})->name('pakar.gejala');

Route::get('/pakar/pengguna', function () {
    $pengguna = [
        ['ortu' => 'Orang tua A', 'anak' => 'Anak A, 31 bulan', 'kategori' => 'Sedang', 'cf' => '62%', 'flag' => 'Ada', 'waktu' => '2 mnt', 'chat' => [
            ['dari' => 'ortu', 'teks' => 'Anak saya lebih sering menunjuk daripada bicara, Bu.'],
            ['dari' => 'pakar', 'teks' => 'Baik, Bu. Coba sebut nama bendanya setiap kali anak menunjuk.'],
        ]],
        ['ortu' => 'Orang tua B', 'anak' => 'Anak B, 28 bulan', 'kategori' => 'Tinggi', 'cf' => '81%', 'flag' => 'Tidak ada', 'waktu' => '1 jam', 'chat' => [
            ['dari' => 'ortu', 'teks' => 'Apakah hasil tinggi berarti anak saya pasti terlambat bicara?'],
            ['dari' => 'pakar', 'teks' => 'Belum tentu, Bu. Hasil ini skrining awal. Mari jadwalkan pemeriksaan langsung.'],
        ]],
        ['ortu' => 'Orang tua C', 'anak' => 'Anak C, 34 bulan', 'kategori' => 'Rendah', 'cf' => '48%', 'flag' => 'Tidak ada', 'waktu' => 'kemarin', 'chat' => [
            ['dari' => 'ortu', 'teks' => 'Terima kasih, Bu, sudah dijelaskan.'],
        ]],
        ['ortu' => 'Orang tua D', 'anak' => 'Anak D, 26 bulan', 'kategori' => 'Sedang', 'cf' => '58%', 'flag' => 'Ada', 'waktu' => '2 hari', 'chat' => []],
    ];

    return view('pakar.pengguna', ['pengguna' => $pengguna]);
})->name('pakar.pengguna');

Route::get('/admin/gejala', function () {
    $gejala = Gejala::orderBy('urutan')->get();

    return view('admin.gejala', ['gejala' => $gejala]);
})->name('admin.gejala');

Route::get('/admin/pengguna', function () {
    $pengguna = [
        ['id' => 'u1', 'nama' => 'Orang tua A', 'email' => 'ortu.a@contoh.id', 'peran' => 'Orang tua', 'tgl' => '[tanggal]'],
        ['id' => 'u2', 'nama' => 'Orang tua B', 'email' => 'ortu.b@contoh.id', 'peran' => 'Orang tua', 'tgl' => '[tanggal]'],
        ['id' => 'u3', 'nama' => 'Orang tua C', 'email' => 'ortu.c@contoh.id', 'peran' => 'Orang tua', 'tgl' => '[tanggal]'],
        ['id' => 'u4', 'nama' => 'Orang tua D', 'email' => 'ortu.d@contoh.id', 'peran' => 'Orang tua', 'tgl' => '[tanggal]'],
        ['id' => 'u5', 'nama' => '[Nama psikolog]', 'email' => 'psikolog@contoh.id', 'peran' => 'Pakar', 'tgl' => '[tanggal]'],
        ['id' => 'u6', 'nama' => 'Admin Ampira', 'email' => 'admin@contoh.id', 'peran' => 'Admin', 'tgl' => '[tanggal]'],
    ];

    return view('admin.pengguna', ['pengguna' => $pengguna]);
})->name('admin.pengguna');
