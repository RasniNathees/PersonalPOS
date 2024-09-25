<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TokenFromCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $token = $request->cookie('access_token');

        // Get the Authorization header from the request (in case it's manually set)
        $authorizationHeader = $request->header('Authorization');

        // If the cookie exists and the Authorization header is missing or invalid
        if ($token && (!$authorizationHeader || !str_contains($authorizationHeader, 'Bearer '))) {
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }

        
        return $next($request);
    }
}
