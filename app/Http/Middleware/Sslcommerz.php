<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

use Illuminate\Support\Facades\Auth;

class Sslcommerz
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
        $request->merge(['_token'=>$request->value_a]);
        if(!Auth::check()){
            $user = User::findOrFail($request->value_b);
            Auth::loginUsingId($user->id);
        }
        return $next($request);
    }
}
