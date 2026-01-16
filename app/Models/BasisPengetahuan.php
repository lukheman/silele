<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Model BasisPengetahuan
 *
 * Pivot table yang menghubungkan Penyakit dengan Gejala.
 *
 * @property int $id
 * @property int $id_penyakit
 * @property int $id_gejala
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Penyakit $penyakit
 * @property-read \App\Models\Gejala $gejala
 */
class BasisPengetahuan extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'basis_pengetahuan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_penyakit',
        'id_gejala',
    ];

    /**
     * Get the penyakit (disease) that owns the basis pengetahuan.
     *
     * @return BelongsTo<\App\Models\Penyakit, $this>
     */
    public function penyakit(): BelongsTo
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit');
    }

    /**
     * Get the gejala (symptom) that owns the basis pengetahuan.
     *
     * @return BelongsTo<\App\Models\Gejala, $this>
     */
    public function gejala(): BelongsTo
    {
        return $this->belongsTo(Gejala::class, 'id_gejala');
    }
}
