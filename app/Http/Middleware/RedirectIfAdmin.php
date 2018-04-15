<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'admin')
	{
	    if (Auth::guard($guard)->check()) {
	        if($_SERVER['REQUEST_URI'] == '/admin/register') {
                return redirect('admin/login');
            }
            return redirect('admin/index');
	    }

	    return $next($request);
	}
}