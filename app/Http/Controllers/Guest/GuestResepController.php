<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Resep;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;






class GuestResepController extends Controller
{
    public function index(){

        return view('userpage.tulis-resep');
    }

    public function detail(){
        $user = Auth::user();
        $recipes = Resep::with('comments')
            ->where('user_id',$user->id)
            ->get();

        return view('userpage.daftar-resepku',compact('recipes'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required',
            'waktu' => 'required',
            'porsi' => 'required',
            'bahan_langkah' => 'required',
            'description' => 'required',
        ]);

        /* Validasi Error Required */
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        /* Eksekusi Image */
        $image = $request->file('image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        $path = 'photo-resep/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        /* Ngirim Data */
        $data['user_id'] = Auth::id();
        $data['judul']      = $request->judul;
        $data['waktu']      = $request->waktu;
        $data['porsi']      = $request->porsi;

        // Decode HTML entities before saving to the database
        $data['description'] = htmlspecialchars_decode($request->description);
        $data['bahan_langkah'] = htmlspecialchars_decode($request->bahan_langkah);

        $data['image']      = $filename;

        Resep::create($data);

        return redirect()->route('guest.resepku');
    }

    public function uploadFotoBahan(Request $request)
    {
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->
                getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' .$extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);

        }
    }

    public function edit(Request $request, $id){
        $data = Resep::find($id);

        return view('userpage.edit-resep', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required',
            'waktu' => 'required',
            'porsi' => 'required',
            'bahan_langkah' => 'required',
            'description' => 'required',
        ]);

        /* Validasi Error Required */
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        /* Ngirim Data */
        $data = Resep::find($id);
        $data->judul = $request->judul;
        $data->waktu = $request->waktu;
        $data->porsi = $request->porsi;
        $data->bahan_langkah = $request->bahan_langkah;
        $data->description = $request->description;

         // Periksa apakah kotak centang "remove_image" dipilih
        if ($request->has('remove_image')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete('photo-resep/' . $data->image);
            $data->image = null;
        }

       // Tangani kasus ketika gambar baru diunggah
        if ($request->hasFile('image')) {
            // Simpan gambar yang baru
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'photo-resep/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image));
            $data->image = $filename;
        }


        $data->save(); // Simpan pengguna yang telah diperbarui

        return redirect()->route('guest.resepku');
    }

    public function delete(Request $request, $id){
        $data = Resep::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('guest.resepku');
    }
}

