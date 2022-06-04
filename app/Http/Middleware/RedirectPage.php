<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectPage
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
        if (
            (
                $request->route()->uri == 'login' || 
                $request->route()->uri == 'register'
            ) &&
            $request->session()->has('user')
        ) {
            return redirect()->to('/menu');
        }
        
        return $next($request);
    }
}
