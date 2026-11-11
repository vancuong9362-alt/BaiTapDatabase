<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

// Route::prefix('/products')->group(function() {

//     Route::get('/', [ProductsController::class, 'index']);
//     route::get('/getProducts',ProductsController::class,'index');
//     Route::get('/details', [ProductsController::class, 'details']);
//     Route::get('/tags', [ProductsController::class, 'Tags']);
//     Route::get('/{id}', [ProductsController::class, 'show']);
//     Route::post('/', [ProductsController::class, 'add']);
//     Route::put('/{id}', [ProductsController::class, 'update']);
//     Route::delete('/{id}', [ProductsController::class, 'destroy']);

// });

Route::post('/signUp', [AuthController::class, 'signUp']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logOut']); // logout thường dùng method POST
});


Route::middleware(['auth:sanctum', 'admin'])->group(function () {

    Route::post('/admin/users', [AdminUserController::class, 'store']);

    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy']);
});
