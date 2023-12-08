<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $indexKe = 1;
        foreach ($collection as $row) {
            if ($indexKe > 1) {
                $data['email'] = !empty($row[1]) ? $row[1] : '';  // Email dari kolom kedua
                $data['name'] = !empty($row[0]) ? $row[0] : '';   // Nama dari kolom pertama
                $data['password'] = !empty($row[2]) ? Hash::make($row[2]) : ''; // Password dari kolom ketiga
    
                // Tambahkan validasi email sebelum membuat entri baru
                if (!empty($data['email'])) {
                    User::updateOrCreate(
                        ['email' => $data['email']],
                        ['name' => $data['name'], 'password' => $data['password']]
                    );
                }
            }
    
            $indexKe++;
        }
    }
    
}
