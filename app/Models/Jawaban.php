<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['skrining_id', 'gejala_id', 'pilihan_jawaban', 'nilai_mu', 'cf_gejala'])]
class Jawaban extends Model
{
    protected $table = 'jawaban';

    protected function casts(): array
    {
        return [
            'nilai_mu' => 'decimal:4',
            'cf_gejala' => 'decimal:4',
        ];
    }

    public function skrining(): BelongsTo
    {
        return $this->belongsTo(Skrining::class, 'skrining_id');
    }

    public function gejala(): BelongsTo
    {
        return $this->belongsTo(Gejala::class, 'gejala_id');
    }
}
