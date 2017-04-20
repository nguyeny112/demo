<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class userMiddleware
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
        $isGuest = Session::has('Guest');
        // dd($isGuest);
        if($request->user() OR $isGuest){
        return $next($request);
    }else{
        return redirect()->guest(route('global.auth.login'));
    }
    }
}
