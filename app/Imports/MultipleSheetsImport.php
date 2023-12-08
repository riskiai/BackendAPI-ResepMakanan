<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleSheetsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Sheet1' => new ArticleImport(),
            'Sheet2' => new ResepImport(),
        ];
    }
}
