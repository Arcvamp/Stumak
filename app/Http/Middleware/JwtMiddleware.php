<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = Session::get('jwt_token');

        if (!$token) {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        try {
            // Decode the token using JWT and verify the signature with your secret key
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

            // Optional: Set the authenticated user ID in the request for further usage
            $request->attributes->set('user', $decoded->sub);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Token is invalid or expired'], 401);
        }

        // Proceed to the next request (the protected route)
        return $next($request);
    }
}
