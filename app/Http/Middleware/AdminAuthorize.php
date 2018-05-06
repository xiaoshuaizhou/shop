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
        $user = \Auth::guard('admin')->user();
        if ($request->user() && $user->isAdmin()){
            return $next($request);
        }

        return redirect('/admin/index');
    }
}
