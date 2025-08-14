<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\GachaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GachaCardController;
use App\Http\Controllers\Api\InventoryController;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Public endpoints
Route::get('/cards', [CardController::class, 'index']);
Route::get('/gachas', [GachaController::class, 'index']);
Route::get('/gachas/{id}', [GachaController::class, 'show']);
Route::get('/gacha-cards',[GachaCardController::class,'index']);
Route::get('/gacha-cards/{id}', [GachaCardController::class,'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    Route::get('/inventory', [InventoryController::class, 'index']);

    Route::middleware('role:admin')->group(function () {
        Route::apiResource('cards', CardController::class)->except(['index','show']);
        Route::apiResource('gachas', GachaController::class)->except(['index','show']);
        Route::apiResource('gacha-cards', GachaCardController::class)->except(['index','show']);
        Route::apiResource('users', UserController::class);
    });
});