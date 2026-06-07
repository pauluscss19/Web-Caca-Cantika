<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangAsetMasuk extends Model
{
    protected $table = 'barang_aset_masuk';
    protected $primaryKey = 'id_aset';

    protected $fillable = [
        'kode_aset',
        'nama_aset',
        'kategori_aset',
        'jumlah',
        'satuan',
        'kondisi_aset',
        'tanggal_masuk',
        'sumber_aset',
        'lokasi_aset',
        'nilai_aset',
        'status_aset',
        'keterangan',
    ];
}
