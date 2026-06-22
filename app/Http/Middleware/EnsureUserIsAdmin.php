<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Reject any authenticated user who is not an admin.
     *
     * ponytail: security — defense-in-depth gate for /dashboard/* routes.
     * Today registration is disabled, but this ensures that any future
     * non-admin account (staff, customer) cannot reach admin endpoints.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user === null || ! $user->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}
