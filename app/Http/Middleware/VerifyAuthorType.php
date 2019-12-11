<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAuthorType
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

/*	   	if($request->session()->get('user') == 'admin'){
            return $next($request);
	   	}else{
	   		return redirect()->route('home.index');
	   	}*/

        /*if($request->session()->get('user')->type == 'admin'){
            return $next($request);
        }else{
            return redirect()->route('home.index');
        }*/

        $user = $request->session()->get('user');
        if( $user->type == 'author'){
            return $next($request);
        }
        // else{
        //     return redirect()->route('admin.index');
        // }
    }
}
