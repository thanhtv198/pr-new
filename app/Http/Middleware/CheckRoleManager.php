<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role_id == 2) {
            return $next($request);
        } else {
            return redirect()->back()->with('message', trans('common.with.permission'));
        }

        return $next($request);
    }
}
