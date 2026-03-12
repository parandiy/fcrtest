<?php

use App\Http\Controllers\Api\HealthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('/health', HealthController::class)
        ->middleware([
            'throttle:60,1',
            'owner',
            'log.health'
        ]);

});
