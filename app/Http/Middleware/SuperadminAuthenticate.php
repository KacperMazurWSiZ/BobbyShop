<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperadminAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->admin_superadmin) {
            abort('404');
        }
        return $next($request);
    }
}
