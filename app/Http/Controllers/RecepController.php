<?php

namespace App\Http\Controllers;

use App\Models\Recep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RecepResource;
use App\Http\Resources\RecepDetailResource;

class RecepController extends Controller
{
    public function index()
    {
        $receps = Recep::all();
        // return response()->json(['data' => $receps]);
        return RecepDetailResource::collection($receps->loadMissing('writer:id,username'));
    }

    public function show($id)
    {
        $recep = Recep::with('writer:id,username')->findOrFail($id);
        return new RecepDetailResource($recep);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_resep' => 'required|max:255',
            'porsi' => 'required',
            'waktu' => 'required',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
            'image' => 'nullable',
        ]);

        $request['author'] = Auth::user()->id;
        $recep = Recep::create($request->all());
        return new RecepDetailResource($recep->loadMissing('writer:id,username'));
    }
}
