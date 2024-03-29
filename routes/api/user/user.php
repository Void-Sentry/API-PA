<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function()
{
    Route::get('', 'index');

    Route::get('{id}', 'show');

    Route::post('', 'store');

    Route::put('{id}', 'update');

    Route::delete('{id}', 'destroy');

    Route::get('list/role', 'roleUser');
    
});