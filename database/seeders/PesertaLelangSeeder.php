<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesertaLelangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peserta_lelang')->insert([
            ['id' => 1, 'nama' => 'Budi', 'email' => 'budi@mail.com', 'no_hp' => '0811'],
            ['id' => 2, 'nama' => 'Siti', 'email' => 'siti@mail.com', 'no_hp' => '0812'],
            ['id' => 3, 'nama' => 'Andi', 'email' => 'andi@mail.com', 'no_hp' => '0813'],
            ['id' => 4, 'nama' => 'Rina', 'email' => 'rina@mail.com', 'no_hp' => '0814'],
            ['id' => 5, 'nama' => 'Dedi', 'email' => 'dedi@mail.com', 'no_hp' => '0815'],
            ['id' => 6, 'nama' => 'Agus', 'email' => 'agus@mail.com', 'no_hp' => '0816'],
            ['id' => 7, 'nama' => 'Putri', 'email' => 'putri@mail.com', 'no_hp' => '0817'],
            ['id' => 8, 'nama' => 'Joko', 'email' => 'joko@mail.com', 'no_hp' => '0818'],
            ['id' => 9, 'nama' => 'Lina', 'email' => 'lina@mail.com', 'no_hp' => '0819'],
            ['id' => 10, 'nama' => 'Tono', 'email' => 'tono@mail.com', 'no_hp' => '0820'],
            ['id' => 11, 'nama' => 'Dina', 'email' => 'dina@mail.com', 'no_hp' => '0821'],
            ['id' => 12, 'nama' => 'Rudi', 'email' => 'rudi@mail.com', 'no_hp' => '0822'],
            ['id' => 13, 'nama' => 'Fajar', 'email' => 'fajar@mail.com', 'no_hp' => '0823'],
            ['id' => 14, 'nama' => 'Nina', 'email' => 'nina@mail.com', 'no_hp' => '0824'],
            ['id' => 15, 'nama' => 'Hadi', 'email' => 'hadi@mail.com', 'no_hp' => '0825'],
            ['id' => 16, 'nama' => 'Wati', 'email' => 'wati@mail.com', 'no_hp' => '0826'],
            ['id' => 17, 'nama' => 'Eko', 'email' => 'eko@mail.com', 'no_hp' => '0827'],
            ['id' => 18, 'nama' => 'Sari', 'email' => 'sari@mail.com', 'no_hp' => '0828'],
            ['id' => 19, 'nama' => 'Bayu', 'email' => 'bayu@mail.com', 'no_hp' => '0829'],
            ['id' => 20, 'nama' => 'Maya', 'email' => 'maya@mail.com', 'no_hp' => '0830'],
        ]);
    }
}
