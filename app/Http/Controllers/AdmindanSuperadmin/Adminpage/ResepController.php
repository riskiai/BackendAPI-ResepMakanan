<?php

namespace App\Http\Controllers\AdmindanSuperadmin\Adminpage;


use App\Http\Controllers\Controller;
use App\Models\Resep;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ResepController extends Controller
{
    public function index(Request $request)
    {
        $query = Resep::latest();

        /* Melakukan Filter Data */
        if ($request->get('search')) {
            $query->where('judul', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $query->paginate(3);
    
        return view('admindansuperadmin.adminpage.resep.index', compact('data','request'));
    }

        // ResepController.php

    public function show(Request $request, $id)
    {
            $data = Resep::find($id);

            return view('admindansuperadmin.adminpage.resep.show', compact('data'));
    }

    /* Add Comment Untuk Resep */
    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $commentData = [
            'user_id' => Auth::id(),
            'resep_id' => $id,
            'comment_resep' => $request->input('comment'),
        ];

        Comment::create($commentData);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }


    public function create(){
        return view('admindansuperadmin.adminpage.resep.create');
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

        return redirect()->route('admin.resep.index');
    }

    public function edit(Request $request, $id){
        $data = Resep::find($id); 
        
        return view('admindansuperadmin.adminpage.resep.edit', compact('data'));
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
    
        return redirect()->route('admin.resep.index');
    }

    public function delete(Request $request, $id){
        $data = Resep::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.resep.index');
    }
    

}
