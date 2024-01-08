<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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

Route::post('/login', [AuthController::class, 'loginuser']);
Route::post('/register', [AuthController::class, 'registeruser']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//membuat API
Route::apiResource('/posts', App\Http\Controllers\API\PostController::class)->middleware('auth:sanctum');

