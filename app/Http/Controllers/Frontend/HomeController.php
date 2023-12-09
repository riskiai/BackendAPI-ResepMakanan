<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Resep;
use App\Models\Nutrisi;


class HomeController extends Controller
{
    public function index(Request $request){
        $articles = Article::all();
        $recipes = Resep::with('comments')->get();
        // $recipes = Resep::with('comments')->where('id',$id)->firstOrFail();

        // $nutrisi = Nutrisi::all();

        /* Melakukan Filter Data */
        // if ($request->get('search')) {
        //     $query->where('judul', 'LIKE', '%' . $request->get('search') . '%');
        // }

        // $data = $query->paginate(5);

        return view('userpage.index', compact('articles','recipes'));
    }


}
