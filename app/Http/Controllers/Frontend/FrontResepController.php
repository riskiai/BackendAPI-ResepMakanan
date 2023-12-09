<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resep;



class FrontResepController extends Controller
{
    public function index(){
        $latestResep = Resep::with('comments')->latest()->first();
        $recipes = Resep::with('comments')->get();
        return view('userpage.resep',compact('recipes','latestResep'));
    }

    public function detail(Request $request, $id){
        $resep = Resep::with('comments')->where('id',$id)->firstOrFail();

        /* Melakukan Filter Data */
        // if ($request->get('search')) {
        //     $query->where('judul', 'LIKE', '%' . $request->get('search') . '%');
        // }

        // $data = $query->paginate(5);

        return view('userpage.detail-resep', compact('resep'));
    }
}
