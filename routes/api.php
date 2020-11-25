<?php

use App\Http\Controllers\RequestController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('students', [RequestController::class, 'store']);
Route::get('students', [RequestController::class, 'index']);
Route::get('students/{id}', [RequestController::class, 'show']);
Route::delete('students/{id}', [RequestController::class, 'destroy']);
Route::put('students/{id}', [RequestController::class, 'update']);
