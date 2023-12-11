<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Nutrisi;
use Illuminate\Http\Request;

class FrontNutrisiController extends Controller
{
    public function index(){
        $latestResep = Nutrisi::with('comments')->latest()->first();
        $recipes = Nutrisi::with('comments')->get();
        return view('userpage.resep',compact('recipes','latestResep'));
    }
}
