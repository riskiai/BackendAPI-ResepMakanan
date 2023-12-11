<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;


class FrontArtikelController extends Controller
{
    public function index(){
        $article = Article::all();
        $latestArticle = Article::latest()->first();


        return view('userpage.artikel',compact('article','latestArticle'));
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


