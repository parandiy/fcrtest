<?php

namespace app\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class HealthCheckService
{
    public function check(): array
    {
        $db = $this->checkDatabase();
        $cache = $this->checkRedis();

        return [
            'db' => $db,
            'cache' => $cache,
        ];
    }

    private function checkDatabase(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    private function checkRedis(): bool
    {
        try {
            Redis::ping();
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
