<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IpLogged
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
//        dd($request->ip());
        if(session()->has('user'))
        {
            Log::info('Http request from: ' . $request->ip() .
                "\t" . $request->route()->getName() . "\t" . session()->get('user')->email .
                "\t" . session()->get('user')->role_name);
        }
        else {
            Log::info('Http request from: ' . $request->ip() . "\t" . $request->route()->getName() . "\t" . "guest");
        }
        return $next($request);
    }
}
