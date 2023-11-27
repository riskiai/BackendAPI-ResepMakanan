<?php

namespace App\Http\Controllers;

use App\Models\Articel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ArticelResource;
use App\Http\Resources\ArticelDetailResource;

class ArticelController extends Controller
{
    public function index()
    {
        $articels = Articel::all();
        // return response()->json(['data' => $articels]);
        return ArticelDetailResource::collection($articels->loadMissing('writer:id,username'));
    }

    public function show($id) {
        $articels = Articel::with('writer:id,username')->findOrFail($id);
        return new ArticelDetailResource($articels);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',    
        ]);

        $request['author'] = Auth::user()->id;
        $articels = Articel::create($request->all());
        return new ArticelDetailResource($articels->loadMissing('writer:id,username'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',    
        ]);

        $articel = Articel::findOrFail($id);
        $articel->update($request->all());

        return new ArticelDetailResource($articel->loadMissing('writer:id,username'));
    }

    public function destroy($id)
    {
        $articel = Articel::findOrFail($id);
        $articel->delete();

        return new ArticelDetailResource($articel->loadMissing('writer:id,username'));
    }
}
