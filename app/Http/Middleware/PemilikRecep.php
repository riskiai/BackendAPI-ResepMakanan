<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Recep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikRecep
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
        $recep = Recep::findOrFail($request->id);

        if($recep->author != $currentUser->id){
            return response()->json(['message' => 'Data Not Found'], 404);
        }

        return $next($request);
    }
}
