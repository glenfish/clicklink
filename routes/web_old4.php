<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\JobController;

// Public Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/registration-submitted', function () {
    return view('auth.registration_submitted');
})->name('registration.submitted');
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm']);
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink']);
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm']);
Route::post('/reset-password/{token}', [PasswordResetController::class, 'resetPassword']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings']);
    Route::post('/admin/deactivate-user/{id}', [AdminController::class, 'deactivateUser']);
    Route::post('/admin/delete-zip/{id}', [AdminController::class, 'deleteUserZip']);
    Route::get('/admin/pending-users', [AdminController::class, 'showPendingUsers'])->name('admin.pending_users');
    Route::post('/admin/approve-user/{id}', [AdminController::class, 'approveUser'])->name('admin.approve');
    Route::post('/admin/deny-user/{id}', [AdminController::class, 'denyUser'])->name('admin.deny');
    Route::get('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
});

// Admin Login Route
Route::get('/admin/login', [AdminController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'adminLogin']);