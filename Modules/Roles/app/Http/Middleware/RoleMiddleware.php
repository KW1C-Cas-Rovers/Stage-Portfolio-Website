<?php

namespace Modules\Roles\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Users\App\Exceptions\UnauthorizedException;
use Modules\Users\app\Models\User;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @throws UnauthorizedException
     */
    public function handle(Request $request, Closure $next, $role, $guard = null)
    {
        $authGuard = Auth::guard($guard);
        $user = $authGuard->user();

        if (!$user) {
            Session::flash('error', 'You are not logged in.');
            throw UnauthorizedException::notLoggedIn();
        }

        if (!$user instanceof User) {
            Session::flash('error', 'Invalid user type.');
            throw UnauthorizedException::invalidUserType();
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (!$user->hasAnyRole($roles)) {
            Session::flash('error', 'You are not authorized to perform this action.');
            throw UnauthorizedException::forRole($roles);
        }

        return $next($request);
    }

    /**
     * Specify the role and guard for the middleware.
     *
     * @param string $role
     * @param string|null $guard
     * @return string
     */
    public static function using(string $role, string $guard = null): string
    {
        $args = is_null($guard) ? $role: "$role,$guard";

        return static::class . ':' . $args;
    }
}
