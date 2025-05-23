<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        
        if (!Auth::check()) {
            return $next($request);
        }
        if (!Auth::user()->is_admin) {
            abort(403, 'Akses hanya untuk admin.');
        }

        return $next($request);
    }
}
