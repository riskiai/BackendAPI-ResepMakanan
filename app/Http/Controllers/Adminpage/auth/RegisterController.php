<?php

namespace App\Http\Controllers\Adminpage\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
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
