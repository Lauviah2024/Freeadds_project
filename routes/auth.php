<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('ensurenlg')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisterController::class, 'register']);

    Route::get('login', [LoginController::class, 'create'])
        ->name('login');

    Route::post('login', [LoginController::class, 'login']);
});


Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//     ->name('password.request');

// Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//     ->name('password.email');

// Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
//     ->name('password.reset');

// Route::post('reset-password', [NewPasswordController::class, 'store'])
//     ->name('password.store');
