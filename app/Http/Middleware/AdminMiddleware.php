<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Gunakan guard default, bukan guard admin
        if (!Auth::check()) {
            return redirect()->route('filament.admin.auth.login');
        }

        $user = Auth::user();

        if (!$user->is_admin) {
            abort(403, 'Access denied. Admin privileges required.');
        }

        return $next($request);
    }
}
