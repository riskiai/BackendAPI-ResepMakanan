<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for 'articels' table
        DB::table('articels')->insert([
            'title' => 'Cara Membuat Ayam Goreng',
            'content' => 'Ayam goreng adalah hidangan Indonesia yang merupakan ayam yang digoreng dalam minyak goreng. Dalam dunia internasional, istilah ayam goreng merujuk kepada cara Indonesia dalam memasak ayam yang digoreng. Kebanyakan ayam goreng khas Nusantara tidak dilapisi tepung, dan memiliki bumbu yang lebih kaya.',
            'author' => 1, // Sesuaikan dengan ID user yang ada di tabel 'users'
            'created_at' => now(),
        ]);

        DB::table('articels')->insert([
            'title' => 'Cara Membuat Mie Goreng',
            'content' => 'Mi goreng berarti "mi yang digoreng" adalah hidangan mie yang dimasak dengan digoreng tumis khas Indonesia. Mi goreng juga populer dan juga digemari di Malaysia, dan Singapura.',
            'author' => 1, // Sesuaikan dengan ID user yang ada di tabel 'users'
            'created_at' => now(),
        ]);

        DB::table('articels')->insert([
            'title' => 'Cara Membuat Seblak Mantul',
            'content' => 'Seblak adalah masakan khas Sunda yang berasal dari wilayah Parahyangan dengan cita rasa gurih dan pedas. Seblak umumnya terbuat dari kerupuk yang terdiri dari bawang putih dengan kencur. Dalam Kamus Basa Sunda dijelaskan bahwa seblak, nyeblak: rasa haté dina waktu inget kana balai.',
            'author' => 1, // Sesuaikan dengan ID user yang ada di tabel 'users'
            'created_at' => now(),
        ]);

        // You can add more data as needed
    }
}
