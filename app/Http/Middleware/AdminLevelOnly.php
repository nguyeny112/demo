<?php

namespace App\Http\Middleware;

use Closure;

class AdminLevelOnly
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
        if($request->user()->level!=1){
            $request->session()->flash('errormsg','You dont have permission to access this page');
            return redirect()->route('admin.index.index');
        }
        return $next($request);
    }
}
