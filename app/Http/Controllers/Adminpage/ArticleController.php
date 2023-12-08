<?php

namespace App\Http\Controllers\Adminpage;


use App\Http\Controllers\Controller;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::latest();

        /* Melakukan Filter Data */
        if ($request->get('search')) {
            $query->where('judul', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $query->paginate(5);
    
        return view('admindansuperadmin.adminpage.article.index', compact('data','request'));
    }

    public function create(){
        return view('admindansuperadmin.adminpage.article.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required', 
            'description' => 'required',
        ]);

        /* Validasi Error Required */
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        /* Eksekusi Image */
        $image = $request->file('image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        $path = 'photo-article/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        /* Ngirim Data */
        $data['user_id'] = Auth::id();
        $data['judul']      = $request->judul;
        $data['description']       = $request->description;
        $data['image']      = $filename;

        Article::create($data);

        return redirect()->route('admin.article.index');
    }

    public function edit(Request $request, $id){
        $data = Article::find($id); 
        
        return view('admindansuperadmin.adminpage.article.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required', 
            'description' => 'required',
        ]);
    
        /* Validasi Error Required */
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        /* Ngirim Data */
        $data = Article::find($id);
        $data->judul = $request->judul;
        $data->description = $request->description;

         // Periksa apakah kotak centang "remove_image" dipilih
        if ($request->has('remove_image')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete('photo-article/' . $data->image);
            $data->image = null;
        }
    
       // Tangani kasus ketika gambar baru diunggah
        if ($request->hasFile('image')) {
            // Simpan gambar yang baru
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'photo-article/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image));
            $data->image = $filename;
        }
            

        $data->save(); // Simpan pengguna yang telah diperbarui
    
        return redirect()->route('admin.article.index');
    }

    public function delete(Request $request, $id){
        $data = Article::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.article.index');
    }
    
}
