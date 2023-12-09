<?php

namespace App\Http\Controllers\AdmindanSuperadmin\Adminpage;

use App\Models\Nutrisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NutrsiController extends Controller
{
    public function index(Request $request)
    {
        $query = Nutrisi::latest();

        /* Melakukan Filter Data */
        if ($request->get('search')) {
            $query->where('judul', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $query->paginate(5);

        return view('admindansuperadmin.adminpage.nutrisi.index', compact('data','request'));
    }

    public function create(){
        return view('admindansuperadmin.adminpage.nutrisi.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required',
            'energi' => 'required',
            'protein' => 'required',
            'lemak' => 'required',
            'karbohidrat' => 'required'
        ]);

        /* Validasi Error Required */
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        /* Eksekusi Image */
        $image = $request->file('image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        $path = 'photo-nutrisi/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        /* Ngirim Data */
        $data['user_id'] = Auth::id();
        $data['image']      = $filename;
        $data['judul']      = $request->judul;
        $data['energi']      = $request->energi;
        $data['protein']      = $request->protein;
        $data['lemak']      = $request->lemak;
        $data['karbohidrat'] = $request->karbohidrat;

        Nutrisi::create($data);

        return redirect()->route('admin.nutrisi.index');
    }

    public function edit(Request $request, $id){
        $data = Nutrisi::find($id);

        return view('admindansuperadmin.adminpage.nutrisi.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required',
            'energi' => 'required',
            'protein' => 'required',
            'lemak' => 'required',
            'karbohidrat' => 'required',
        ]);

        /* Validasi Error Required */
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        /* Ngirim Data */
        $data = Nutrisi::find($id);
        $data->judul = $request->judul;
        $data->energi = $request->energi;
        $data->protein = $request->protein;
        $data->lemak = $request->lemak;
        $data->karbohidrat = $request->karbohidrat;

         // Periksa apakah kotak centang "remove_image" dipilih
        if ($request->has('remove_image')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete('photo-nutrisi/' . $data->image);
            $data->image = null;
        }

       // Tangani kasus ketika gambar baru diunggah
        if ($request->hasFile('image')) {
            // Simpan gambar yang baru
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'photo-nutrisi/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image));
            $data->image = $filename;
        }


        $data->save(); // Simpan pengguna yang telah diperbarui

        return redirect()->route('admin.nutrisi.index');
    }

    public function delete(Request $request, $id){
        $data = Nutrisi::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.nutrisi.index');
    }
}
