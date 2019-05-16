<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CustomAuthentication
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
        if (!($request->session()->get('user_id'))) {
            return redirect('/');
        }
        return $next($request);
    }
}
