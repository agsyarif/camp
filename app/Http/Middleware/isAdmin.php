<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::user()->user_roles->name == 'Admin') {
        //     return $next($request);
        // } else {
        //     return redirect('/');
        // }
        if (!auth()->check() || auth()->user()->user_roles->name == 'Admin') {
            return $next($request);
        } else {
            return redirect('/');
        }
        // if (!auth()->check() || auth()->user()->user_role_id !== 1) {
        //     abort(403);
        // }

        // return $next($request);
    }
}
