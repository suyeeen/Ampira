<?php

namespace Database\Seeders;

use App\Models\Gejala;
use App\Models\KlasterRujukan;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autisme = KlasterRujukan::where('nama_klaster', 'Autisme')->firstOrFail();
        $adhd = KlasterRujukan::where('nama_klaster', 'ADHD')->firstOrFail();

        $gejalaInti = [
            'Apakah anak tidak merespons ketika dipanggil atau mendengar suara?',
            'Apakah anak menunjukkan tanda keterlambatan pada aspek perkembangan lainnya?',
            'Apakah anak terlihat tidak tertarik untuk berkomunikasi?',
            'Apakah anak tidak merespons saat diajak berinteraksi?',
            'Apakah anak lebih suka menyendiri?',
            'Apakah anak berbicara lebih lambat daripada anak seumurannya?',
            'Apakah anak menunjukkan rasa takut yang berlebihan?',
            'Apakah anak kesulitan memahami perkataan orang dewasa?',
            'Apakah anak kesulitan berteman atau ikut bermain bersama anak lain?',
            'Apakah anak berbicara dengan terbata-bata?',
        ];

        $gejalaAutisme = [
            'Apakah anak sulit bersosialisasi dengan orang di sekitarnya?',
            'Apakah anak kesulitan berbicara, membaca, atau menulis sesuai usianya?',
            'Apakah anak kesulitan memahami isyarat, seperti melambai atau menunjuk?',
            'Apakah anak terlihat kurang peduli pada orang atau kejadian di sekitarnya?',
        ];

        $gejalaAdhd = [
            'Apakah anak berbicara tanpa henti hingga mengganggu orang lain?',
            'Apakah anak berbicara berulang-ulang kepada dirinya sendiri?',
            'Apakah anak menjawab sebelum pertanyaan selesai diucapkan?',
        ];

        $urutan = 1;

        foreach ($gejalaInti as $i => $pertanyaan) {
            Gejala::create([
                'klaster_id' => null,
                'kode' => sprintf('GA%02d', $i + 1),
                'pertanyaan' => $pertanyaan,
                'jalur' => 'A',
                'cf_pakar' => null,
                'urutan' => $urutan++,
            ]);
        }

        foreach ($gejalaAutisme as $i => $pertanyaan) {
            Gejala::create([
                'klaster_id' => $autisme->id,
                'kode' => sprintf('GB%02d', $i + 1),
                'pertanyaan' => $pertanyaan,
                'jalur' => 'B',
                'cf_pakar' => null,
                'urutan' => $urutan++,
            ]);
        }

        foreach ($gejalaAdhd as $i => $pertanyaan) {
            Gejala::create([
                'klaster_id' => $adhd->id,
                'kode' => sprintf('GB%02d', $i + 5),
                'pertanyaan' => $pertanyaan,
                'jalur' => 'B',
                'cf_pakar' => null,
                'urutan' => $urutan++,
            ]);
        }
    }
}
