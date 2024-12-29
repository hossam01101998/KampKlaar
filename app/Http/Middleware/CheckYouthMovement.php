<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckYouthMovement
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = auth()->user();

        if ($request->route('item') && $request->route('item')->youth_movement !== $user->youth_movement) {
            return redirect()->back()->withErrors('You are not authorized to access this resource.');
        }

        
        return $next($request);
    }
}
