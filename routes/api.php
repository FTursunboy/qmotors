<?php

use App\Http\Controllers\Api\ArticleApiController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BonusApiController;
use App\Http\Controllers\Api\CarApiController;
use App\Http\Controllers\Api\CarMarkApiController;
use App\Http\Controllers\Api\CarModelApiController;
use App\Http\Controllers\Api\FreeDiagnosticApiController;
use App\Http\Controllers\Api\HelpApiController;
use App\Http\Controllers\Api\NotificationApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\OrderTypeApiController;
use App\Http\Controllers\Api\ReminderApiController;
use App\Http\Controllers\Api\ReviewApiController;
use App\Http\Controllers\Api\StockApiController;
use App\Http\Controllers\Api\TechCenterApiController;
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

Route::group(['prefix' => 'tech-center'], function () {
    Route::get('list', [TechCenterApiController::class, 'list']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('', [UserApiController::class, 'profile']);
        Route::get('autos', [UserApiController::class, 'autos']);
        Route::post('update', [UserApiController::class, 'update']);
    });
    Route::group(['prefix' => 'car'], function () {
        Route::get('', [CarApiController::class, 'index']);
        Route::get('{id}', [CarApiController::class, 'show']);
        Route::delete('{id}', [CarApiController::class, 'delete']);
        Route::post('', [CarApiController::class, 'store']);
        Route::put('{id}', [CarApiController::class, 'update'])->middleware('car-owner');
        Route::post('{id}/photo', [CarApiController::class, 'photo'])->middleware('car-owner');
        Route::delete('photo/{id}', [CarApiController::class, 'photoDelete']);
    });
    Route::group(['prefix' => 'car-model'], function () {
        Route::get('list', [CarModelApiController::class, 'list']);
    });
    Route::group(['prefix' => 'car-mark'], function () {
        Route::get('list', [CarMarkApiController::class, 'list']);
    });
    Route::group(['prefix' => 'order'], function () {
        Route::post('', [OrderApiController::class, 'store']);
        Route::get('history', [OrderApiController::class, 'history']);
        Route::get('{id}', [OrderApiController::class, 'show']);
        Route::post('{id}/photo', [OrderApiController::class, 'photo'])->middleware('order-owner');
    });
    Route::group(['prefix' => 'order-type'], function () {
        Route::get('list', [OrderTypeApiController::class, 'list']);
    });
    Route::group(['prefix' => 'reminder'], function () {
        Route::get('', [ReminderApiController::class, 'index']);
        Route::post('', [ReminderApiController::class, 'store']);
        Route::get('{id}', [ReminderApiController::class, 'show']);
        Route::put('{id}', [ReminderApiController::class, 'update']);
        Route::delete('{id}', [ReminderApiController::class, 'destroy'])->middleware('reminder-owner');
    });
    Route::group(['prefix' => 'bonus'], function () {
        Route::get('', [BonusApiController::class, 'index']);
        Route::get('{id}', [BonusApiController::class, 'show']);
        Route::post('', [BonusApiController::class, 'store']);
        Route::put('{id}', [BonusApiController::class, 'update']);
        Route::delete('{id}', [BonusApiController::class, 'delete']);
    });
    Route::group(['prefix' => 'review'], function () {
        // Route::get('', [ReviewApiController::class, 'index']);
        Route::post('', [ReviewApiController::class, 'store']);
        Route::get('{id}', [ReviewApiController::class, 'show']);
        // Route::put('{id}', [ReviewApiController::class, 'update']);
        // Route::delete('{id}', [ReviewApiController::class, 'delete']);
    });
    Route::group(['prefix' => 'stock'], function () {
        Route::get('', [StockApiController::class, 'index']);
        Route::get('{id}', [StockApiController::class, 'show']);
    });
    Route::group(['prefix' => 'article'], function () {
        Route::get('', [ArticleApiController::class, 'index']);
        Route::get('{id}', [ArticleApiController::class, 'show']);
    });
    Route::group(['prefix' => 'notification'], function () {
        Route::get('', [NotificationApiController::class, 'index']);
        Route::get('{id}', [NotificationApiController::class, 'show']);
    });
    Route::get('help', [HelpApiController::class, 'index']);
    Route::group(['prefix' => 'free-diagnostic'], function () {
        Route::get('history', [FreeDiagnosticApiController::class, 'history']);
        Route::get('{id}', [FreeDiagnosticApiController::class, 'show']);
    });
});
