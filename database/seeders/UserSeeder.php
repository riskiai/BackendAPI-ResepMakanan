<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => '$2y$10$LbDjLqtEBiO1095HLTh6zu03ObFPuNhj19fceApzbYiDQYChar9Pe', // Sesuaikan dengan ID user yang ada di tabel 'users'
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'nizar',
            'email' => 'nizar@email.com',
            'password' => '$2y$10$LbDjLqtEBiO1095HLTh6zu03ObFPuNhj19fceApzbYiDQYChar9Pe', // Sesuaikan dengan ID user yang ada di tabel 'users'
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'eva',
            'email' => 'eva@email.com',
            'password' => '$2y$10$LbDjLqtEBiO1095HLTh6zu03ObFPuNhj19fceApzbYiDQYChar9Pe', // Sesuaikan dengan ID user yang ada di tabel 'users'
            'created_at' => now(),
        ]);
    }
}
