<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nama_kategori', 'batas_bawah', 'batas_atas', 'saran'])]
class KategoriHasil extends Model
{
    protected $table = 'kategori_hasil';

    protected function casts(): array
    {
        return [
            'batas_bawah' => 'decimal:4',
            'batas_atas' => 'decimal:4',
        ];
    }

    public function skrining(): HasMany
    {
        return $this->hasMany(Skrining::class, 'kategori_id');
    }
}
