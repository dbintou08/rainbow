<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;

// Routes pour Catégorie
Route::get('categories', [CategoryController::class, 'index']);
// Routes pour Film
Route::get('movies', [MovieController::class, 'index']);
Route::get('movies/{id}', [MovieController::class, 'show']);
