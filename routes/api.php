<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OffreEmploiController;
use App\Http\Controllers\CVController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('user', [AuthController::class, 'user']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    Route::get('/offres-emploi', [OffreEmploiController::class, 'index']);
    Route::get('/offres-emploi/{offreEmploi}', [OffreEmploiController::class, 'show']);
    Route::post('/offres-emploi', [OffreEmploiController::class, 'store']);
    Route::put('/offres-emploi/{offreEmploi}', [OffreEmploiController::class, 'update']);
    Route::delete('/offres-emploi/{offreEmploi}', [OffreEmploiController::class, 'destroy']);

    Route::get('/cvs', [CVController::class, 'index']);
    Route::get('/cvs/{cv}', [CVController::class, 'show']);
    Route::post('/cvs', [CVController::class, 'store']);
    Route::put('/cvs/{cv}', [CVController::class, 'update']);
    Route::delete('/cvs/{cv}', [CVController::class, 'destroy']);
});

