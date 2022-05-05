<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::post('login', [AuthController::class, 'login']);

Route::post('register', [AuthController::class, 'register']);

Route::get('role', [RoleController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function()
{
    Route::controller(NoticeController::class)->group(function(){
        Route::get('notice', 'index');
        Route::put('notice/{id}', 'update')->middleware(['auth:sanctum', 'ability:dev,editor']);
        Route::post('notice', 'store')->middleware(['auth:sanctum', 'ability:dev,reporter']);
        Route::delete('notice/{id}', 'destroy')->middleware(['auth:sanctum', 'ability:dev,editor']);
    });

    Route::controller(StatusController::class)->group(function(){
        Route::get('status', 'index');
        Route::put('status/{id}', 'update')->middleware(['auth:sanctum', 'ability:dev,diretor,editor,reporter']);
        Route::post('status', 'store')->middleware(['auth:sanctum', 'ability:dev,diretor,editor,reporter']);
        Route::delete('status/{id}', 'destroy')->middleware(['auth:sanctum', 'ability:dev,diretor,editor,reporter']);
    });

    Route::controller(RoleController::class)->group(function(){
        Route::put('role/{id}', 'update')->middleware(['auth:sanctum', 'ability:dev,diretor']);
        Route::post('role', 'store')->middleware(['auth:sanctum', 'ability:dev,diretor']);
        Route::delete('role/{id}', 'destroy')->middleware(['auth:sanctum', 'ability:dev,diretor']);
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('user', 'index')->middleware(['auth:sanctum', 'ability:dev,diretor']);
        Route::put('user/{id}', 'update')->middleware(['auth:sanctum', 'ability:dev,diretor']);
        Route::post('user', 'store')->middleware(['auth:sanctum', 'ability:dev,diretor']);
        Route::delete('user/{id}', 'destroy')->middleware(['auth:sanctum', 'ability:dev,diretor']);
    });

    Route::post('logout', [AuthController::class, 'logout']);
});