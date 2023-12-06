<?php

namespace App\Http\Controllers;

use App\Models\Recep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RecepResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\RecepDetailResource;

class RecepController extends Controller
{
    public function index()
    {
        $receps = Recep::all();
        // return response()->json(['data' => $receps]);
        return RecepDetailResource::collection($receps->loadMissing(['writer:id,username', 'comments:id,receps_id,user_id,comment_recep']));
    }

    public function show($id)
    {
        $recep = Recep::with('writer:id,username')->findOrFail($id);
        return new RecepDetailResource($recep->loadMissing(['writer:id,username', 'comments:id,receps_id,user_id,comment_recep']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_resep' => 'required|max:255',
            'porsi' => 'required',
            'waktu' => 'required',
            'deskripsi' => 'required',
            'bahan_langkah' => 'required',
            'image' => 'nullable',
        ]);

        $image = null;
        if ($request->file) {
            $fileName = $this->generateRandomString();
            $extension = $request->file->extension();
            $image = $fileName.'.'.$extension;

            Storage::putFileAs('image', $request->file, $image);
        }

        $request['image'] = $image;
        $request['author'] = Auth::user()->id;
        $recep = Recep::create($request->all());
        return new RecepDetailResource($recep->loadMissing('writer:id,username'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul_resep' => 'required|max:255',
            'porsi' => 'required',
            'waktu' => 'required',
            'deskripsi' => 'required',
            'bahan_langkah' => 'required',
            'image' => 'nullable',
        ]);

        $recep = Recep::findOrFail($id);
        $recep->update($request->all());

        return new RecepDetailResource($recep->loadMissing('writer:id,username'));
    }

    public function destroy($id)
    {
        $recep = Recep::findOrFail($id);
        $recep->delete();

        return new RecepDetailResource($recep->loadMissing('writer:id,username'));
    }

    function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
