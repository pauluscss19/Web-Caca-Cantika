<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aset')->insert([
            ['id' => 1, 'nama_aset' => 'Tanah A', 'kategori' => 'Tanah', 'nilai_perolehan' => 5000000000.00, 'tahun_perolehan' => 2015, 'kondisi' => 'baik', 'satker_id' => 1, 'gambar' => null],
            ['id' => 2, 'nama_aset' => 'Gedung B', 'kategori' => 'Bangunan', 'nilai_perolehan' => 3000000000.00, 'tahun_perolehan' => 2017, 'kondisi' => 'baik', 'satker_id' => 2, 'gambar' => null],
            ['id' => 3, 'nama_aset' => 'Mobil C', 'kategori' => 'Kendaraan', 'nilai_perolehan' => 250000000.00, 'tahun_perolehan' => 2020, 'kondisi' => 'baik', 'satker_id' => 3, 'gambar' => null],
            ['id' => 4, 'nama_aset' => 'Motor D', 'kategori' => 'Kendaraan', 'nilai_perolehan' => 15000000.00, 'tahun_perolehan' => 2021, 'kondisi' => 'baik', 'satker_id' => 4, 'gambar' => null],
            ['id' => 5, 'nama_aset' => 'Laptop E', 'kategori' => 'Elektronik', 'nilai_perolehan' => 10000000.00, 'tahun_perolehan' => 2022, 'kondisi' => 'baik', 'satker_id' => 5, 'gambar' => null],
            ['id' => 6, 'nama_aset' => 'Printer F', 'kategori' => 'Elektronik', 'nilai_perolehan' => 5000000.00, 'tahun_perolehan' => 2021, 'kondisi' => 'rusak ringan', 'satker_id' => 6, 'gambar' => null],
            ['id' => 7, 'nama_aset' => 'Gedung G', 'kategori' => 'Peralatan', 'nilai_perolehan' => 800000000.00, 'tahun_perolehan' => 2019, 'kondisi' => 'baik', 'satker_id' => 7, 'gambar' => null],
            ['id' => 8, 'nama_aset' => 'Tanah H', 'kategori' => 'Tanah', 'nilai_perolehan' => 4000000000.00, 'tahun_perolehan' => 2016, 'kondisi' => 'baik', 'satker_id' => 8, 'gambar' => null],
            ['id' => 9, 'nama_aset' => 'Gedung I', 'kategori' => 'Bangunan', 'nilai_perolehan' => 2000000000.00, 'tahun_perolehan' => 2018, 'kondisi' => 'rusak ringan', 'satker_id' => 9, 'gambar' => null],
            ['id' => 10, 'nama_aset' => 'Mobil J', 'kategori' => 'Kendaraan', 'nilai_perolehan' => 300000000.00, 'tahun_perolehan' => 2020, 'kondisi' => 'baik', 'satker_id' => 10, 'gambar' => null],
            ['id' => 11, 'nama_aset' => 'Laptop K', 'kategori' => 'Elektronik', 'nilai_perolehan' => 15000000.00, 'tahun_perolehan' => 2022, 'kondisi' => 'baik', 'satker_id' => 11, 'gambar' => null],
            ['id' => 12, 'nama_aset' => 'Tanah L', 'kategori' => 'Elektronik', 'nilai_perolehan' => 6000000.00, 'tahun_perolehan' => 2021, 'kondisi' => 'rusak berat', 'satker_id' => 12, 'gambar' => null],
            ['id' => 13, 'nama_aset' => 'Tanah M', 'kategori' => 'Tanah', 'nilai_perolehan' => 4500000000.00, 'tahun_perolehan' => 2014, 'kondisi' => 'baik', 'satker_id' => 13, 'gambar' => null],
            ['id' => 14, 'nama_aset' => 'Gedung N', 'kategori' => 'Bangunan', 'nilai_perolehan' => 3500000000.00, 'tahun_perolehan' => 2016, 'kondisi' => 'baik', 'satker_id' => 14, 'gambar' => null],
            ['id' => 15, 'nama_aset' => 'Mobil O', 'kategori' => 'Kendaraan', 'nilai_perolehan' => 280000000.00, 'tahun_perolehan' => 2019, 'kondisi' => 'baik', 'satker_id' => 15, 'gambar' => null],
            ['id' => 16, 'nama_aset' => 'Motor P', 'kategori' => 'Kendaraan', 'nilai_perolehan' => 18000000.00, 'tahun_perolehan' => 2020, 'kondisi' => 'baik', 'satker_id' => 16, 'gambar' => null],
            ['id' => 17, 'nama_aset' => 'Laptop Q', 'kategori' => 'Elektronik', 'nilai_perolehan' => 12000000.00, 'tahun_perolehan' => 2022, 'kondisi' => 'baik', 'satker_id' => 17, 'gambar' => null],
            ['id' => 18, 'nama_aset' => 'Printer R', 'kategori' => 'Elektronik', 'nilai_perolehan' => 7000000.00, 'tahun_perolehan' => 2021, 'kondisi' => 'rusak ringan', 'satker_id' => 18, 'gambar' => null],
            ['id' => 19, 'nama_aset' => 'Alat S', 'kategori' => 'Peralatan', 'nilai_perolehan' => 900000000.00, 'tahun_perolehan' => 2018, 'kondisi' => 'baik', 'satker_id' => 19, 'gambar' => null],
            ['id' => 20, 'nama_aset' => 'Tanah T', 'kategori' => 'Tanah', 'nilai_perolehan' => 6000000000.00, 'tahun_perolehan' => 2013, 'kondisi' => 'baik', 'satker_id' => 20, 'gambar' => null],
            ['id' => 21, 'nama_aset' => 'CONTOH', 'kategori' => 'Tanah', 'nilai_perolehan' => 10.00, 'tahun_perolehan' => 2020, 'kondisi' => 'baik', 'satker_id' => 18, 'gambar' => null],
            ['id' => 22, 'nama_aset' => 'CONTOH', 'kategori' => 'Bangunan', 'nilai_perolehan' => 10000.00, 'tahun_perolehan' => 2020, 'kondisi' => 'baik', 'satker_id' => 17, 'gambar' => null],
        ]);
    }
}
