<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PiutangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('piutang')->insert([
            ['id' => 1, 'nama_debitur' => 'PT A', 'jumlah_piutang' => 1000000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-12-01'],
            ['id' => 2, 'nama_debitur' => 'PT B', 'jumlah_piutang' => 800000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-10-01'],
            ['id' => 3, 'nama_debitur' => 'PT C', 'jumlah_piutang' => 600000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-08-01'],
            ['id' => 4, 'nama_debitur' => 'PT D', 'jumlah_piutang' => 500000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-07-01'],
            ['id' => 5, 'nama_debitur' => 'PT E', 'jumlah_piutang' => 900000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-09-01'],
            ['id' => 6, 'nama_debitur' => 'PT F', 'jumlah_piutang' => 700000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-11-01'],
            ['id' => 7, 'nama_debitur' => 'PT G', 'jumlah_piutang' => 400000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-06-01'],
            ['id' => 8, 'nama_debitur' => 'PT H', 'jumlah_piutang' => 300000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-05-01'],
            ['id' => 9, 'nama_debitur' => 'PT I', 'jumlah_piutang' => 200000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-04-01'],
            ['id' => 10, 'nama_debitur' => 'PT J', 'jumlah_piutang' => 100000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-03-01'],
            ['id' => 11, 'nama_debitur' => 'PT K', 'jumlah_piutang' => 950000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-10-01'],
            ['id' => 12, 'nama_debitur' => 'PT L', 'jumlah_piutang' => 850000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-09-01'],
            ['id' => 13, 'nama_debitur' => 'PT M', 'jumlah_piutang' => 750000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-07-01'],
            ['id' => 14, 'nama_debitur' => 'PT N', 'jumlah_piutang' => 650000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-06-01'],
            ['id' => 15, 'nama_debitur' => 'PT O', 'jumlah_piutang' => 550000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-05-01'],
            ['id' => 16, 'nama_debitur' => 'PT P', 'jumlah_piutang' => 450000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-04-01'],
            ['id' => 17, 'nama_debitur' => 'PT Q', 'jumlah_piutang' => 350000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-03-01'],
            ['id' => 18, 'nama_debitur' => 'PT R', 'jumlah_piutang' => 250000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-02-01'],
            ['id' => 19, 'nama_debitur' => 'PT S', 'jumlah_piutang' => 150000000.00, 'status' => 'belum lunas', 'tanggal_jatuh_tempo' => '2026-01-01'],
            ['id' => 20, 'nama_debitur' => 'PT T', 'jumlah_piutang' => 120000000.00, 'status' => 'lunas', 'tanggal_jatuh_tempo' => '2025-01-01'],
        ]);
    }
}
