<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('4000')) {
            // return redirect('https://paninastudio.com/wp-content/uploads/2024/05/maintence.gif');
            return redirect('http://122.53.61.91:4001');
        }

        return $next($request);
    }
}
