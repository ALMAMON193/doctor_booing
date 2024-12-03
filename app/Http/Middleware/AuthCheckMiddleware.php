<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheckMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'doctor':
                    return redirect()->route('doctor.dashboard');
                case 'client':
                    return redirect()->route('client.dashboard');
            }
        }
        return $next($request);
    }
}

