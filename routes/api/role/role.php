<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Route::controller(RoleController::class)->group(function()
{
    Route::get('', 'index');

    Route::get('{id}', 'show');

    Route::post('', 'store');

    Route::put('{id}', 'update');

    Route::delete('{id}', 'destroy');
    
});