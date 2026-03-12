<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOwnerHeader
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->header('X-Owner')) {
            return response()->json([
                'error' => 'X-Owner header is required'
            ], 400);
        }

        return $next($request);
    }
}
