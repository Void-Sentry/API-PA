<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;

Route::controller(NoticeController::class)->group(function()
{
    Route::get('', 'index');

    Route::get('{id}', 'show');

    Route::get('user/{id}', 'userNotices')->middleware(['auth:sanctum']);

    Route::post('', 'store')->middleware(['auth:sanctum']);

    Route::put('{id}', 'update')->middleware(['auth:sanctum']);

    Route::delete('{id}', 'destroy')->middleware(['auth:sanctum']);
    
});