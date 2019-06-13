<?php

namespace App\Http\Middleware;

use App\Candidate;
use Carbon\Carbon;
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

        if ($request->user()->onTrial() || optional(optional($request->user()->getSubscription())->ends_at)->isFuture()) {
            return $next($request);
        }

        return redirect(route('subscriptions.index'));
    }
}
