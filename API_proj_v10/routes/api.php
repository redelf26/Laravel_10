<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items', [App\Http\Controllers\ItemController::class, 'show']);
Route::get('/items/{id}', [App\Http\Controllers\ItemController::class, 'show_id']);
Route::post('/items', [App\Http\Controllers\ItemController::class, 'store']);
Route::put('/items/{id}', [App\Http\Controllers\ItemController::class, 'update']);
Route::delete('/items/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);