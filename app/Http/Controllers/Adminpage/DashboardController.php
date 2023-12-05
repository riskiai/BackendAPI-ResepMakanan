<?php

namespace App\Http\Controllers\Adminpage;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('adminpage.dashboard');
    }
}
