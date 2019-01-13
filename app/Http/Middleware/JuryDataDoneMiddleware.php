<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class JuryDataDoneMiddleware
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
        // dd(Auth::user()->role_id);  
        if(Auth::user()->role_id !== 3){
            return $next($request);
        }
        // if(!Auth::user()->jury()->first()){
        //     return redirect('verification-group');
        // }
        $user = Auth::user()->jury()->first();
        $column_must_be_filled = ['NIK', 'loker'];
        
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
