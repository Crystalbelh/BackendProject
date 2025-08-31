<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

// class AdminMiddleware
// {
//     /**
//      * Handle an incoming request.
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         // Check if user is authenticated
//         if (!Auth::check()) {
//             return redirect()->route('login')->with('error', 'Please log in to access the admin area.');
//         }

//         // Check if user can access admin using the gate
//         if (!Gate::allows('access-admin')) {
//             return redirect()->route('home')->with('error', 'You do not have permission to access the admin area.');
//         }

//         return $next($request);
//     }
// }

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperAdmin'))) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Access denied.');
    }
}