<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Articel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikArtikel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUser = Auth::user();
        $articel = Articel::findOrFail($request->id);

        if($articel->author != $currentUser->id){
            return response()->json(['message' => 'data not found'], 404);
        }

        // return response()->json($currentUser->id);
        return $next($request);
    }
}
