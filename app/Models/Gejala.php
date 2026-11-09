<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['klaster_id', 'kode', 'pertanyaan', 'jalur', 'cf_pakar', 'urutan'])]
class Gejala extends Model
{
    protected $table = 'gejala';

    protected function casts(): array
    {
        return [
            'cf_pakar' => 'decimal:2',
        ];
    }

    public function klaster(): BelongsTo
    {
        return $this->belongsTo(KlasterRujukan::class, 'klaster_id');
    }

    public function jawaban(): HasMany
    {
        return $this->hasMany(Jawaban::class, 'gejala_id');
    }
}
