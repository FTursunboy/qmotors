<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CarApiController;
use App\Http\Controllers\Api\CarModelApiController;
use App\Http\Controllers\Api\UserApiController;
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

Route::post('login', [AuthApiController::class, 'login']);
Route::post('send-sms-code', [AuthApiController::class, 'sendSmsCode']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('', [UserApiController::class, 'profile']);
        Route::get('autos', [UserApiController::class, 'autos']);
    });
    Route::group(['prefix' => 'car'], function () {
        Route::get('', [CarApiController::class, 'index']);
        Route::get('{id}', [CarApiController::class, 'show']);
        Route::post('', [CarApiController::class, 'store']);
        Route::put('{id}', [CarApiController::class, 'update'])->middleware('car-owner');
    });
    Route::group(['prefix' => 'car-model'], function () {
        Route::get('list', [CarModelApiController::class, 'list']);
    });
});
