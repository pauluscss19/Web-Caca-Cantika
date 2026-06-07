<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    protected $table = 'penawaran';
    public $timestamps = false;

    protected $fillable = [
        'lelang_id',
        'peserta_id',
        'harga_penawaran',
    ];

    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'lelang_id');
    }

    public function peserta()
    {
        return $this->belongsTo(PesertaLelang::class, 'peserta_id');
    }
}
