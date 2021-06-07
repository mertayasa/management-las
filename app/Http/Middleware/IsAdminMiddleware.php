<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    public function handle(Request $request, Closure $next){
        if(Auth::user()->level == 0){
            return $next($request);
        }

        if($request->routeIs('dashboard.admin') && Auth::user()->level == 1){
            return redirect()->route('dashboard.owner');
        }

        abort(403);
    }
}
