<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectToByGuard($request, $guards)
        );
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectToByGuard(Request $request, array $guards): ?string
    {
        if($request->expectsJson()) {
            return null;
        }

        return !empty($guards) && $guards[0] === 'admin' ? route('admin.login') : route('login');
    }
}
