<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama_himpunan', 'titik_a', 'titik_b', 'titik_c', 'titik_d'])]
class HimpunanFuzzy extends Model
{
    protected $table = 'himpunan_fuzzy';

    protected function casts(): array
    {
        return [
            'titik_a' => 'decimal:2',
            'titik_b' => 'decimal:2',
            'titik_c' => 'decimal:2',
            'titik_d' => 'decimal:2',
        ];
    }
}
