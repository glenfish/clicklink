<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PasswordResetController;

Route::get('/', [AuthController::class, 'index']);
Route::get('/admin/settings', [AdminController::class, 'settings'])->middleware('admin');
Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->middleware('admin');
Route::post('/generate', [JobController::class, 'generate'])->middleware('auth');
Route::get('/status', [JobController::class, 'status'])->middleware('auth');
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/forgot_password', [PasswordResetController::class, 'showForgotPasswordForm']);
Route::post('/forgot_password', [PasswordResetController::class, 'sendResetLink']);
Route::get('/reset_password/{token}', [PasswordResetController::class, 'showResetPasswordForm']);
Route::post('/reset_password/{token}', [PasswordResetController::class, 'resetPassword']);
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm']);
Route::post('/admin/login', [AuthController::class, 'adminLogin']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('admin');
Route::get('/admin/logout', [AuthController::class, 'adminLogout']);
Route::get('/job_status', [JobController::class, 'jobStatus'])->middleware('auth');