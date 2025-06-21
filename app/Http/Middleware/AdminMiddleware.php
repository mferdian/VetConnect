<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Gunakan guard 'web' karena authGuard di Filament juga pakai 'web'
        if (!Auth::guard('web')->check()) {
            return redirect()->route('filament.admin.auth.login');
        }

        $user = Auth::guard('web')->user();

        if (!$user->is_admin) {
            abort(403, 'Access denied. Admin privileges required.');
        }

        return $next($request);
    }
}
