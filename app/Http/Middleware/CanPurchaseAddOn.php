<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class CanPurchaseAddOn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Gate::denies('upgrade')) {
            return redirect()->route('dashboard.index');
        }

        return $next($request);
    }
}
