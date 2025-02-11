<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobCategoriesController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\JobsApplicationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Models\JobsApplication;
use App\Http\Controllers\CompaniesController;

Route::post('/signup', [AuthController::class, 'store']);
// Login route
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/get-all-jobs', [JobPostingController::class, 'index']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('jobs', JobPostingController::class);
    Route::get('/get-job-by-user', [JobPostingController::class, 'getJobByUser']);
    Route::resource('/roles', RoleController::class);
    Route::resource('job-categories', JobCategoriesController::class);
    Route::resource('/skills', SkillController::class);
    Route::resource('/jobs-applications', JobsApplicationController::class);
    Route::get('/get-skill-by-category/{id}', [SkillController::class, 'getSkillsByCategory']);
    Route::resource('/companies', CompaniesController::class);
});