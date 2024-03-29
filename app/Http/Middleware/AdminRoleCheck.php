<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            $user = auth()->user();

            // Check the user's role
            if ($user->role_id === User::ADMIN) {
                return $next($request); // Allow access for admin
            }
        }

        // If the user is not authenticated or is not an admin, deny access
        return back();
    }
}
