<?php

namespace App\Imports;

use App\Models\Article;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ArticleImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $ke = 1;

        foreach ($collection as $row) {
            if ($ke > 1) {
               

                $judul_article = !empty($row[0]) ? $row[0] : '';

                if (!$judul_article) {
                    break;
                }

                $data['user_id'] = auth()->user()->id;
                $data['judul'] = $judul_article;
                $data['description'] = $row[1];

                Article::create($data);
            }

            $ke++;
        }
    }
}
