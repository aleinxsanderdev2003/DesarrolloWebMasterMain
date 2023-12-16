<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  // app/Http/Middleware/AdminMiddleware.php

public function handle($request, Closure $next)
{
    if (!auth()->guard('admin')->check()) {
        return redirect()->route('admin.login');
    }

    return $next($request);
}

}