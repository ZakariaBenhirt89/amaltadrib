<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\AuthHelper;

class studentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(AuthHelper::getGuard() !== 'student' || AuthHelper::loggedUser() == null){
            // TODO remplace with named routes
            // return redirect('login');
            return redirect()->route('public.login');
        }
        return $next($request);
    }
}
