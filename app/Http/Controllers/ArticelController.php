<?php

namespace App\Http\Controllers;

use App\Models\Articel;
use Illuminate\Http\Request;
use App\Http\Resources\ArticelResource;

class ArticelController extends Controller
{
    public function index()
    {
        $articels = Articel::all();
        // return response()->json(['data' => $articels]);
        return ArticelResource::collection($articels);
    }
}
