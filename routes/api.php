<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobCategoriesController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;

Route::post('/signup', [AuthController::class, 'store']);
// Login route
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('jobs', JobPostingController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('job-categories', JobCategoriesController::class);
    Route::resource('/skills', SkillController::class);
    Route::get('/get-skill-by-category/{id}', [SkillController::class, 'getSkillsByCategory']);
});