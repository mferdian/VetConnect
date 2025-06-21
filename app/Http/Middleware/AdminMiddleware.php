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
        // Check if user is authenticated
        if (!Auth::check()) {
            // Untuk Filament, redirect ke halaman login Filament
            if ($request->is('admin*')) {
                return redirect()->route('filament.admin.auth.login');
            }
            return redirect()->route('login');
        }

        // Check if user is admin
        if (!Auth::user()->is_admin) {
            // For API requests, return JSON response
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthorized. Admin access required.'
                ], 403);
            }

            // For Filament admin routes
            if ($request->is('admin*')) {
                abort(403, 'Access denied. Admin privileges required.');
            }

            // For other web requests
            abort(403, 'Unauthorized. Admin access required.');
        }

        return $next($request);
    }
}
