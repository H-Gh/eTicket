<?php

namespace App\Http\Middleware;

use App\Facades\PermissionManager;
use Closure;

class CheckAdminPrivilage
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request The current request
     * @param \Closure                 $next    Continue!
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!PermissionManager::hasAnyAdminPermissions()) {
            return redirect()->route("home");
        }
        return $next($request);
    }
}
