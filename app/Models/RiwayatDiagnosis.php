<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatDiagnosis extends Model
{
    protected $guarded = [];

    public function peternak() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function penyakit() {
        return $this->hasOne(Penyakit::class, 'id', 'id_penyakit');
    }

}
