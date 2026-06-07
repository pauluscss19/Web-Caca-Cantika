<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satker')->insert([
            ['id' => 1, 'nama_satker' => 'Satker Pendidikan 1', 'alamat' => 'Surabaya', 'no_telp' => '031111111'],
            ['id' => 2, 'nama_satker' => 'Satker Pendidikan 2', 'alamat' => 'Surabaya', 'no_telp' => '031111112'],
            ['id' => 3, 'nama_satker' => 'Satker Kesehatan 1', 'alamat' => 'Surabaya', 'no_telp' => '031111113'],
            ['id' => 4, 'nama_satker' => 'Satker Kesehatan 2', 'alamat' => 'Surabaya', 'no_telp' => '031111114'],
            ['id' => 5, 'nama_satker' => 'Satker Keuangan 1', 'alamat' => 'Surabaya', 'no_telp' => '031111115'],
            ['id' => 6, 'nama_satker' => 'Satker Keuangan 2', 'alamat' => 'Surabaya', 'no_telp' => '031111116'],
            ['id' => 7, 'nama_satker' => 'Satker PU 1', 'alamat' => 'Surabaya', 'no_telp' => '031111117'],
            ['id' => 8, 'nama_satker' => 'Satker PU 2', 'alamat' => 'Surabaya', 'no_telp' => '031111118'],
            ['id' => 9, 'nama_satker' => 'Satker Perhubungan 1', 'alamat' => 'Surabaya', 'no_telp' => '031111119'],
            ['id' => 10, 'nama_satker' => 'Satker Perhubungan 2', 'alamat' => 'Surabaya', 'no_telp' => '031111120'],
            ['id' => 11, 'nama_satker' => 'Satker Sosial 1', 'alamat' => 'Surabaya', 'no_telp' => '031111121'],
            ['id' => 12, 'nama_satker' => 'Satker Sosial 2', 'alamat' => 'Surabaya', 'no_telp' => '031111122'],
            ['id' => 13, 'nama_satker' => 'Satker Lingkungan 1', 'alamat' => 'Surabaya', 'no_telp' => '031111123'],
            ['id' => 14, 'nama_satker' => 'Satker Lingkungan 2', 'alamat' => 'Surabaya', 'no_telp' => '031111124'],
            ['id' => 15, 'nama_satker' => 'Satker Pariwisata 1', 'alamat' => 'Surabaya', 'no_telp' => '031111125'],
            ['id' => 16, 'nama_satker' => 'Satker Pariwisata 2', 'alamat' => 'Surabaya', 'no_telp' => '031111126'],
            ['id' => 17, 'nama_satker' => 'Satker UMKM 1', 'alamat' => 'Surabaya', 'no_telp' => '031111127'],
            ['id' => 18, 'nama_satker' => 'Satker UMKM 2', 'alamat' => 'Surabaya', 'no_telp' => '031111128'],
            ['id' => 19, 'nama_satker' => 'Satker Pertanian 1', 'alamat' => 'Surabaya', 'no_telp' => '031111129'],
            ['id' => 20, 'nama_satker' => 'Satker Pertanian 2', 'alamat' => 'Surabaya', 'no_telp' => '031111130'],
        ]);
    }
}
