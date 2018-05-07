<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthorize
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
        if (\Auth::guard('admin')->check() && \Auth::guard('admin')->user()->isAdmin()){
            return $next($request);
        }

        return redirect('/admin/index');
    }
}
