<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LelangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lelang')->insert([
            ['id' => 1, 'aset_id' => 1, 'tanggal_lelang' => '2024-05-01', 'harga_limit' => 4000000000.00, 'harga_terjual' => 4200000000.00, 'status' => 'terjual'],
            ['id' => 2, 'aset_id' => 2, 'tanggal_lelang' => '2024-05-02', 'harga_limit' => 2500000000.00, 'harga_terjual' => 2600000000.00, 'status' => 'terjual'],
            ['id' => 3, 'aset_id' => 3, 'tanggal_lelang' => '2024-05-03', 'harga_limit' => 200000000.00, 'harga_terjual' => 210000000.00, 'status' => 'terjual'],
            ['id' => 4, 'aset_id' => 4, 'tanggal_lelang' => '2024-05-04', 'harga_limit' => 10000000.00, 'harga_terjual' => null, 'status' => 'proses'],
            ['id' => 5, 'aset_id' => 5, 'tanggal_lelang' => '2024-05-05', 'harga_limit' => 8000000.00, 'harga_terjual' => 9000000.00, 'status' => 'terjual'],
            ['id' => 6, 'aset_id' => 6, 'tanggal_lelang' => '2025-05-06', 'harga_limit' => 3000000.00, 'harga_terjual' => null, 'status' => 'proses'],
            ['id' => 7, 'aset_id' => 7, 'tanggal_lelang' => '2025-05-07', 'harga_limit' => 700000000.00, 'harga_terjual' => 750000000.00, 'status' => 'terjual'],
            ['id' => 8, 'aset_id' => 8, 'tanggal_lelang' => '2025-05-08', 'harga_limit' => 3500000000.00, 'harga_terjual' => null, 'status' => 'proses'],
            ['id' => 9, 'aset_id' => 9, 'tanggal_lelang' => '2025-05-09', 'harga_limit' => 1500000000.00, 'harga_terjual' => 1600000000.00, 'status' => 'terjual'],
            ['id' => 10, 'aset_id' => 10, 'tanggal_lelang' => '2025-05-10', 'harga_limit' => 250000000.00, 'harga_terjual' => 260000000.00, 'status' => 'terjual'],
            ['id' => 11, 'aset_id' => 11, 'tanggal_lelang' => '2026-02-11', 'harga_limit' => 12000000.00, 'harga_terjual' => null, 'status' => 'proses'],
            ['id' => 12, 'aset_id' => 12, 'tanggal_lelang' => '2026-02-12', 'harga_limit' => 4000000.00, 'harga_terjual' => null, 'status' => 'batal'],
            ['id' => 13, 'aset_id' => 13, 'tanggal_lelang' => '2026-02-13', 'harga_limit' => 3000000000.00, 'harga_terjual' => 3100000000.00, 'status' => 'terjual'],
            ['id' => 14, 'aset_id' => 14, 'tanggal_lelang' => '2026-02-14', 'harga_limit' => 2000000000.00, 'harga_terjual' => null, 'status' => 'proses'],
            ['id' => 15, 'aset_id' => 15, 'tanggal_lelang' => '2026-02-15', 'harga_limit' => 240000000.00, 'harga_terjual' => 250000000.00, 'status' => 'terjual'],
            ['id' => 16, 'aset_id' => 16, 'tanggal_lelang' => '2026-05-16', 'harga_limit' => 15000000.00, 'harga_terjual' => null, 'status' => 'proses'],
            ['id' => 17, 'aset_id' => 17, 'tanggal_lelang' => '2026-05-17', 'harga_limit' => 10000000.00, 'harga_terjual' => 11000000.00, 'status' => 'terjual'],
            ['id' => 18, 'aset_id' => 18, 'tanggal_lelang' => '2026-05-18', 'harga_limit' => 5000000.00, 'harga_terjual' => null, 'status' => 'batal'],
            ['id' => 19, 'aset_id' => 19, 'tanggal_lelang' => '2026-05-19', 'harga_limit' => 800000000.00, 'harga_terjual' => 850000000.00, 'status' => 'terjual'],
            ['id' => 20, 'aset_id' => 20, 'tanggal_lelang' => '2026-05-20', 'harga_limit' => 5000000000.00, 'harga_terjual' => null, 'status' => 'proses'],
            ['id' => 21, 'aset_id' => 5, 'tanggal_lelang' => '2024-05-05', 'harga_limit' => 8000000.00, 'harga_terjual' => 9000000.00, 'status' => 'terjual'],
        ]);
    }
}
