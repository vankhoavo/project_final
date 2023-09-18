<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
{
    public function handle(Request $request, Closure $next, $admin = null)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        } else {
            return redirect('/adminlte/brand/index');
        }
    }
}
