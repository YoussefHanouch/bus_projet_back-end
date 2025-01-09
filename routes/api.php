<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrajetBusController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BusArreteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('bus-arrete', BusArreteController::class);
Route::get('/bus-arrete', [BusArreteController::class, 'index'])->name('bus-arrete.store'); // Créer un nouveau bus
Route::get('/allarret', [BusArreteController::class, 'Apiarret']);

Route::get('/buses', [BusController::class, 'indexapi'])->name('bus.index');

Route::get('/trajets', [TrajetBusController::class, 'apiIndex']);


Route::post('/login', [AuthController::class, 'login']);
// Route pour récupérer tous les utilisateurs
Route::get('/test', [UserController::class, 'index']);

// Route pour créer un nouvel utilisateur
Route::post('/test', [UserController::class, 'store']);

// Route pour récupérer un utilisateur par son ID
Route::get('/users/{id}', [UserController::class, 'show']);

// Route pour mettre à jour les informations d'un utilisateur
Route::put('/users/{id}', [UserController::class, 'update']);

// Route pour supprimer un utilisateur
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
