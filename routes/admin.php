<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OrderController;
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
    Route::group(['prefix' => 'order', 'as' => 'order'], function () {
        Route::get('/', [OrderController::class, 'index']);
    });
});
