<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if (!\Auth::user()->is_owner==$role) {
            abort(401, 'This action is unauthorized.');
        }
        // if (!\Auth::user()->is_owner==0) {
        //     return redirect()->route('owner-home');
        // }
        
        return $next($request);
    }
}
