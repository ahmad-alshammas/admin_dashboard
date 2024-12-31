<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */

    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user();
        
        // Check if the user is authenticated and has the required role
        if (!$user || $user->role !== $role) {
            // Redirect or abort
            return redirect('/unauthorized')->with('error', 'Access denied!');
        }

        return $next($request);
    }
}
