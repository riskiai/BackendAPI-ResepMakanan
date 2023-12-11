<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\User;




class ProfileController extends Controller
{
    public function index(){


        return view('userpage.profile');
    }
    public function edit(){


        return view('userpage.profile-edit');
    }

    public function updateProfile(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'name' => 'required',
        ]);

        /* Validasi Error Required */
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        /* Ngirim Data */
        $data = User::find($id);
        $data->email = $request->email;
        $data->name = $request->name;

         // Periksa apakah kotak centang "remove_image" dipilih
        if ($request->has('remove_image')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete('photo-user/' . $data->image);
            $data->image = null;
        }

       // Tangani kasus ketika gambar baru diunggah
        if ($request->hasFile('image')) {
            // Simpan gambar yang baru
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'photo-user/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image));
            $data->image = $filename;
        }

        $data->save(); // Simpan pengguna yang telah diperbarui

        return redirect()->route('guest.profile');
    }


    public function editPassword(){


        return view('userpage.profile-password');
    }
}
