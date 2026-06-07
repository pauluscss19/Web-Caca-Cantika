<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Admin 1', 'email' => 'admin1@mail.com', 'password' => '123456', 'role' => 'admin', 'photo' => null],
            ['id' => 2, 'name' => 'Admin 2', 'email' => 'admin2@mail.com', 'password' => '123456', 'role' => 'admin', 'photo' => null],
            ['id' => 3, 'name' => 'Petugas 1', 'email' => 'petugas1@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 4, 'name' => 'Petugas 2', 'email' => 'petugas2@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 5, 'name' => 'Petugas 3', 'email' => 'petugas3@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 6, 'name' => 'Petugas 4', 'email' => 'petugas4@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 7, 'name' => 'Petugas 5', 'email' => 'petugas5@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 8, 'name' => 'Petugas 6', 'email' => 'petugas6@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 9, 'name' => 'Petugas 7', 'email' => 'petugas7@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 10, 'name' => 'Petugas 8', 'email' => 'petugas8@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 11, 'name' => 'Petugas 9', 'email' => 'petugas9@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 12, 'name' => 'Petugas 10', 'email' => 'petugas10@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 13, 'name' => 'Pimpinan 1', 'email' => 'pimpinan1@mail.com', 'password' => '123456', 'role' => 'pimpinan', 'photo' => null],
            ['id' => 14, 'name' => 'Pimpinan 2', 'email' => 'pimpinan2@mail.com', 'password' => '123456', 'role' => 'pimpinan', 'photo' => null],
            ['id' => 15, 'name' => 'User 1', 'email' => 'user1@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 16, 'name' => 'User 2', 'email' => 'user2@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 17, 'name' => 'User 3', 'email' => 'user3@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 18, 'name' => 'User 4', 'email' => 'user4@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 19, 'name' => 'User 5', 'email' => 'user5@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
            ['id' => 20, 'name' => 'User 6', 'email' => 'user6@mail.com', 'password' => '123456', 'role' => 'petugas', 'photo' => null],
        ]);
    }
}
