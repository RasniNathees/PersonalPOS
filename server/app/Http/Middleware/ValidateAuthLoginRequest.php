<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateAuthLoginRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'grant_type' => 'required|in:password',
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
            'username' => 'required|email',
            'password' => 'required|string',
            'scope' => 'sometimes|string',
        ]);
        return $next($request);
    }
}
