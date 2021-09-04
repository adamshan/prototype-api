<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
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
Route::group(['prefix' => 'auth'], function () {

    Route::post('token', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('user',[AuthController::class, 'user']);
        Route::delete('token', [AuthController::class, 'logout']);
    });
});

Route::group(['prefix' => 'users'], function(){
    Route::get('/role/{code}',[UserController::class,'index']);
    Route::post('/',[UserController::class,'store']);
    Route::get('/{id}',[UserController::class,'show']);
    Route::delete('/{id}',[UserController::class,'destroy']);
});

Route::group(['prefix' => 'services'], function(){
    Route::get('/',[ServiceController::class,'index']);
    Route::post('/',[ServiceController::class,'store']);
    Route::get('/{id}',[ServiceController::class,'show']);
    Route::delete('/{id}',[ServiceController::class,'destroy']);
});
