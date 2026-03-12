<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\HealthCheckService;
use Illuminate\Http\JsonResponse;

class HealthController extends Controller
{
    public function __invoke(HealthCheckService $healthCheck): JsonResponse
    {
        $result = $healthCheck->check();

        $status = in_array(false, $result, true) ? 500 : 200;

        return response()->json($result, $status);
    }
}
