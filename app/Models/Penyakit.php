<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';
    protected $guarded = [];

    public function gejala(): BelongsToMany {
        return $this->belongsToMany(Gejala::class, 'basis_pengetahuan', 'id_penyakit', 'id_gejala')->withPivot('probabilitas');
    }
}
