<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\HealthRequest;

class LogHealthRequest
{
    public function handle(Request $request, Closure $next)
    {
        HealthRequest::create([
            'owner_uuid' => $request->header('X-Owner'),
            'ip' => $request->ip(),
        ]);

        return $next($request);
    }
}
