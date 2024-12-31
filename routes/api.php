<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::post('/signup', [AuthController::class, 'store']);
// Login route
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('user', UserController::class);
    // Route::post('/user', [UserController::class, 'index']);
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/permissions', [PermissionController::class, 'index']);
});