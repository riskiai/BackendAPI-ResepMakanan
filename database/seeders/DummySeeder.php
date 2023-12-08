<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i < 50; $i++) {
            $email = 'user' . $i . '@gmail.com';
        
            // Periksa apakah email sudah ada
            if (!User::where('email', $email)->exists()) {
                User::create([
                    'name' => 'User ke ' . $i,
                    'email' => $email,
                    'password' => Hash::make('password'),
                ]);
            }
        }
        
    }
}
