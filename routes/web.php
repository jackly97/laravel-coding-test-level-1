<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExternalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('events', EventController::class);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('signIn', [AuthController::class, 'signIn'])->name('signIn');

Route::get('external-api', [ExternalController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('events', EventController::class, ['except' => ['index', 'show']]);
});

Route::resource('events', EventController::class, ['only' => ['index', 'show']]);
