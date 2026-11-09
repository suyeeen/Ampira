<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['anak_id', 'kategori_id', 'tanggal', 'cf_akhir', 'flag_rujukan'])]
class Skrining extends Model
{
    protected $table = 'skrining';

    protected function casts(): array
    {
        return [
            'tanggal' => 'datetime',
            'cf_akhir' => 'decimal:4',
            'flag_rujukan' => 'boolean',
        ];
    }

    public function anak(): BelongsTo
    {
        return $this->belongsTo(Anak::class, 'anak_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriHasil::class, 'kategori_id');
    }

    public function jawaban(): HasMany
    {
        return $this->hasMany(Jawaban::class, 'skrining_id');
    }
}
