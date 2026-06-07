<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    protected $table = 'lelang';
    public $timestamps = false;

    protected $fillable = [
        'aset_id',
        'tanggal_lelang',
        'harga_limit',
        'harga_terjual',
        'status',
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id');
    }

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class, 'lelang_id');
    }
}
