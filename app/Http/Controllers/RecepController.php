<?php

namespace App\Http\Controllers;

use App\Models\Recep;
use Illuminate\Http\Request;
use App\Http\Resources\RecepResource;
use App\Http\Resources\RecepDetailResource;

class RecepController extends Controller
{
    public function index()
    {
        $receps = Recep::all();
        // return response()->json(['data' => $receps]);
        return RecepResource::collection($receps);
    }

    public function show($id)
    {
        $recep = Recep::with('writer')->findOrFail($id);
        return new RecepDetailResource($recep);
    }
}
