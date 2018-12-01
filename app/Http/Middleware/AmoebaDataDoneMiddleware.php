<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AmoebaDataDoneMiddleware
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
        $user = Auth::user()->amoeba()->first();
        $column_must_be_filled = ['nik', 'position', 'c_level', 'picture', 'work_place'];
        
        foreach($column_must_be_filled as $column){
            // dd($user['id']);
            if(!isset($user[$column])){
                return redirect('/profile');
            }
        }

        return $next($request);
    }
}
