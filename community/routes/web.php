<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CropController;



Route::get('/', [AuthController::class, 'home'])->name('home');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

Route::get('/verify-otp', [AuthController::class, 'showVerifyForm'])
    ->name('verify.form');

Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])
    ->name('verify.otp');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])
    ->name('google.login');

Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])
    ->name('google.callback');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
    ->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])
    ->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])
    ->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

    Route::get('/grid', [CropController::class, 'grid'])
    ->middleware('auth')
    ->name('grid');

Route::get('/summer', [CropController::class, 'summer'])
    ->middleware('auth')
    ->name('summer');

Route::get('/winter', [CropController::class, 'winter'])
    ->middleware('auth')
    ->name('winter');

Route::get('/garden', [CropController::class, 'garden'])
    ->middleware('auth')
    ->name('garden');

Route::get('/fruit', [CropController::class, 'fruit'])
    ->middleware('auth')
    ->name('fruit');

Route::get('/vegetable', [CropController::class, 'vegetable'])
    ->middleware('auth')
    ->name('vegetable');

Route::get('/grains', [CropController::class, 'grains'])
    ->middleware('auth')
    ->name('grains');

