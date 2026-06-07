<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    protected $table = 'piutang';
    public $timestamps = false;

    protected $fillable = [
        'nama_debitur',
        'jumlah_piutang',
        'status',
        'tanggal_jatuh_tempo',
    ];
}
