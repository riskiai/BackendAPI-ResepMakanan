<?php

namespace App\Http\Controllers;

use App\Models\Articel;
use Illuminate\Http\Request;
use App\Http\Resources\ArticelResource;
use App\Http\Resources\ArticelDetailResource;

class ArticelController extends Controller
{
    public function index()
    {
        $articels = Articel::all();
        // return response()->json(['data' => $articels]);
        return ArticelResource::collection($articels);
    }

    public function show($id) {
        $articels = Articel::with('writer:id,username')->findOrFail($id);
        return new ArticelDetailResource($articels);
    }

    
}
