<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;

Route::controller(StatusController::class)->group(function()
{
    Route::get('', 'index');

    Route::get('{id}', 'show');

    Route::post('', 'store')->middleware(['auth:sanctum', 'ability:dev,diretor,editor']);

    Route::put('{id}', 'update')->middleware(['auth:sanctum', 'ability:dev,diretor,editor']);

    Route::delete('{id}', 'destroy')->middleware(['auth:sanctum', 'ability:dev,diretor,editor']);
    
});