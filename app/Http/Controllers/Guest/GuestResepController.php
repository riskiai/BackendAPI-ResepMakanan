<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Resep;
use App\Models\Comment;




class GuestResepController extends Controller
{
    public function index(){

        return view('userpage.tulis-resep');
    }

    public function detail(){
        $user = Auth::user();
        $recipes = Resep::with('comments')
            ->where('user_id',$user->id)
            ->get();

        return view('userpage.daftar-resepku',compact('recipes'));
    }
}

