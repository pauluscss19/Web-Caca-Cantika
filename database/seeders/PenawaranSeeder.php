<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenawaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penawaran')->insert([
            ['id' => 1, 'lelang_id' => 1, 'peserta_id' => 1, 'harga_penawaran' => 4100000000.00],
            ['id' => 2, 'lelang_id' => 1, 'peserta_id' => 2, 'harga_penawaran' => 4200000000.00],
            ['id' => 3, 'lelang_id' => 2, 'peserta_id' => 3, 'harga_penawaran' => 2550000000.00],
            ['id' => 4, 'lelang_id' => 3, 'peserta_id' => 4, 'harga_penawaran' => 205000000.00],
            ['id' => 5, 'lelang_id' => 3, 'peserta_id' => 5, 'harga_penawaran' => 210000000.00],
            ['id' => 6, 'lelang_id' => 5, 'peserta_id' => 6, 'harga_penawaran' => 8500000.00],
            ['id' => 7, 'lelang_id' => 7, 'peserta_id' => 7, 'harga_penawaran' => 720000000.00],
            ['id' => 8, 'lelang_id' => 7, 'peserta_id' => 8, 'harga_penawaran' => 750000000.00],
            ['id' => 9, 'lelang_id' => 9, 'peserta_id' => 9, 'harga_penawaran' => 1550000000.00],
            ['id' => 10, 'lelang_id' => 10, 'peserta_id' => 10, 'harga_penawaran' => 255000000.00],
            ['id' => 11, 'lelang_id' => 13, 'peserta_id' => 11, 'harga_penawaran' => 3050000000.00],
            ['id' => 12, 'lelang_id' => 15, 'peserta_id' => 12, 'harga_penawaran' => 245000000.00],
            ['id' => 13, 'lelang_id' => 17, 'peserta_id' => 13, 'harga_penawaran' => 10500000.00],
            ['id' => 14, 'lelang_id' => 19, 'peserta_id' => 14, 'harga_penawaran' => 820000000.00],
            ['id' => 15, 'lelang_id' => 19, 'peserta_id' => 15, 'harga_penawaran' => 850000000.00],
            ['id' => 16, 'lelang_id' => 2, 'peserta_id' => 16, 'harga_penawaran' => 2600000000.00],
            ['id' => 17, 'lelang_id' => 5, 'peserta_id' => 17, 'harga_penawaran' => 9000000.00],
            ['id' => 18, 'lelang_id' => 10, 'peserta_id' => 18, 'harga_penawaran' => 260000000.00],
            ['id' => 19, 'lelang_id' => 3, 'peserta_id' => 19, 'harga_penawaran' => 208000000.00],
            ['id' => 20, 'lelang_id' => 1, 'peserta_id' => 20, 'harga_penawaran' => 4150000000.00],
        ]);
    }
}
