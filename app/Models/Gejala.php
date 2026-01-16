<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Model Gejala
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Penyakit> $penyakit
 */
class Gejala extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'gejala';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode',
        'nama',
    ];

    /**
     * Get the penyakit (diseases) associated with the gejala (symptom).
     *
     * @return BelongsToMany<\App\Models\Penyakit>
     */
    public function penyakit(): BelongsToMany
    {
        return $this->belongsToMany(Penyakit::class, 'basis_pengetahuan', 'id_gejala', 'id_penyakit');
    }
}
