<?php

namespace Database\Seeders;

use App\Models\KlasterRujukan;
use Illuminate\Database\Seeder;

class KlasterRujukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KlasterRujukan::create(['nama_klaster' => 'Autisme', 'ambang_batas' => null]);
        KlasterRujukan::create(['nama_klaster' => 'ADHD', 'ambang_batas' => null]);
    }
}
