<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('Unauthorized', 'You need to login first');
        }

        $user = Auth::user();

        // Adjust this based on your DB structure
        if ($user->role !== $role) {
            return abort(403, 'Access Denied!');
        }

        return $next($request);
    }
}
