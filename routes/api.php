<?php

use App\Http\Controllers\v1\api\EventController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1/events')->group(function () {
    Route::get('/', [EventController::class, 'index']);
    Route::get('/active-events', [EventController::class, 'activeEvents']);
    Route::post('/', [EventController::class, 'store']);
    Route::get('/{id}', [EventController::class, 'show']);
    Route::put('/{id}', [EventController::class, 'update']);
    Route::patch('/{id}', [EventController::class, 'patch']);
    Route::delete('/{id}', [EventController::class, 'destroy']);
});
