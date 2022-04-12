<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuApiController;

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

Route::post('/menu', [MenuApiController::class, 'store']);

Route::get('/menu', [MenuApiController::class, 'index']);

Route::put('/menu/{id}', [MenuApiController::class, 'update']);

Route::delete('/menu/{id}', [MenuApiController::class, 'destroy']);