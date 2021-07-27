<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request ,Closure $next)
    {
        $user = $request->user();

        if($user->type != 'admin'){

             abort(403,'you are not Admin');
        }
        return $next($request);
    }
}
