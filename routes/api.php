<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('note')->group(function() {
    Route::get('/', [App\Http\Controllers\NoteController::class, 'index']);
    Route::get('/{id}/show', [App\Http\Controllers\NoteController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\NoteController::class, 'store']);
    Route::patch('/{id}/update', [App\Http\Controllers\NoteController::class, 'update']);
});
