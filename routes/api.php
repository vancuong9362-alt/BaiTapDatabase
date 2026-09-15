<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/products')->group(function() {

    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/{id}', [ProductsController::class, 'show']);
    Route::post('/', [ProductsController::class, 'add']);
    Route::put('/{id}', [ProductsController::class, 'update']);
    Route::delete('/{id}', [ProductsController::class, 'destroy']);

});
