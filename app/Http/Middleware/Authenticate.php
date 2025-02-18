<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {  // Use your role checking logic (e.g., Spatie's hasRole)
            return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
        } elseif ($user->hasRole('user')) {
            return redirect()->route('welcome'); // Redirect to welcome page
        } else {
            // Handle cases where the user has no role (optional)
            return redirect('/home'); // Or redirect to a default page
        }
    }
}
