<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nama_klaster', 'ambang_batas'])]
class KlasterRujukan extends Model
{
    protected $table = 'klaster_rujukan';

    public function gejala(): HasMany
    {
        return $this->hasMany(Gejala::class, 'klaster_id');
    }
}
