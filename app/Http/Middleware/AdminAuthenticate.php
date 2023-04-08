<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    public function handle($request, Closure $next)
    {
        $token = base64_encode(json_encode(['url' => request()->url()]));
        if (!Auth::check()) {
            Auth::logout();
            return redirect()->route('admin.login', ['token' => $token]);
        }
        return $next($request);
    }
}
