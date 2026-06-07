<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    protected $table = 'satker';
    public $timestamps = false;

    protected $fillable = [
        'nama_satker',
        'alamat',
        'no_telp',
    ];

    public function asets()
    {
        return $this->hasMany(Aset::class, 'satker_id');
    }
}
