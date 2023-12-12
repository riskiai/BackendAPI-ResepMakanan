<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;


class FrontArtikelController extends Controller
{
    public function index(Request $request)
    {
        $latestArticle = Article::latest()->first();
    
        $query = Article::latest();
    
        if ($request->get('search')) {
            $query->where('judul', 'LIKE', '%' . $request->get('search') . '%');
        }
    
        $articles = $query->paginate(3);
    
        return view('userpage.artikel', compact('latestArticle', 'articles'));
    }
    


    public function detail(Request $request, $id){
        $article = Article::all()->where('id',$id)->firstOrFail();

        /* Melakukan Filter Data */
        // if ($request->get('search')) {
        //     $query->where('judul', 'LIKE', '%' . $request->get('search') . '%');
        // }

        // $data = $query->paginate(5);

        return view('userpage.detail-artikel', compact('article'));
    }
}


