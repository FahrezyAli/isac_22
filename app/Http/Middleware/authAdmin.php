<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(! Auth::check()){
            return redirect()->route('loginAdmin');
        } else{
            if(Auth::user()->admin == true){
                return $next($request);
            } else{
                return redirect()->route('dashboard',Auth::user()->namaTim)->with('error', 'anda bukan admin');
            }
        }
        
    }
}
