<?php

namespace App\Http\Controllers\Adminpage;


use App\Http\Controllers\Controller;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $query = Comment::with('user', 'resep')->latest();
    
        /* Melakukan Filter Data */
        if ($request->get('search')) {
            $query->where('comment_resep', 'LIKE', '%' . $request->get('search') . '%'); 
        }
    
        $data = $query->paginate(5);
    
        return view('admindansuperadmin.adminpage.comment.index', compact('data','request'));
    }

    public function delete(Request $request, $id){
        $data = Comment::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.comment.index');
    }
    
}
