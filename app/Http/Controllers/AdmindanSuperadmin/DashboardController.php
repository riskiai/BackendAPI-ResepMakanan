<?php

namespace App\Http\Controllers\AdmindanSuperadmin;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Nutrisi;
use App\Models\Resep;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     /* Membuat Permission Untuk Sebuah Satu Method controller penuh */
     public function __construct()
     {
         //  $this->middleware('role:admin|superadmin');
         //  $this->middleware(['permission:view_dashboard']);

        //  $this->middleware(['role_or_permission:superadmin|view_dashboard']);
       
         
     }

     public function index() {
        $commentCount = Comment::count();
        $commentsData = Comment::with('user')
            ->select('comments.id', 'users.name as user_name', 'comments.comment_resep as comment', 'comments.created_at', 'users.image as user_image')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->orderBy('comments.created_at', 'desc')
            ->limit(5)
            ->get();

        $resepCount = Resep::count();
        $articleCount = Article::count();
        $nutrisiCount = Nutrisi::count();
    
        return view('admindansuperadmin.dashboard', compact('commentCount', 'commentsData', 'resepCount', 'articleCount', 'nutrisiCount'));
    }
    
    
    
}
