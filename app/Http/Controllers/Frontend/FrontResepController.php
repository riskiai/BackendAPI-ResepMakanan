<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class FrontResepController extends Controller
{

    // public function search(Request $request)
    //     {
    //         $query = Resep::latest();

    //         /* Melakukan Filter Data */
    //         if ($request->get('search')) {
    //             $query->where('judul', 'LIKE', '%' . $request->get('search') . '%');
    //         }

    //         $recipes = $query->paginate(3);

    //         return view('userpage.resep', compact('recipes'));
    //     }


    public function index(Request $request)
    {
        $latestResep = Resep::with('comments')->latest()->first();

        $query = Resep::latest();

        $recipes = $query->paginate(3);

        return view('userpage.resep', compact('recipes', 'latestResep'));
    }

    public function search(Request $request){
        $query = Resep::latest();
        $searchInput = $request->get('search');


        if ($searchInput) {
            $query->where('judul', 'LIKE', '%' . $searchInput . '%');
        }
            $recipes = $query->paginate(5);
            /* Melakukan Filter Data */

            return view('userpage.hasil-pencarian', compact('recipes','searchInput'));

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
