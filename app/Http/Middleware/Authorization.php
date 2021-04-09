<?php

namespace App\Http\Middleware;

use App\Permissions\ProductPermissions;
use Closure;
use Illuminate\Http\Request;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permissions = null)
    {
        $permissions = $permissions ? explode(',', $permissions) : [];

        $authUser = auth()->user();

        if(!$authUser->hasAtLeastPermissions($permissions)) {
            return abort(403);
        }

        return $next($request);
    }
}
