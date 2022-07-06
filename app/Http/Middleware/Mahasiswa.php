<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Mahasiswa
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
        //  Auth Cheks for checks to see if the user exists.
        if (Auth::check() && Auth::user()->role == 'mahasiswa' && $request->input('token') !== 'my-secret-token') {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
        // redirect page 
        // return redirect('/login');
    }
}
