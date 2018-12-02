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
        if(Auth::user()->role_id !== 4){
            return $next($request);
        }
        if(!Auth::user()->amoeba()->first()){
            return redirect('verification-group');
        }
        $group = Auth::user()->group()->first();
        
        if($group == null){
            return redirect('verification-group');
        }else if($group->group_status_id == 1){
            return redirect('verification-profile');
        }
        $user = Auth::user()->amoeba()->first();
        $column_must_be_filled = ['NIK', 'c_level', 'picture', 'work_place'];
        
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
