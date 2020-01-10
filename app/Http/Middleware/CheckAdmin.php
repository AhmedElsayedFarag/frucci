<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        $user = \App\User::find(\Auth::id());
        if ($user->hasRole('admin')) {
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }
}
