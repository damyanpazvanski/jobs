<?php

namespace App\Http\Middleware;

use App\Candidate;
use Closure;

class Subscribed
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
        if (auth()->user() instanceof Candidate) {
            return $next($request);
        }

        if (!$request->user()->onTrial() && !$request->user()->subscribed('small') &&
            !$request->user()->subscribed('pro') && !$request->user()->subscribed('enterprise')) {
            return redirect('/pricing');
        }

        return $next($request);
    }
}
