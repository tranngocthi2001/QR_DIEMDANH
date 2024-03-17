<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // App\Http\Middleware\CheckRole.php

    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) return redirect('login');

        $user = Auth::user();
        if(in_array($user->role, $roles)) {
            return $next($request);
        }

        return redirect('home');
        if (! $request->user() || ! in_array($request->user()->role, $roles)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
    

}
