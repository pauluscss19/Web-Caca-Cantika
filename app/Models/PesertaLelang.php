<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesertaLelang extends Model
{
    protected $table = 'peserta_lelang';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
    ];

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class, 'peserta_id');
    }
}
