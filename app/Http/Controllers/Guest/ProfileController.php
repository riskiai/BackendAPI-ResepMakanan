<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index(){


        return view('userpage.profile');
    }
    public function edit(){


        return view('userpage.profile-edit');
    }

    public function editPassword(){


        return view('userpage.profile-password');
    }
}
