<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if ($request->user()->email != 'younus@truckjee.com')
        {
            return view('layouts.404')->with(['error'=>'You are not authorized to perform this action']);
        }
        return $next($request);
    }
}
