<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CityController;

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
Route::get('/articles',[ArticleController::class, 'index']);
Route::get('/article/{id}',[ArticleController::class, 'show']);
Route::post('/article',[ArticleController::class, 'store']);
Route::put('/article',[ArticleController::class, 'store']);
Route::delete('/article/{id}',[ArticleController::class, 'destroy']);

Route::get('/cities',[CityController::class, 'index']);
Route::get('/city/{id}',[CityController::class, 'show']);
Route::post('/city',[CityController::class, 'store']);
Route::put('/city',[CityController::class, 'store']);
Route::delete('/city/{id}',[CityController::class, 'destroy']);