<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleAndStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$role){
        $user = $request->user();
        if ($user && in_array($user->role, $role) && $user->status === 'Active') {
            return $next($request);
        }
        return abort(403, 'Opss, Anda tidak memiliki akses');
    }
}
