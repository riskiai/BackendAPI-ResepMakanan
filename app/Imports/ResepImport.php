<?php

namespace App\Imports;

use App\Models\Resep;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ResepImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $ke = 1;

        foreach ($collection as $row) {
            if ($ke > 1) {

                $judul_resep = !empty($row[0]) ? $row[0] : '';

                if (!$judul_resep) {
                    break;
                }

                $data['user_id'] = auth()->user()->id;
                $data['judul'] = $judul_resep;
                $data['description'] = $row[1];
                $data['bahan_bahan'] = $row[2];

                Resep::create($data);
            }

            $ke++;
        }
    }
}
