<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if ($role == 'doctor' && Auth::user()->role_id != '2') {
            abort(code:403);
            // return response()->json(['message' => 'Akses Anda bukan Sebagai Doctor']);
        }

        if ($role == 'pasien' && Auth::user()->role_id != '3') {
            abort(code:403);
        }

        return $next($request);

    }
}
