<?php

namespace App\Http\Controllers\Adminpage;


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
        return view('adminpage.auth.login');
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
            return redirect()->route('admin.dashboard')->with('success', 'Berhasil Login');
        }else{
            return redirect()->route('login')->with('failed', 'Email Atau Password Salah');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu Berhasil Logout');
    }
    
    public function register(){
        return view('adminpage.auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name' => 'required', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);
        
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');

    }
    
}
