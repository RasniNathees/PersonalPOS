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
        Log::debug('safdf');
        $token = $request->cookie('access_token');

        // Get the Authorization header from the request (in case it's manually set)
        $authorizationHeader = $request->header('Authorization');

        // If the cookie exists and the Authorization header is missing or invalid
        if ($token && (!$authorizationHeader || !str_contains($authorizationHeader, 'Bearer '))) {
            // Log for debugging
            Log::info('Authorization header is missing or empty. Setting token from cookie.');
            
            // Add the token as a Bearer token in the Authorization header
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }

        
        Log::debug($request->headers->all());
        return $next($request);
    }
}
