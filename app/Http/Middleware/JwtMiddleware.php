<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {

            if($e instanceof TokenInvalidException){
                return response()->json(["status"=>"Invalid Token"]);
            }

            if ($e instanceof TokenExpiredException) {
                return response()->json(["status"=>"Experid Token"]);
            }
            return response()->json(["status"=>"Token not fount"]);
        }
        return $next($request);
    }
}
