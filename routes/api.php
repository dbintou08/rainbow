<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;

// Routes pour Catégorie
Route::get('categories', [CategoryController::class, 'index']);
// Routes pour Film
Route::get('movies', [MovieController::class, 'index']);
Route::get('movies/{id}', [MovieController::class, 'show']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('/reservations', [ReservationController::class, 'store']);
Route::put('/payments/{payment}', [PaymentController::class, 'update']);

Route::middleware('auth:api')->group(function ()
{
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'user']);
    Route::get('/user/reservations', [UserController::class, 'getUserReservations']);
});
