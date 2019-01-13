<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminAmoebaDataDoneMiddleware
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
        if(Auth::user()->role_id !== 2){
            return $next($request);
        }
        // if(!Auth::user()->jury()->first()){
        //     return redirect('verification-group');
        // }
        $user = Auth::user()->admin_amoeba;
        $column_must_be_filled = ['division_id'];
        
        
        // dd(isset($user['division_id']));  
        foreach($column_must_be_filled as $column){
            // dd($user['id']);
            if(!isset($user[$column])){
                // dd($user);
                return redirect('/profile');
            }
        }

        
        return $next($request);
    }
}
