<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;

// Routes pour Catégorie
Route::apiResource('categories', CategoryController::class);

// Routes pour Film
Route::apiResource('movies', MovieController::class);

// Routes pour Salle
Route::apiResource('rooms', RoomController::class);

// Routes pour Séance
Route::apiResource('screenings', ScreeningController::class);

// Routes pour Réservation
Route::apiResource('reservations', ReservationController::class);

// Routes pour Paiement
Route::apiResource('payments', PaymentController::class);