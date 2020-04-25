<?php

namespace App\Http\Middleware;

use Closure;

class TerminateMiddleware
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
        echo "this begin now note this bed grammer";
        return $next($request);
    }

    public function terminate($request, $response)
    {
        echo "<br>terminated you?ehy";
    }
}
