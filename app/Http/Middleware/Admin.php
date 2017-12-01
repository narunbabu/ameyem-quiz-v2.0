<?php

namespace AmeyemQuiz\Http\Middleware;

use Closure;
use AmeyemQuiz\User;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->back();
        }

        return $next($request);
    }
}
