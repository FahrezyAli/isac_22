<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class isAdmin
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
        $validator = Validator::make($request->all(), [
            'namaTim'=> 'required|string',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // flash('error')->error();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('namaTim', 'password');
        $nama=$request->nama;
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(Auth::user()->admin == true){
                $request->session()->regenerate();
                $id = Auth::user()->id;
                return redirect() ->route('dashboard.admin');
            }
            else{
                Auth::logout();
                Session::flash('error','Login gagal!');
                return redirect()->back()->withInput();
            }
            
        }else{
            Session::flash('error','Login gagal!');
            return redirect()->back()->withInput();
        }

       return back()->with('error','Anda bukan admin');
    }
}
