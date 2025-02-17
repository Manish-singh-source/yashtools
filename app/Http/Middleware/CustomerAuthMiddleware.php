<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
        if (Auth::check() && Auth::user()->role == $role) {
            if (Auth::user()->status == 'banned') {
                flash()->error('Your Account is Banned From Website Administrator.');
                return redirect()->route('signin');
            }

            if (Auth::user()->status == 'inactive') {
                flash()->error('Your Account is Not Active Please Re-Create Account.');
                return redirect()->route('signup');
            }
            return $next($request);
        }

        return redirect()->route('signin');
    }
}
