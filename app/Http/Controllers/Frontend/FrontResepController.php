<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


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


    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $commentData = [
            'user_id' => Auth::id(),
            'resep_id' => $id,
            'comment_resep' => $request->input('comment'),
        ];

        Comment::create($commentData);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}