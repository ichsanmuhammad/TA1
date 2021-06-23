<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $guarded = [];

    public function dokter(){
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }
}
