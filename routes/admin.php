<?php

use App\Http\Controllers\Dashboard\BonusController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ReminderController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\TechCenterController;
use App\Http\Controllers\Dashboard\UserCarController;
use App\Http\Controllers\Dashboard\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Route::get('/version-1', [DashboardController::class, 'index1']);
    Route::group(['prefix' => 'user-car', 'as' => 'user-car'], function () {
        Route::get('/', [UserCarController::class, 'index']);
        Route::get('/{id}', [UserCarController::class, 'show'])->name('.show');
        Route::get('/{id}/edit', [UserCarController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [UserCarController::class, 'update'])->name('.update');
        Route::delete('/{id}', [UserCarController::class, 'delete'])->name('.delete');
    });
    Route::group(['prefix' => 'users', 'as' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/create', [UserController::class, 'create'])->name('.create');
        Route::post('/', [UserController::class, 'store'])->name('.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('.update');
        Route::get('/{id}', [UserController::class, 'show'])->name('.show');
        Route::delete('/{id}', [UserController::class, 'delete'])->name('.delete');
    });
    Route::group(['prefix' => 'tech-center', 'as' => 'tech-center'], function () {
        Route::get('/', [TechCenterController::class, 'index']);
        Route::get('/create', [TechCenterController::class, 'create'])->name('.create');
        Route::post('/', [TechCenterController::class, 'store'])->name('.store');
        Route::get('/{id}/edit', [TechCenterController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [TechCenterController::class, 'update'])->name('.update');
        Route::get('/{id}', [TechCenterController::class, 'show'])->name('.show');
        Route::delete('/{id}', [TechCenterController::class, 'delete'])->name('.delete');
    });
    Route::group(['prefix' => 'order', 'as' => 'order'], function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/{id}', [OrderController::class, 'show'])->name('.show');
        Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [OrderController::class, 'update'])->name('.update');
        Route::delete('/{id}', [OrderController::class, 'delete'])->name('.delete');
    });
    Route::group(['prefix' => 'reminder', 'as' => 'reminder'], function () {
        Route::get('/', [ReminderController::class, 'index']);
        Route::get('/{id}', [ReminderController::class, 'show'])->name('.show');
        Route::get('/{id}/edit', [ReminderController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [ReminderController::class, 'update'])->name('.update');
        Route::delete('/{id}', [ReminderController::class, 'delete'])->name('.delete');
    });
    Route::group(['prefix' => 'bonus', 'as' => 'bonus'], function () {
        Route::get('/', [BonusController::class, 'index']);
        Route::get('/create', [BonusController::class, 'create'])->name('.create');
        Route::post('/store', [BonusController::class, 'store'])->name('.store');
        Route::get('/{id}', [BonusController::class, 'show'])->name('.show');
        Route::get('/{id}/edit', [BonusController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [BonusController::class, 'update'])->name('.update');
        Route::delete('/{id}', [BonusController::class, 'delete'])->name('.delete');
    });
    Route::group(['prefix' => 'notification', 'as' => 'notification'], function () {
        Route::get('/', [NotificationController::class, 'index']);
        Route::get('/create', [NotificationController::class, 'create'])->name('.create');
        Route::post('/store', [NotificationController::class, 'store'])->name('.store');
        Route::get('/{id}', [NotificationController::class, 'show'])->name('.show');
        Route::get('/{id}/edit', [NotificationController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [NotificationController::class, 'update'])->name('.update');
        Route::delete('/{id}', [NotificationController::class, 'delete'])->name('.delete');
    });
    Route::group(['prefix' => 'review', 'as' => 'review'], function () {
        Route::get('/', [ReviewController::class, 'index']);
        Route::get('/{id}', [ReviewController::class, 'show'])->name('.show');
        Route::get('/{id}/edit', [ReviewController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [ReviewController::class, 'update'])->name('.update');
        Route::delete('/{id}', [ReviewController::class, 'delete'])->name('.delete');
    });
});
