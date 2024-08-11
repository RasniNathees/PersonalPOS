<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleToken
{
    /**
     * Handle an incoming request.
     * Need to enable secure cookie when deploy this on production
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $content = $response->getContent();
        $json = json_decode($content, true);
        $access_token = $json['access_token'] ?? null;
        $refresh_token = $json['refresh_token'] ?? null;
        $expires_in = $json['expires_in'] ?? 3600;

        if ($access_token) {
            $cookie_access = cookie('access_token', $access_token, $expires_in / 60, httpOnly: true, sameSite: 'Lax');
            $cookie_refresh = cookie('refresh_token', $refresh_token, 60 * 24 * 30, httpOnly: true, sameSite: 'Lax');
            $response = response($response->getContent())->withCookie($cookie_refresh)->withCookie($cookie_access);
          
        }

        return response()->json(['success'=>'Login sucesse']);
    }
}
