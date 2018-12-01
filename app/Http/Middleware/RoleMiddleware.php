<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        array_push($roles, 'Super Admin');
        if(count($roles) > 0 ){
            if(!Auth::user()->authorizeRoles($roles)){
                return response('Not valid token provider.', 401);
            }
        }
        return $next($request);
    }
}
