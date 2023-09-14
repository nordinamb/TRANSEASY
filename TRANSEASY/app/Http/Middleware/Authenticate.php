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

    //redirect to login if not autYYYY
//     public function handle($request, Closure $next, ...$guards)
// {
//     if (!Auth::check()) {
//         return redirect()->route('login');
//     }

//     return $next($request);
// }
}
