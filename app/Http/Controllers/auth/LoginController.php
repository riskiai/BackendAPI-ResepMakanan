<?php

namespace App\Http\Controllers\auth;


use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function index(){
        // Jika pengguna sudah login, arahkan kembali ke halaman dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        /* Menyimpan Data */
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard')->with('success', 'Kamu Berhasil Login');
        }else{
            return redirect()->route('login')->with('failed', 'Email Atau Password Salah');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu Berhasil Logout');
    }
    
   
    
}
