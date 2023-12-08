<?php

namespace App\Http\Controllers\AdmindanSuperadmin\Superadminpage;


use App\Models\User;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /* Membuat Permission Untuk Sebuah Satu Method controller penuh */
    // public function __construct()
    // {
    //     // $this->middleware('role:admin|superadmin');
    //     $this->middleware(['permission:view_dashboard']);
    // }

    public function index(Request $request)
    {
        $query = User::latest();

        /* Melakukan Filter Data */
        if ($request->get('search')) {
            $query->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        }

        $data = $query->paginate(5);
    
        return view('admindansuperadmin.superadminpage.user.index', compact('data','request'));
    }
    

    public function create(){
        $roles = Role::all();
        return view('admindansuperadmin.superadminpage.user.create', compact('roles'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email', 
            'name' => 'required',
            'role'    => 'required|exists:roles,name',
            'password' => 'required',
        ]);

        /* Validasi Error Required */
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        /* Eksekusi Image */
        $image = $request->file('image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        $path = 'photo-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        /* Ngirim Data */
        $data['email']      = $request->email;
        $data['name']       = $request->name;
        $data['password']   = Hash::make($request->password);
        $data['image']      = $filename;

        $user = User::create($data);
        $user->assignRole($request->role);

        return redirect()->route('superadmin.user.index');
    }

    public function edit(Request $request, $id){
        $data = User::find($id); 
        
        return view('admindansuperadmin.superadminpage.user.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email', 
            'name' => 'required',
            'password' => 'nullable',
        ]);
    
        /* Validasi Error Required */
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        /* Ngirim Data */
        $data = User::find($id);
        $data->email = $request->email;
        $data->name = $request->name;
    
        if ($request->password) {
            $data->password = Hash::make($request->password);
        }

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
    
        return redirect()->route('superadmin.user.index');
    }
    

    public function delete(Request $request, $id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('superadmin.user.index');
    }
}

