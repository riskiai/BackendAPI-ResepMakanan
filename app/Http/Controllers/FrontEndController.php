<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontEndController extends Controller
{
    public function index (){
        //call api
        $posts = Http::get("http://127.0.0.1/BackendAPI-ResepMakanan/public/api/articels")->json();
        // dd($posts);
        return view('pages.frontend.index',compact('posts'));
        // return view("pages.tesapi",compact("posts'));
    }

    public function bahan (){
        return view('pages.frontend.bahan');
    }

    public function resep (){
        return view('pages.frontend.resep');
    }

    public function detailResep (){
        return view('pages.frontend.detail-resep');
    }

    public function artikel (){
        return view('pages.frontend.artikel');
    }

    public function detailArtikel (){
        return view('pages.frontend.detail-artikel');
    }


    public function login(){
        return view('pages.frontend.login');
    }

    public function register(){
        return view('pages.frontend.register');
    }



}
