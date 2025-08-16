<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;

// Rutas públicas (sin autenticación)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas (requieren autenticación)
Route::middleware('auth:sanctum')->group(function () {
    // Rutas de autenticación para usuarios autenticados
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    
    // Rutas de recursos protegidas
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('appointments', AppointmentController::class);
    
    // Ruta original del usuario (opcional, ya tenemos /me)
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
