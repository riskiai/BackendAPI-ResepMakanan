<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestResepController extends Controller
{
    public function index(){
        return view('userpage.tulis-resep');
    }

    public function detail(){

        return view('userpage.daftar-resepku');
    }
}

