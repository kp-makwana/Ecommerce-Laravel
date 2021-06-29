<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $result = Auth::check();
        if ($result) {
            if ("admin" === Auth::user()->role) {
                return redirect()->route('admin.index');
            }
            return redirect()->route('user.dashboard.index');
        }
        return $next($request);
    }
}
