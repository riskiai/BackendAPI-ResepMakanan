<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for 'receps' table
        DB::table('receps')->insert([
            'judul_resep' => 'Nasi Goreng Spesial',
            'porsi' => '3 Porsi',
            'waktu' => '50 menit',
            'deskripsi' => 'Nasi goreng adalah makanan berupa nasi yang digoreng dan dicampur dalam minyak goreng, margarin, atau mentega. Biasanya ditambah dengan kecap manis, bawang merah, bawang putih, asam jawa, lada dan bahan lainnya; seperti telur, daging ayam, dan kerupuk.',
            'bahan' => '1. Sediakan Nasi,
                        2. Minyak Goreng,
                        3. Bawang Putih dan Bawang Merah,
                        4. Penyedap',
            'langkah' =>
                '1. Haluskan bumbu bawang merah dan bawang putih,
                2. Tumis bumbu ke wajan,
                3. Masukkan nasi kedalam bumbu dan tambahkan penyedap,
                4. Nasi goreng siap untuk dihidangkan',
            'author' => 3, // Sesuaikan dengan ID user yang ada di tabel 'users'
            'created_at' => now(),
        ]);

        DB::table('receps')->insert([
            'judul_resep' => 'Seblak Bandung Mantap',
            'porsi' => '4 Porsi',
            'waktu' => '45 menit',
            'deskripsi' => 'Seblak adalah masakan khas Sunda yang berasal dari wilayah Parahyangan dengan cita rasa gurih dan pedas. Seblak umumnya terbuat dari kerupuk yang terdiri dari bawang putih dengan kencur. ',
            'bahan' =>
                '1. Bawang merah dan bawang putih,
                2. Kencur,
                3. Krupuk, Makaroni,
                4. Mie dan Sayuran,
                5. Penyedap makanan',
            'langkah' =>
                '1. Haluskan bumbu,
                2. Masukkan bumbu ke wajan,
                3. Masukkan krupuk,
                4. Seblak siap dihidangkan',
            'author' => 2, // Sesuaikan dengan ID user yang ada di tabel 'users'
            'created_at' => now(),
        ]);

        // You can add more data as needed
    }
}
