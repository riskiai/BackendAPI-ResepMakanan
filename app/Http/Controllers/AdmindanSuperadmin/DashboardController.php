<?php

namespace App\Http\Controllers\AdmindanSuperadmin;


use App\Http\Controllers\Controller;

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

    public function dashboard(){
        // dd(auth()->user()->getRoleNames());
        return view('AdmindanSuperadmin.dashboard');
    }
}
