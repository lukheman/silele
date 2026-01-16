<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Model Penyakit
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string|null $deskripsi
 * @property string|null $solusi
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Gejala> $gejala
 *
 * @property float|null $probabilitas Dynamic property dari NaiveBayes
 * @property float|null $persentase Dynamic property dari NaiveBayes
 */
class Penyakit extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'penyakit';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'solusi',
        'photo',
    ];

    /**
     * Get the gejala (symptoms) associated with the penyakit (disease).
     *
     * @return BelongsToMany<\App\Models\Gejala>
     */
    public function gejala(): BelongsToMany
    {
        return $this->belongsToMany(Gejala::class, 'basis_pengetahuan', 'id_penyakit', 'id_gejala');
    }
}
