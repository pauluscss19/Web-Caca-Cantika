<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogAktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('log_aktivitas')->insert([
            ['id' => 1, 'user_id' => 1, 'aktivitas' => 'Login'],
            ['id' => 2, 'user_id' => 2, 'aktivitas' => 'Input aset'],
            ['id' => 3, 'user_id' => 3, 'aktivitas' => 'Edit aset'],
            ['id' => 4, 'user_id' => 4, 'aktivitas' => 'Hapus aset'],
            ['id' => 5, 'user_id' => 5, 'aktivitas' => 'Input lelang'],
            ['id' => 6, 'user_id' => 6, 'aktivitas' => 'Update lelang'],
            ['id' => 7, 'user_id' => 7, 'aktivitas' => 'Lihat dashboard'],
            ['id' => 8, 'user_id' => 8, 'aktivitas' => 'Input peserta'],
            ['id' => 9, 'user_id' => 9, 'aktivitas' => 'Input penawaran'],
            ['id' => 10, 'user_id' => 10, 'aktivitas' => 'Logout'],
            ['id' => 11, 'user_id' => 11, 'aktivitas' => 'Login'],
            ['id' => 12, 'user_id' => 12, 'aktivitas' => 'Edit piutang'],
            ['id' => 13, 'user_id' => 13, 'aktivitas' => 'Input piutang'],
            ['id' => 14, 'user_id' => 14, 'aktivitas' => 'Lihat laporan'],
            ['id' => 15, 'user_id' => 15, 'aktivitas' => 'Export data'],
            ['id' => 16, 'user_id' => 16, 'aktivitas' => 'Import data'],
            ['id' => 17, 'user_id' => 17, 'aktivitas' => 'Reset password'],
            ['id' => 18, 'user_id' => 18, 'aktivitas' => 'Update profil'],
            ['id' => 19, 'user_id' => 19, 'aktivitas' => 'Monitoring sistem'],
            ['id' => 20, 'user_id' => 20, 'aktivitas' => 'Logout'],
        ]);
    }
}
