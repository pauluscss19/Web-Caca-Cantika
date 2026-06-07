<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'aset';
    public $timestamps = false;

    protected $fillable = [
        'nama_aset',
        'kategori',
        'nilai_perolehan',
        'tahun_perolehan',
        'kondisi',
        'satker_id',
        'gambar',
    ];

    public function satker()
    {
        return $this->belongsTo(Satker::class, 'satker_id');
    }

    public function lelang()
    {
        return $this->hasMany(Lelang::class, 'aset_id');
    }
}
