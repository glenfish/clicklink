<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\JobController;

// Public Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm']);
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink']);
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm']);
Route::post('/reset-password/{token}', [PasswordResetController::class, 'resetPassword']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::post('/user/update-email', [UserController::class, 'updateEmail']);
    Route::post('/user/update-affiliate-id', [UserController::class, 'updateAffiliateId']);
    Route::post('/user/generate-zip', [UserController::class, 'generateZip']);
    Route::get('/user/job-status', [JobController::class, 'jobStatus']);
});

// Admin Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/admin/settings', [AdminController::class, 'updateSettings']);
    Route::post('/admin/deactivate-user/{id}', [AdminController::class, 'deactivateUser']);
    Route::post('/admin/delete-zip/{id}', [AdminController::class, 'deleteUserZip']);
    Route::get('/admin/settings', [AdminController::class, 'settings']);
    Route::post('/admin/login', [AuthController::class, 'adminLogin']);
    Route::get('/admin/logout', [AuthController::class, 'adminLogout']);
});