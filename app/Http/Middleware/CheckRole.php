<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        if (Auth::check()){
            if (Auth::user()->role == 'GUEST'){
                dd(122123132132132);
                return redirect()->route('client.home');
            }
            return $next($request);

        }else{

            return redirect()->route('admin.login');
        }
    }
}
