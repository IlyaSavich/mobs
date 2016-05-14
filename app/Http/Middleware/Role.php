<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepository;
use Closure;

class Role
{
    /**
     * Handle an incoming request.
     * Check if user is admin than access granted
     * Else redirect to page with 401 error with message
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return UserRepository::isAdmin() ? $next($request) : response([
            'error' => [
                'code' => 'INSUFFICIENT_ROLE',
                'description' => 'You are not authorized to access this resource.',
            ],
        ], 401);
    }
}
